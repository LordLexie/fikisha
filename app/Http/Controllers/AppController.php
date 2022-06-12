<?php

namespace App\Http\Controllers;
use App\Models\customers;
use App\Models\orders;
use App\Models\fleet;
use App\Models\operators;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function dashboard()
    {
        if(!isset($_SESSION['username']))
        {
            return view('index');
            die();
        }

    	$customers = customers::select('name','id')->get();
    	$trucks = fleet::where('status','=','available')->select('registration','id')->get();
    	$orders = orders::join('customers','customers.id','=','client_id')->select('orders.*','customers.name')->get();
    	return view('dashboard',
    		['customers'=>$customers,
    		'orders'=>$orders,
    		'trucks'=>$trucks]);
    }

    function home_stats()
    {
        $pending = orders::where('status','=','pending')->get()->count();
        $loading = orders::where('status','=','loading')->get()->count();
        $dispatched = orders::where('status','=','dispatched')->get()->count();
        $delivered = orders::where('status','=','delivered')->get()->count();

        $available = fleet::where('status','=','available')->get()->count();
        $loading_trucks = fleet::where('status','=','loading')->get()->count();
        $on_transit = fleet::where('status','=','on transit')->get()->count();

        $clients = customers::All()->count();

        $password = md5('100%formilano');

        return response()->json(array(
            'pending'=> $pending,
            'loading'=>$loading,
            'dispatched'=>$dispatched,
            'delivered'=>$delivered,
            'available'=>$available,
            'loading_trucks'=>$loading_trucks,
            'on_transit'=>$on_transit,
            'clients'=>$clients), 200);
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);

        $find = operators::where('email','=',$email)->where('password','=',$password)->get();

        if(count($find) == 1)
        {
            foreach ($find as $person) {
            $_SESSION['username'] = $person->name;
            }
             return redirect()->route('dashboard'); 
        }
        else
        {
           return view('index'); 
        }

    }

    function logout()
    {
    session_destroy();
    return view('index');
    }

}
