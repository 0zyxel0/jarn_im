<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ReportsController extends Controller
{
    public function viewAvaiblableReports(){

        return view('content.reports.view_reports_list');
    }

    public function view_TransactionInventoryOfArea(){

     $area = App\Area::all();
        return view('content.reports.view_report_area_transaction_list',compact('area'));
    }


    public function post_TransactionInventoryOfArea(Request $request){


        $areaid = $request->areaid;
        $wFrom = date('Y-m-d', strtotime($request->startdate));
        $wTo = date('Y-m-d', strtotime($request->enddate));

        $query = DB::select('
            SELECT rl.tracking_no,p.givenname, p.familyname, rl.remarks,i.`name`,rlp.qty, rl.`status`, rl.updated_at, a.name as areaname
            FROM request_lists rl
            LEFT JOIN request_list_products rlp on rl.tracking_no = rlp.tracking_no
            LEFT JOIN inventories i on rlp.item_id = i.product_id
            LEFT JOIN people p on rl.requested_by = p.partyid
            LEFT JOIN areas a on p.areaid =a.areaid
            WHERE a.areaid = "'.$areaid.'"
            AND rl.updated_at BETWEEN  "'.$wFrom.'" and "'.$wTo.'"
            ORDER BY rl.updated_at
');
        $query_json = json_encode($query);

        return view('content.reports.view_report_generatedReportAreaTransaction',['data'=>json_decode($query_json, true)]);
    }


    public function view_TransactionInventoryOfEmployee(){

        $people = App\Person::select('partyid as id','givenname','familyname')->get();
        return view('content.reports.view_report_employee_transaction_list',compact('people'));
    }

    public function post_TransactionInventoryOfEmployee(Request $request){


        $partyid = $request->partyid;
        $wFrom = date('Y-m-d', strtotime($request->startdate));
        $wTo = date('Y-m-d', strtotime($request->enddate));

        $query = DB::select('
            select rl.tracking_no,p.givenname, p.familyname, rl.remarks,i.`name`,rlp.qty, rl.`status`, rl.updated_at
            FROM request_lists rl
            LEFT JOIN request_list_products rlp on rl.tracking_no = rlp.tracking_no
            LEFT JOIN inventories i on rlp.item_id = i.product_id
            LEFT JOIN people p on rl.requested_by = p.partyid
            WHERE rl.requested_by = "'.$partyid.'"
            AND rl.updated_at BETWEEN "'.$wFrom.'" and "'.$wTo.'"
            ORDER BY rl.tracking_no
');
        $query_json = json_encode($query);

return view('content.reports.view_report_generatedReportEmployeeTransaction',['data'=>json_decode($query_json,true)]);
    }


    public function view_TotalInventoryCost(){
        $data = App\Inventory::select('product_id','name','quantity','price')->get();

        return view('content.reports.view_report_generatedReportInventoryTotalCost',compact('data'));
    }


    public function view_TotalUsageCost(Request $request){

        $wFrom = date('Y-m-d', strtotime($request->startdate));
        $wTo = date('Y-m-d', strtotime($request->enddate));

        $query = DB::select('
                SELECT rlp.tracking_no, i.name,rlp.qty,i.price,p.givenname,p.familyname,rl.status,rlp.created_at
                FROM request_lists rl
                LEFT JOIN request_list_products rlp on rl.tracking_no = rlp.tracking_no
                LEFT JOIN inventories i on i.product_id = rlp.item_id
                LEFT JOIN people p on p.partyid = rl.requested_by
                WHERE
                rl.status = "Released"
                AND rl.updated_at BETWEEN "'.$wFrom.'" and "'.$wTo.'"
                
        ');

        $query_json = json_encode($query);
        return view('content.reports.view_report_generatedReportUsageCost',['data'=>json_decode($query_json, true)]);
    }


    public function generate_Inventory_UsageReport(){
        return view('content.reports.view_report_inventory_transaction_usage');
    }

}
