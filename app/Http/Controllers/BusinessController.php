<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Business;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $businesses = Business::
        when($request->business_name, function($query) use ($request){
            $query->where('business_name', 'LIKE', '%'.$request->business_name.'%');
        })
        ->when($request->type, function($query) use ($request){
            $query->where('type', 'LIKE', '%'.$request->type.'%');
        })
        ->when($request->location, function($query) use ($request){
            $query->where('location', 'LIKE', '%'.$request->location.'%');
        })
        ->when($request->name, function($query) use ($request){
            $query->where('name', 'LIKE', '%'.$request->name.'%');
        })
        ->when($request->phn_no, function($query) use ($request){
            $query->where('phn_no', 'LIKE', '%'.$request->phn_no.'%');
        })
        ->when($request->gst_no, function($query) use ($request){
            $query->where('gst_no', '=', $request->gst_no);
        })
        ->when($request->delivery_cost, function($query) use ($request){
            $query->where('delivery_cost', '=', $request->delivery_cost);
        })
        ->get();
        //$businesses = Customer::all();
        return view('\business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'string|required',
            'type' => 'string|required',
            'location' => 'required',
            'name' => 'string|required',
            'phn_no' => 'numeric|required',
            'gst_no' => 'required',
            'delivery_cost' => 'numeric|required',
        ]);
        // dd($request->all());
        $business = new Business;
        $business->business_name = $request->business_name;
        $business->type = $request->type;
        $business->name = $request->name;
        $business->location = $request->location;
        $business->phn_no = $request->phn_no;
        $business->gst_no = $request->gst_no;
        $business->delivery_cost = $request->delivery_cost;
        $business->save();
        return redirect()->route('admin.business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::find(base64_decode($id));
        return view('business.edit');
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
        $request->validate([
            'business_name' => 'string|required',
            'type' => 'string|required',
            'location' => 'required',
            'name' => 'string|required',
            'phn_no' => 'numeric|required',
            'gst_no' => 'required',
            'delivery_cost' => 'numeric|required',
        ]);
        // dd($request->all());
        $business = Business::find(base64_decode($request->businessId));
        $business->business_name = $request->business_name;
        $business->type = $request->type;
        $business->name = $request->name;
        $business->location = $request->location;
        $business->phn_no = $request->phn_no;
        $business->gst_no = $request->gst_no;
        $business->delivery_cost = $request->delivery_cost;
        $business->save();
        return redirect()->route('admin.business.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $business = Business::find(base64_decode($id));
        $business->delete();
        return redirect()->route('admin.business.index');
    }
}
