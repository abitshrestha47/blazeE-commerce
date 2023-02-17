<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $req){
        if(Auth::check()){
            $userid = Auth::id();
            $checkcart = Cart::where('userid', $userid)->first();   
            if(!$checkcart){   
            $checkcart=new Cart;
            $productId=(int)$req->input('productId');
            $price=(int)$req->input('price');
            $quantity=1; 
            $productIds[] = [
                'productid'=>$productId,
                'qty' => $quantity,
                'price' => $price,
              ];
            $checkcart->product_ids=json_encode(
                $productIds
            );
            $checkcart->userid=Auth::id();
            $checkcart->save();
             }
             else{
                $productId=(int)$req->input('productId');
                $price=(int)$req->input('price');
                $productId=(int)$productId;
                $quantity=1;
                $productIds=json_decode($checkcart->product_ids,true);
                $product_exists = false;
                foreach($productIds as $key=>$value){
                    if($value['productid']==$productId){
                        $product_exists = true;
                        break;
                    }
                }
                if (!$product_exists) {
                    $newproductIds=[
                        'productid'=>$productId,
                        'qty'=>$quantity,
                        'price'=>$price,
                    ];
                    array_push($productIds, $newproductIds);
                    $checkcart->product_ids = json_encode($productIds);
                    $checkcart->save();
                }
                else{
                    return back();
                }
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
        $cart=Cart::all();
        $userId=Auth::id();
        $exist = Cart::where('userid', $userId)->first();
        if ($exist){
            $productIds = json_decode($exist->product_ids, true);
            $product_qty = [];
            foreach($productIds as $idforproduct){
                $product_qty[$idforproduct['productid']]=$idforproduct['qty'];
            }
            $pricesent=[];
            foreach($productIds as $price){
                $pricesent[$price['productid']]=$price['price'];
            }
            $product_keys=array_keys($product_qty);
            $count = count($product_keys); 
            $productData = Products::whereIn('id', $product_keys)->get();
        } 
        else {
            $productData = [];
            $count=0;
            $productIds=[];
            $product_qty=[];
            $pricesent=[];
        }
        return view('layout.cart',compact('cart','productData','count','productIds','product_qty','pricesent'));
    }
    public function getShip(Request $req){
        
    }
}