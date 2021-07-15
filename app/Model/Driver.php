<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $table = 'drivers';

    public function orderDetails()
    {
        return $this->hasMany(Booking::class, 'driver_id', 'id');
    }

    public function liveLocation()
    {
        return $this->hasOne('App\Model\DriverLiveLocation', 'driver_id', 'id');
    }
}
