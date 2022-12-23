<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaintenanceCollection;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showMaintenances(Request $request)
    {

        $date = date('Y-m-d');
        $dateEnd = date('Y-m-d', strtotime("+7 days",strtotime($date)));

        $user = User::find(\Auth::user()->id);

        return new MaintenanceCollection(Maintenance::orderBy('date', 'ASC')
            ->where('user_id', $user->id)->where('status', 0)
            ->where("date",">=", $date)
            ->where("date", "<=",$dateEnd)
            ->simplePaginate(5));
    }
}
