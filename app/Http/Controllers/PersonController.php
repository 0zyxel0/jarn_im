<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\Person;
use DB;
use Faker\Provider\Uuid;

class PersonController extends Controller
{
    public function viewPersonList(){
        $areadata = Area::all();
        $people = Person::select('partyid as userid','givenname','familyname','contactNumber','areas.name as areaName')->join('areas',function($join)
        {$join->on('areas.areaid','=','people.areaid');}
        )->get();


        return view('content.people.view_employee_list',compact('areadata','people'));
    }

    public function store(Request $request){

        $postData = new Person();

        $postData->partyid = Uuid::uuid();
        $postData->areaid = $request->area_id;
        $postData->givenname = $request->given_name;
        $postData->familyname = $request->family_name;
        $postData->contactNumber = $request->contact;
        $postData->updatedBy = $request->username;
        $postData->createdBy = $request->username;
        $postData->save();
        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/personList');
    }
}
