<?php

namespace App\Http\Controllers;

use App\Person;
use App\ProductTransactionLog;
use App\RequestProduct;
use App\User;
use App\Inventory;
use App\RequestList;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;


class RequestProductController extends Controller
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

        $requestProductModel = new RequestProduct();
        $requestListModel = new RequestList();
        $audit = new ProductTransactionLog();

        $requester = $request->get('requester');
        $itemName = $request->get('itemName');
        $tracking_no = $request->get('tracking_no');
        $qty = $request->get('qty');
        $genId = Uuid::uuid();
        $genId2 = Uuid::uuid();
        $remarks = $request->get('remarks');

        $auditset =[];
        $dataset =[];
        $dataset2 =[];

        foreach ($itemName as $key => $value) {
            $auditset[] = [
                'auditid' => Uuid::uuid(),
                'tracking_no' =>  $tracking_no,
                'item_id' =>  $itemName[$key],
                'qty' =>  $qty[$key],
                'remarks' => $remarks,
                'requested_by' =>$requester,
                'status' => 'Processing'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')

            ];
        }




            $dataset[] = [
                'listid' => Uuid::uuid(),
                'request_productid' => $genId,
                'tracking_no' =>  $tracking_no,
                'remarks' => $remarks,
                'requested_by' =>$requester,
                'status' => 'Processing'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')

            ];



        foreach ($itemName as $key => $value) {
            $dataset2[] = [
                'request_productid'=> Uuid::uuid(),
                'requestid' => $genId,
                'tracking_no' =>  $tracking_no,
                'item_id' =>  $itemName[$key],
                'qty' =>  $qty[$key],
                'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ];
        }

       $requestListModel->insert($dataset);
       $requestProductModel->insert($dataset2);
       $audit->insert($auditset);

        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/requestList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function show(RequestProduct $requestProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestProduct $requestProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestProduct $requestProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestProduct $requestProduct)
    {
        //
    }

    public function requestItemStore($id){

        $data = RequestProduct::select('requestid as rid','tracking_no','name','qty','quantity as available','product_id as itemid')->where('requestid',$id)->join('inventories', function($join){
            $join->on('inventories.product_id','=','request_list_products.item_id');
        })->get();
        $itemlist = RequestList::where('request_productid',$id)->get();

        $userlist =     RequestList::where('request_productid',$id)->join('people', function($join){
            $join->on('people.partyid','=','request_lists.requested_by');
        })->get();



        return view('content.request.view_inventory_request_items',compact('data','itemlist','userlist'));
    }

    public function updateRequestItems(Request $request){




        $audit = new ProductTransactionLog();
        $requestListModel = new RequestList();

        $requestid = $request->get('requestid');
        $trackingid = $request->get('trackingid');
        $requestedBy = $request->get('requestedBy');
        $status = $request->get('status');
        $remarks = $request->get('remarks');
        $releasedBy = $request->get('username');
        $item = $request->get('item');
        $qty = $request->get('qty');


      RequestList::where('request_productid',$requestid)
                   ->update([ 'status'=>"Released",
                               'released_by'=>$releasedBy]);


        $dataset =[];

        $auditset =[];

        foreach ($item as $key => $value) {
            $auditset[] = [
                'auditid' => Uuid::uuid(),
                'tracking_no' =>  $trackingid,
                'itemid' =>  $item[$key],
                'qty' =>  $qty[$key],
                'remarks'=> $remarks,
                'requested_by' =>$requestedBy,
                'status' => 'Released',
                'released_by' => $releasedBy,
                'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')

            ];
        }


        foreach ($item as $key => $value) {
            $dataset[] = [
                'product_id' => $item[$key]
                , 'quantity' => $qty[$key]
                , 'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        foreach ($item as $key => $value) {
            DB::table('inventories')
                ->where('product_id' ,$item[$key])
                ->update(['quantity'=> DB::raw('quantity - "'.$qty[$key].'"')]);

        }

        $audit->insert($auditset);

     return redirect('/requestList');

    }

    public function show_requestList(){

        $user = User::select('id','name','type')->get();
        $employee = Person::select('partyid as id','givenname','familyname')->get();
        //$data = RequestList::select('listid as list','request_productid','tracking_no','remarks','requested_by','status','released_by','created_at','updated_at')->get();


        $data =     RequestList::select('listid as list','request_productid','tracking_no','remarks','requested_by','status','released_by','givenname','familyname')->leftjoin('people', function($join){
            $join->on('people.partyid','=','request_lists.requested_by');
        })->get();



        $item = Inventory::select('product_id','name','quantity')->where('quantity','!=',0)->get();


        return view('content.request.view_inventory_request_list',compact('data','item','user','employee'));
    }
}
