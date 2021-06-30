<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    //use SoftDeletes;
    protected $table = 'bookings';

    //hasMany relation with Category Model
	public function rider(){
	    return $this->hasOne(Driver::class, 'id', 'driver_id');
	}
}
