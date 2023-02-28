<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryTracking;
use App\Models\Order;

class DelivertrackingController extends Controller
{
    //
    public function getDelivertrackings(){
        $delivertrack=DeliveryTracking::all();
        $order=Order::all();
        return view('admin.deliverytracking',compact('order','delivertrack'));
    }
    public function tracking(Request $req){
        $delivertrack=new DeliveryTracking();
        $delivertrack->nameRecipient=$req->firstName;
        $delivertrack->phone=$req->phone;
        $delivertrack->email=$req->email;
        $delivertrack->street=$req->address;
        $delivertrack->orderId=$req->order;
        $delivertrack->status='processing';
        $delivertrack->save();
    }

    public function track(){
        $gettrackdetails=DeliveryTracking::all();
        return view('layout.tracker',compact('gettrackdetails'));
    }

    public function sendstatus(Request $req){
        $delivertrack=DeliveryTracking::where('orderId',$req->input('orderid'))->first();
        $delivertrack->status=$req->status;
        $delivertrack->save();
    }
    public function getOrderID(Request $req){
        $orderid=$req->input('orderid');
        $order=Order::find($orderid);
        $pr=[];
        $pr=json_decode($order->products,true);
        return $pr;
    }
    public function addingOrder(Request $req){
        $orderid=$req->input('orderid');
        $order=Order::find($orderid);
        $add=[];
        $add=Order::where('id',$order->id)->get();
        return $add;
    }
}
