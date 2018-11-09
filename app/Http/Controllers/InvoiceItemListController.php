<?php

namespace App\Http\Controllers;

use App\InvoiceItemList;
use Illuminate\Http\Request;

class InvoiceItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewItems($id)
    {
        $data = InvoiceItemList::where('invoice_id',$id)->get();

        return view('content.invoice.view_invoice_items',compact('data'));
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
     * @param  \App\InvoiceItemList  $invoiceItemList
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItemList $invoiceItemList)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceItemList  $invoiceItemList
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceItemList $invoiceItemList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceItemList  $invoiceItemList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceItemList $invoiceItemList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceItemList  $invoiceItemList
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItemList $invoiceItemList)
    {
        //
    }


}
