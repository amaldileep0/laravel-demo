<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $fillable = [
    	'name',
    	'phone',
    	'gender',
    	'country_id',
    	'state_id',
    	'district_id',
    	'city',
    	'address'
    ];


    /**
    * Get the country that belongs
    */
    public function country()
    {
        return $this->belongsTo('App\Models\Countries');
    }

    /**
    * Get the country that belongs
    */
    public function state()
    {
        return $this->belongsTo('App\Models\States');
    }

    /**
    * Get the country that belongs
    */
    public function district()
    {
        return $this->belongsTo('App\Models\Districts');
    }
}
