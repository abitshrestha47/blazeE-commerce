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
            // $userid = Auth::id();
            // $checkcart = Cart::where('userid', $userid)->first();
            // if(!$checkcart){
            //     $checkcart=new Cart;
            //     $productId = $req->input('productId');
            //     // $checkcart->product_ids = json_encode([
            //     //     'id' => $productId
            //     // ]);
                
            //     $checkcart->product_ids=json_encode([
            //         $productId
            //     ]);
            //     $checkcart->userid=Auth::id();
            //     $checkcart->save();
            // }
            // else{
            //     $productId = $req->input('productId');
            //     $productIds = json_decode($checkcart->product_ids, true);
                
            //     if(!in_array($productId, $productIds)) {
            //         $productIds[] = $productId;
            //     }
                
            //     $checkcart->product_ids = json_encode($productIds);
            //     $checkcart->save();
            // }
            $userid = Auth::id();
            $checkcart = Cart::where('userid', $userid)->first();   
            if(!$checkcart){     
            $checkcart=new Cart;
            $productId=$req->input('productId');
            $quantity=1; 
            $productIds=[];
            $productIds[$productId]=$quantity;
            $checkcart->product_ids=json_encode(
                $productIds
            );
            $checkcart->userid=Auth::id();
            $checkcart->save();
             }
             else{
                $productId=$req->input('productId');
                $productId=(int)$productId;
                $quantity=1;
                $productIds=json_decode($checkcart->product_ids,true);
                if(!array_key_exists($productId,$productIds)){
                    $productIds[$productId]=$quantity;
                    $checkcart->product_ids=json_encode($productIds);
                    $checkcart->save();
                }
                else{
                    session()->flash('message', 'Product already added, wanna add it more? Check out on Cart');
                    session()->flash('productId', $productId);
                    return back();
                }
             }
        // else{
        //     $productId=$request->input('productid');
        //     $quantity=0;      
        //     $productIds = json_decode($checkcart->product_ids, true);
        //     foreach($productId as $key=>$product){
        //         $product=(string)$product;
        //         $productIds[$product]=$quantity[$key];
        //     }
        //     $checkcart->product_ids = json_encode($productIds);
        //     $checkcart->save();
        // }
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
        $userId=Auth::id();
        $exist = Cart::where('userid', $userId)->first();
        if ($exist){
            $productIds = json_decode($exist->product_ids, true);
            $count = count($productIds); 
            $productData = Products::whereIn('id', $productIds)->get();
        } 
        else {
            $productData = [];
            $count=0;
        }
        return view('layout.cart',compact('cart','productData','count'));
    }
}