<?php

namespace App\Http\Controllers;

use App\Category;
use App\Inventory;
use App\RequestList;
use App\Inventory_transaction_log;
use App\RequestProduct;
use App\Supplier;
use App\UnitCategory;
use App\User;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;

class InventoryController extends Controller
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
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function show_inventoryList(){
        $data = Inventory::all();

        return view('content.inventory.view_inventory_list', compact('data'));
    }



    public function add_inventoryProduct(){

        $sup = Supplier::all();
        $cat = Category::all();

        return view('content.inventory.create_inventory_item', compact('sup','cat'));
    }

    public function edit_inventoryProduct($prodid){

        $item = Inventory::where('product_id',$prodid)->get();

        $saved_sup = Inventory::where('product_id',$prodid)->join('suppliers', function($join){
            $join->on('suppliers.id','=','inventories.supplier_id');
        })->get();
        $saved_cat = Inventory::where('product_id',$prodid)->join('categories', function($join){
            $join->on('categories.category_id','=','inventories.category');
        })->get();
        $sup = Supplier::all();
        $cat = Category::all();
        $units = UnitCategory::all();
        return view('content.inventory.edit_inventory_item',compact('item','sup','cat','saved_sup','saved_cat','units'));
    }

    public function save_newProduct(Request $request){

        $invent = new Inventory();
        $inventHistory = new Inventory_transaction_log();

        $genId = Uuid::uuid();

        $invent->product_id = $genId;
        $invent->name = $request->product_name;
        $invent->quantity = $request->quantity;
        $invent->supplier_id = $request->supplier_name;
        $invent->category = $request->category_name;
        $invent->unit = $request->unit;
        $invent->price = $request->price;
        $invent->description = $request->description;
        $invent->alert_value = $request->alerts;
        $invent->created_by = $request->username;
        $invent->save();

        $inventHistory->product_id = $genId;
        $inventHistory->name = $request->product_name;
        $inventHistory->quantity = $request->quantity;
        $inventHistory->supplier_id = $request->supplier_name;
        $inventHistory->category = $request->category_name;
        $inventHistory->unit = $request->unit;
        $inventHistory->price = $request->price;
        $inventHistory->description = $request->description;
        $inventHistory->alert_value = $request->alerts;
        $inventHistory->process = 'Inserted Product';
        $inventHistory->created_by = $request->username;
        $inventHistory->save();





        $request->session()->flash('alert-success', 'Record was successful added!');

        return redirect('/inventoryList');

    }

}
