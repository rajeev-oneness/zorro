<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revenue extends Model
{
    use SoftDeletes;
    protected $table = 'revenue';
}
