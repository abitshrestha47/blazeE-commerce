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
            // $checkcart=Cart::all();
            // $productId = $req->input('productId');
            // $product=Products::find($productId);
            // $cart=new Cart();
            // $cart->userid=$req->input('id');
            // $cart->productname=$product->name;
            // $cart->productimg=$product->photo;
            // $cart->productprice=$product->price;
            // $cart->userid=Auth::id();
            // $cart->productid=$product->id;
            // $cart->save();
            $userid = Auth::id();
            $checkcart = Cart::where('userid', $userid)->first();
            if(!$checkcart){
                $checkcart=new Cart;
                $productId = $req->input('productId');
                // $checkcart->product_ids = json_encode([
                //     'id' => $productId
                // ]);
                $checkcart->product_ids=$id=json_encode([
                    $productId
                ]);
                $checkcart->userid=Auth::id();
                $checkcart->save();
            }
            else{
                $productId = $req->input('productId');
                $productIds = json_decode($checkcart->product_ids, true);
                
                if(!in_array($productId, $productIds)) {
                    $productIds[] = $productId;
                }
                
                $checkcart->product_ids = json_encode($productIds);
                $checkcart->save();
            }
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
    public function cart(Request $request){
        // $getAllPrice=$request->input('getAllPrice');
        // $sendAllPrice=array_sum($getAllPrice);
        $cart=Cart::all();
        $cart = Cart::find(Auth::id());
        if ($cart) {
            $productIds = json_decode($cart->product_ids, true);
            $count = count($productIds);
            $productData = Products::whereIn('id', $productIds)->get();
        } else {
            $productData = [];
            $count=0;
        }
        return view('layout.cart',compact('cart','productData','count'));
    }
}