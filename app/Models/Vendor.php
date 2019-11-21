<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'district',
        'state',
        'country',
        'gender'     
    ];
}
