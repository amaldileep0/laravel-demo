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
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'district_id' => $request->get('district'),
            'state_id' => $request->get('state'),
            'country_id' => $request->get('country')
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
        return view('vendor.edit', ['vendor' => $vendor , 'countries' => $countries]);  
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        dd($request);
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
        dd($vendor);
    }
}
