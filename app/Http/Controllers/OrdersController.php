<?php

namespace App\Http\Controllers;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\orders;
use App\Models\fullfillments;
use App\Models\fleet;
use PHPMailer\PHPMailer\PHPMailer;

class OrdersController extends Controller
{
    function add_order(Request $request)
    {
    	
    	$customer = $request->customer;
    	$from = $request->from;
    	$to = $request->to;
    	$description = $request->description;

    	$order = new orders();

    	$order->client_id = $customer;
    	$order->from = $from;
    	$order->to = $to;
    	$order->description = $description;
    	$order->save();
    	
    }

    function assign_truck($order,$truck)
    {
        $fullfillment = new fullfillments();
        $fullfillment->truck_id = $truck;
        $fullfillment->order_id = $order;
        $fullfillment->status = "active";
        $fullfillment->save();

        $update_truck = fleet::Find($truck);
        $update_truck->status = "loading";
        $update_truck->save();

        $update_order = orders::Find($order);
        $update_order->status = "loading";
        $update_order->save();

    }

    function dispatch($id)
    {
        $order = orders::Find($id);

        $fullfillments = fullfillments::where('order_id','=',$id)->where('status','=','active')->get();
        foreach($fullfillments as $fullfillment)
        {
        $truck = fleet::Find($fullfillment->truck_id);
        }

        $client = customers::Find($order->client_id);
        $client_name = $client->name;
        $email = $client->email;

        $order->status = "dispatched";
        $order->save();

        $truck->status = "on transit";
        $truck->save();



$body = "
<html>
<head>
<title>Order Dispatched</title>
</head>
<body>
<p>Hello {$client_name},</p>
<p>Your order has been dispatched. Expect the delivery in less than 24 hours. </p>
<p>
Regards,<br>Fikisha Team
</p>
<p><i>Please Note: This is an automated email, please do not reply.</i></p>
</html>
";

$mail = new PHPMailer();
$sender = "customercare@risitipepe.com";
$mail->isSMTP();
$mail->Host = "risitipepe.com";
$mail->SMTPAuth = true;
$mail->Username = "customercare@risitipepe.com";
$mail->Password = "100%formilano";
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

// email settings
$mail->isHTML(true);
$mail->setFrom($sender, 'Orders');
$mail->addAddress($email);
$mail->Subject = "Order Dispatched";
$mail->Body = $body;
$mail->send();

}

    function deliver($id)
    {
        $order = orders::Find($id);

        $fullfillments = fullfillments::where('order_id','=',$id)->where('status','=','active')->get();
        foreach($fullfillments as $fullfillment)
        {
        $truck = fleet::Find($fullfillment->truck_id);
        }

        $order->status = "delivered";
        $order->save();

        $truck->status = "available";
        $truck->save();

    }

}
