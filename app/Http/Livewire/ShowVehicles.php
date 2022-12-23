<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVehicles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $deleteId = '';

    public $brand, $model, $year, $plate, $vehicleId, $type;

    public $entries = 5;

    protected $listeners = ['$refresh','vehicleAdded'];

    public function store()
    {
        $this->dispatchBrowserEvent('resetInput');
        $this->validate();
        Vehicle::create([
            'user_id' => \Auth::user()->id,
            'plate' => $this->plate,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year
        ]);

        $this->dispatchBrowserEvent('added');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    protected function rules(){
        return [
            'plate' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|string',
        ];
    }


    public function editVehicle(int $vehicleId)
    {
        $vehicle = Vehicle::find($vehicleId);

        if ($vehicle){
            $this->vehicleId= $vehicle->id;
            $this->plate = $vehicle->plate;
        }

    }

    public function updateVehicle()
    {
        $this->validateOnly('plate');

        Vehicle::where('id',$this->vehicleId)->update([
            'plate' => $this->plate
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('updated');
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {
        Vehicle::find($this->deleteId)->delete();
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->plate = '';
        $this->type = '';

        $this->resetErrorBag();
        $this->resetValidation();

    }

    public function render()
    {

        $vehicles = Vehicle::where('user_id',\Auth::user()->id)->orderByDesc('id')->paginate($this->entries);
        return view('livewire.show-vehicles',[
            'vehicles' => $vehicles
        ]);
    }

}
