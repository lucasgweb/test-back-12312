<?php

namespace App\Http\Livewire;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMaintenances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $maintenanceId;
    public $vehicleId;
    public $date;
    public $odometer;
    public $description;
    public $coust;

    public $showPage = 0;
    public $deleteId = '';

    public function selectPage($n)
    {
        $this->resetPage();
        $this->showPage = $n;
    }
    public function create()
    {
        $this->validate();

        Maintenance::create([
            'vehicle_id' => $this->vehicleId,
            'odometer' => $this->odometer,
            'coust' => $this->coust,
            'date' => $this->date,
            'user_id' => \Auth::user()->id,
            'description' => $this->description
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('added');
    }

    public function edit($id)
    {
        $maintenance = Maintenance::find($id);

        if ($maintenance) {
            $this->maintenanceId = $maintenance->id;
            $this->vehicleId = $maintenance->vehicle_id;
            $this->date = $maintenance->date;
            $this->odometer = $maintenance->odometer;
            $this->coust = $maintenance->coust;
            $this->description = $maintenance->description;
        }
    }

    public function update()
    {
        $maintenance = Maintenance::where('id', $this->maintenanceId)->update([
            'vehicle_id' => $this->vehicleId,
            'odometer' => $this->odometer,
            'coust' => $this->coust,
            'date' => $this->date,
            'description' => $this->description
        ]);

        $this->dispatchBrowserEvent('updated');
        $this->resetInput();

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        Maintenance::find($this->deleteId)->delete();
        $this->resetInput();
    }

    public function concluded($id)
    {
         Maintenance::where('id', $id)->update([
            'status' => 1,
            'date' => date('Y-m-d')
        ]);

         $maintenance = Maintenance::find($id);
         $maintenance->vehicle->update([
             'last_maintenance' => date('Y-m-d')
         ]);

        $this->dispatchBrowserEvent('concluded');
    }

    public function pending()
    {
      $maintenance = Maintenance::find($this->maintenanceId);
      $maintenance->update([
            'status' => 0,
            'date' => $this->date
        ]);

      $lastMaintenance = Maintenance::orderBy('id','DESC')->where('id','!=',$maintenance->id)->where('vehicle_id',$maintenance->vehicle->id)->first();

      if (!empty($lastMaintenance))
      {
          Vehicle::where('id',$maintenance->vehicle->id)->update([
              'last_maintenance' => $lastMaintenance->date
          ]);
      } else {
          Vehicle::where('id',$maintenance->vehicle->id)->update([
              'last_maintenance' => null
          ]);
      }

      $this->dispatchBrowserEvent('pending');
    }

    public function resetInput()
    {
        $this->vehicleId = '';
        $this->date = '';
        $this->odometer = '';
        $this->coust = '';
        $this->description = '';

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render(): Factory|View|Application
    {

        $maintenances = Maintenance::orderBy('date','ASC')->where('user_id', \Auth::user()->id)->where('status', 0)->paginate(5);
        $vehicles = Vehicle::where('user_id', \Auth::user()->id)->get();

        if ($this->showPage == 1) {
            $maintenances = Maintenance::orderBy('date','DESC')->where('user_id', \Auth::user()->id)->where('status', 1)->paginate(5);
            $vehicles = Vehicle::where('user_id', \Auth::user()->id)->get();
        }

        return view('livewire.show-maintenances',
            [
                'maintenances' => $maintenances,
                'vehicles' => $vehicles
            ]
        );
    }

    protected function rules(): array
    {

        return [
            'vehicleId' => 'required|numeric',
            'date' => 'required|date',
            'odometer' => 'required|numeric',
            'description' => 'string|nullable',
            'coust' => 'required|numeric'
        ];
    }
}
