<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //
    public function postOrder(Request $req){
        if(Auth::check()){
            $userid=Auth::id();
            $products=$req->products;
            $products_encode=json_encode($products);
            $order=Order::create([
                'firstName'=>$req->firstname,
                'lastName'=>$req->lastname,
                'companyName'=>$req->company,
                'country'=>$req->country,
                'street1'=>$req->streetaddress1,
                'street2'=>$req->streetaddress2,
                'town'=>$req->town,
                'province'=>$req->province,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'products'=>$products_encode,
                'userid'=>$userid,
            ]);
        }
    }
    public function orders(){
        $orderproducts=[];
        $order=Order::all();
        foreach($order as $orders){
            $products_decode=json_decode($orders->products,true);
        }
        return view('admin.order',compact('order','products_decode'));
    }
}
