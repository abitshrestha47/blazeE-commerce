<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addCart(Request $req){
        if(Auth::check()){
            $checkcart=Cart::all();
            $productId = $req->input('productId');
            $product=Products::find($productId);
            $cart=new Cart();
            $cart->userid=$req->input('id');
            $cart->productname=$product->name;
            $cart->productimg=$product->photo;
            $cart->productprice=$product->price;
            $cart->userid=Auth::id();
            $cart->productid=$product->id;
            $cart->save();
        }
        else{
            return redirect()->route('login');
        }
    }
    public function incDecprice(Request $req){
        $totalprice=$req->quantity*$req->productprice;
        return $totalprice;
    }
    public function deleteCart(Request $req,$id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}