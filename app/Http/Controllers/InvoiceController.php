<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Invoice;
use App\InvoiceItemList;
use App\RequestList;
use App\Supplier;
use Illuminate\Http\Request;
use App\Category;
use Faker\Provider\Uuid;
use App\InvoiceCategory;

class InvoiceController extends Controller
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

        $invoice_list = new Invoice();
        $invoice_items = new InvoiceItemList();
        $inventory = new Inventory();
        $or_number = $request->get('or_number');
        $invoice_date = $request->get('invoice_date');
        $supplier_name = $request->get('supplier_name');
        $itemName = $request->get('itemName');
        $qty = $request->get('qty');
        $category = $request->get('category');
        $price = $request->get('price');
        $unit = $request->get('unit');
        $total_price = $request->get('total_price');
        $invoice_total = $request->get('invoice_total');
        $username = $request->get('username');
        $dataset = [];
        $dataset2 = [];
        $inventory_set3 = [];

        $genId = Uuid::uuid();

            $dataset[] = [
                'invoice_id' =>$genId
                ,'or_number'=>$or_number
                ,'invoice_date'=>$invoice_date
                ,'supplier_id'=>$supplier_name
                ,'invoice_total'=>$invoice_total
                ,'username'=>$username
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ];

        foreach ($itemName as $key => $value) {
            $dataset2[] = [
                'invoice_itemid' =>Uuid::uuid()
                ,'invoice_id'=>$genId
                ,'itemName'=>$itemName[$key]
                ,'qty'=>$qty[$key]
                ,'price'=>$price[$key]
                ,'category'=>$category[$key]
                ,'unit'=>$unit[$key]
                ,'total_price'=>$total_price[$key]
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $invoice_list->insert($dataset);
        $invoice_items->insert($dataset2);


        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/invoiceList');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {

        $data = Invoice::all();

      return view('content.invoice.view_invoice_list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }



    public function create_invoiceList(){
        $cat = Category::all();

        $suppliers = Supplier::all();
        return view('content.invoice.create_invoice',compact('suppliers','cat'));
    }

    public function show_invoiceTypes(){

        $types = InvoiceCategory::all();
        return view('content.invoice.view_invoicetype_list',compact('types'));
    }

    public function save_invoiceType(Request $request){

        $invoice_type = new InvoiceCategory();

        $invoice_type->invoice_type =$request->get('type_name');
        $invoice_type->createdBy =$request->get('username');
        $invoice_type->updatedBy =$request->get('username');
        $invoice_type->created_at =date('Y-m-d H:i:s');
            $invoice_type->updated_at = date('Y-m-d H:i:s');


        $invoice_type->save();


        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/invoiceTypeList');
    }
}
