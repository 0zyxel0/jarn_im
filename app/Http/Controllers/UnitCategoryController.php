<?php

namespace App\Http\Controllers;

use App\UnitCategory;
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
        return view('content.category.view_unit_list');
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
}
