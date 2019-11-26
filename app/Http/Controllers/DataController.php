<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{	

	/**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStates($id) 
	{        
        $states = DB::table("states")->where("country_id", $id)->pluck("name", "id");
        return json_encode($states);
	}

	public function getDistricts($id)
	{
		$districts = DB::table("districts")->where("state_id", $id)->pluck("name", "id");
        return json_encode($districts);	
	}
}
