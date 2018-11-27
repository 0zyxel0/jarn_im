<?php

namespace App\Http\Controllers;

use App\UnitCategory;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class UnitCategoryController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitCategory  $unitCategory
     * @return \Illuminate\Http\Response
     */
    public function viewUnitList(UnitCategory $unitCategory)
    {
        $units = UnitCategory::all();
        return view('content.category.view_unit_list',compact('units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitCategory  $unitCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitCategory $unitCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitCategory  $unitCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitCategory $unitCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitCategory  $unitCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitCategory $unitCategory)
    {
        //
    }

    public function save(Request $request){
        $unitData = new UnitCategory();
        $unitData->unitid = Uuid::uuid();
        $unitData->unit_type = $request->unit_name;
        $unitData->createdBy = $request->username;
        $unitData->updatedBy = $request->username;
        $unitData->save();
        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/unitList');

    }
}
