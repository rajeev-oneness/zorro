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
	    return $this->belongsTo(Driver::class, 'driver_id', 'id');
	}
	
    public function customerDetail(){
	    return $this->belongsTo(Customer::class, 'from_customer_id', 'id');
	}
    
	public function objectDetail(){
	    return $this->belongsTo(BookingObject::class, 'object', 'id');
	}
}
