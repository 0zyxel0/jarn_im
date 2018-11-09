<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestProduct;
use App\User;
use App\Inventory;
use App\RequestList;
use Faker\Provider\Uuid;
use DB;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function showDashboard(){

        $newItems = Inventory::all();
        $requestList = RequestList::select('listid as itemsList','tracking_no','status')->get();
        $alertItems = Inventory::whereRaw('quantity <= alert_value')->get();
        return view('content.dashboard',compact('newItems','requestList','alertItems'));
    }
}
