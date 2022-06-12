<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fleet;

class FleetController extends Controller
{
    function index()
    {

        if(!isset($_SESSION['username']))
        {
            return view('index');
            die();
        }
        
    	$trucks = fleet::All();
    	return view('fleet',['trucks'=>$trucks]);
    }

    function new_truck(Request $request)
    {
    	$truck = new fleet();
    	$registration = $request->registration;
    	$type = $request->type;

    	$truck->registration = $registration;
    	$truck->type = $type;
    	$truck->save();

    	return redirect()->route('fleet');
    }

    function truck_details(Fleet $truck) {
    return response()->json(array('truck'=> $truck), 200);
    }

    function update_truck(Request $request)
    {
    	$truck = fleet::Find($request->id);
    	$registration = $request->registration;
    	$type = $request->type;

    	$truck->registration = $registration;
    	$truck->type = $type;
    	$truck->save();
    }

    function delete_truck(Fleet $truck) {
    $truck->delete();
    }

}
