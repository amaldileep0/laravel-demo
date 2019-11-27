<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Http\Requests\StoreVendors;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vendors = Vendors::paginate(5);
        return view('vendor.index', ['vendors' => $vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $countries = DB::table("countries")->pluck('name', 'id');
        return view('vendor.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendors $request)
    { 

        // Retrieve the validated input data...
        $validated = $request->validated();
        
        $vendors = new Vendors([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'district_id' => $request->input('district'),
            'state_id' => $request->input('state'),
            'country_id' => $request->input('country')
        ]);

        $vendors->save();

        return redirect('/vendor')->with('success', 'New vendor saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendors::findOrFail($id);
        $countries = DB::table("countries")->pluck('name', 'id');
        $states = DB::table("states")->where("country_id", $vendor->country->id)->pluck("name", "id");
        $districts = DB::table("districts")->where("state_id", $vendor->state->id)->pluck("name", "id");
        
        return view('vendor.edit', 
            [
                'vendor' => $vendor,
                'countries' => $countries,
                'states' => $states,
                'districts' => $districts
            ]
        );  
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(StoreVendors $request, Vendors $vendor)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $vendor->name = $request->input('name');
        $vendor->phone = $request->input('phone');
        $vendor->gender = $request->input('gender');
        $vendor->address = $request->input('address');
        $vendor->city = $request->input('city');
        $vendor->district_id = $request->input('district');
        $vendor->state_id = $request->input('state');
        $vendor->country_id = $request->input('country');

        $vendor->save();
        
        return redirect('/vendor')->with('success', 'Vendor updated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $vendor = Vendors::findOrFail($id);
        dd($vendor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $vendor = Vendors::findOrFail($id);
        $vendor->delete();
        return redirect('/vendor')->with('success', 'Vendor deleted!');
    }
}
