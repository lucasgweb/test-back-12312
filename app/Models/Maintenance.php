<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id', 'user_id','odometer','coust','date','description','status'
    ];

    public $timestamps = false;

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }

}
