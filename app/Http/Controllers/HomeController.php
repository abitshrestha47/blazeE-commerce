<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function signup(){
        return view('layout.signup');
    }
    public function login(){
        return view('layout.login');
    }

    public function main(){
        $products=Products::all();
        $category=Category::all();
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(4);
        return view('layout.index',compact('category','products','latestproducts'));
    }

    public function shop(Request $request){
        $query=Products::query();
        $category=Category::all();
        $products=Products::all();
        $uniqueCategory = Category::all()->unique('categories');
        return view('layout.shop',compact('products','category','uniqueCategory'));
    }
    public function PriceFilter(Request $req){
        if($req->ajax()){
            $minamount = filter_var($req->minamount, FILTER_SANITIZE_NUMBER_INT);
            $maxamount = filter_var($req->maxamount, FILTER_SANITIZE_NUMBER_INT); 
            if(empty($req->category) && empty($req->globalBrands)){
                $unfilteredgoods=Products::all();
                   // foreach ($unfilteredgoods as $goods) {
                //     $goods->price = str_replace("$", "", $goods->price);
                // }
                $unfilteredgoods = Products::all()->map(function($item) {
                    $item->price = intval($item->price);
                    return $item;
                });
                $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods'));
            }
            else if(empty($req->category) && !empty($req->globalBrands)){
                $goods=Products::whereIn('brand',$req->globalBrands)->get();
                $goods=$goods->map(function($item){
                    $item->price=intval($item->price);
                    return $item;
                });
                $goods=$goods->filter(function($item) use ($minamount,$maxamount){
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods'));
            }
            else if(!empty($req->category) && empty($req->globalBrands)){
                $unfiltercategorygoods = Products::where('categoryid', $req->category)->get();
                $unfilteredgoods = $unfiltercategorygoods->map(function($item) {
                $item->price = intval($item->price);
                    return $item;
                }); 
                $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods'));
            }
            else if(!empty($req->category) && !empty($req->globalBrands)){
                $goods=Products::where('categoryid',$req->category)->whereIn('brand',$req->globalBrands)->get();
                $goods = $goods->map(function($item) {
                    $item->price = intval($item->price);
                        return $item;
                }); 
                $goods = $goods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods'));           
            }
        }
        // if($req->ajax()){
        //     $minamount = filter_var($req->minamount, FILTER_SANITIZE_NUMBER_INT);
        //     $maxamount = filter_var($req->maxamount, FILTER_SANITIZE_NUMBER_INT);
        //     if(empty($req->category)){
        //         $unfilteredgoods=Products::all();
        //         // foreach ($unfilteredgoods as $goods) {
        //         //     $goods->price = str_replace("$", "", $goods->price);
        //         // }
        //         $unfilteredgoods = Products::all()->map(function($item) {
        //             $item->price = intval($item->price);
        //             return $item;
        //         });
        //         $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
        //             return $item->price >= $minamount && $item->price <= $maxamount;
        //         });
        //         return view('layout.categoryfilter', compact('goods'));
        //     }
        //     else{
        //         $unfiltercategorygoods = Products::where('categoryid', $req->category)->get();
        //         $unfilteredgoods = $unfiltercategorygoods->map(function($item) {
        //             $item->price = intval($item->price);
        //             return $item;
        //         }); 
        //         $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
        //             return $item->price >= $minamount && $item->price <= $maxamount;
        //         });
        //         return view('layout.categoryfilter', compact('goods'));
        //     }
        // }
    }
    public function data(Request $request){
        $category=Category::all();
        $products=Products::all();
        if($request->ajax()){
            if(empty($request->category)){
                $goods=Products::all();
                return view('layout.categoryfilter',compact('goods','category'));
            }
            else{
                $goods=Products::where(['categoryid'=>$request->category])->get();
                return view('layout.categoryfilter',compact('goods','category'));
            }
            // return response()->json(['goods'=>$goods]);
        }
    }
    public function boxFilter(Request $req){
        if($req->ajax()){
            if(empty($req->category)){
                if(empty($req->brands)){
                    $goods=Products::all();
                    return view('layout.categoryfilter',compact('goods'));
                }
                else{
                    $goods=Products::whereIn('brand',$req->brands)->get();
                    return view('layout.categoryfilter',compact('goods'));
                }
            }
            else if(!empty($req->category)){
                if(empty($req->brands)){
                    $goods=Products::where('categoryid',$req->category)->get();
                    return view('layout.categoryfilter',compact('goods'));
                }
                else{
                    $goods=Products::where('categoryid',$req->category)->whereIn('brand',$req->brands)->get();
                    return view('layout.categoryfilter',compact('goods')); 
                }
            }
        }    
    }
    public function getProduct($id)
    {
        $product = Products::find($id);
        return response()->json($product);
    }

    public function buynow(){
        return view('layout.buynow');
    }
    public function cart(){
        return view('layout.cart');
    }
    public function checkout(){
        return view('layout.checkout');
    }

}