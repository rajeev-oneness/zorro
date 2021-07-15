<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DriverLiveLocation extends Model
{
    protected $table = 'driver_locations';

    public function driverDetail()
    {
        return $this->belongsTo('App\Model\Driver', 'driver_id', 'id');
    }
}
