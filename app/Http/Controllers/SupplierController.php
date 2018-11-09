<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier();

        $supplier->id = Uuid::uuid();
        $supplier->company_name = $request->name;
        $supplier->address = $request->contact_address;
        $supplier->contact_person = $request->contact_person;
        $supplier->contact_number = $request->contact_number;
        $supplier->updated_by = $request->username;
        $supplier->created_at = date('Y-m-d H:i:s');
        $supplier->updated_at = date('Y-m-d H:i:s');

        $supplier->save();
        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/supplierList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }


    public function showSupplierList(){

        $data = Supplier::all();
        return view('content.people.view_supplier_list',compact('data'));
    }
}
