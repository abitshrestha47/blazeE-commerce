<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    //
    public function addDeal(Request $req){
        $image=$req->file('dealBackgroundImage');
        $response=$image->store('dbimages','public');
        $deal=new Deal();
        $deal->dealTitle = $req->dealTitle;
        $deal->dealDescription = $req->dealDescription;
        $deal->dealPrice = $req->dealPrice;
        $deal->dealBackgroundImage=$response;
        $deal->product_id = $req->product;
        $deal->save();
        return redirect()->back();
    }
    public function getDeal(){
        return view('admin.deal');
    }
    public function test(){
        $cart = Cart::find(Auth::id());
        if ($cart) {
            $productIds = json_decode($cart->product_ids, true);
            $productData = Products::whereIn('id', $productIds)->get();
        } else {
            $productData = [];
        }
        echo $productData;
    }
}
