<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;

class ClientsController extends Controller
{
    function index()
    {
        if(!isset($_SESSION['username']))
        {
            return view('index');
            die();
        }
        
    	$customers = customers::All();
    	return view('clients',['customers'=>$customers]);
    }

    function new_client(Request $request)
    {
    	$name = $request->name;
    	$phone = $request->phone;
    	$email = $request->email;

    	$client = new customers();

    	$client->name = $name;
    	$client->phone = $phone;
    	$client->email = $email;
    	$client->save();

    	$customers = customers::All();

    	return redirect()->route('clients',['customers'=>$customers]);
    }

    function customer_details(Customers $customer) {
    return response()->json(array('client'=> $customer), 200);
    }

    function delete_customer(Customers $customer) {
    $customer->delete();
    //return response()->json(array('client'=> $customer), 200);
    }

    function update_customer(Request $request) {


    $client = customers::Find($request->client_id);
    $client->name = $request->name;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->save();

    $message = "Update successful";

    return response()->json(array('message'=> $message), 200);
    }

}
