<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public function orderDetails()
    {
        return $this->hasMany(Booking::class, 'from_customer_id', 'id');
    }
}
