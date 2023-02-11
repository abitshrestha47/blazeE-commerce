<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class TestController extends Controller
{
    //
    // public function test(Request $request){
    //     $deals=Deal::all();
    //     foreach($deals as $makezero){
    //         $makezero->toshow=false;
    //         $makezero->save();
    //     }
    //     $data=$request->selectedValue;
    //     $deal=Deal::find($data);
    //     $deal->toshow=true;
    //     $deal->save();
    // }
    public function test(Request $request){
        $userid = Auth::id();
        $checkcart = Cart::where('userid', $userid)->first();   
        $productId=$request->input('productid');
        $quantity=$request->input('quantity');   
        $newArray = array_combine($productId, $quantity);
        $productIds = json_decode($checkcart->product_ids, true);
        // dd($productIds);
        $newArray = array_map(function ($value) {
            return intval($value);
        }, $newArray);
        foreach ($newArray as $key => $value) {
            if($productIds[$key]==$newArray[$key]) {
                    continue;
            }
            else{
                $productIds[$key]=$value;
            }
        }
        // dd($productIds);
        $checkcart->product_ids = json_encode($productIds);
        $checkcart->save();
    }
    public function cart(){
        $cart=Cart::all();
        $userid=Auth::id();
        $exist=Cart::where('userid',$userid)->first();
        if ($exist){
            $contained = json_decode($exist->product_ids, true);
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