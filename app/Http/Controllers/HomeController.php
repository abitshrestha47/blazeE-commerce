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
        if($request->ajax()){
            if(empty($request->category)){
                $goods=$query->get();
            }
            else{
                $goods=$query->where(['categoryid'=>$request->category])->get();
            }
            return response()->json(['goods'=>$goods]);
        }
        return view('layout.shop',compact('products','category'));
    }
    public function abc(Request $req){
        $products=Products::all();
        if($req->ajax()){
            if(empty($req->test)){
                $goods=DB::table('products')->get();
            }
            else{
                $goods=DB::table('products')->where(['categoryid'=>$req->test])->get();
            }
            return view('layout.normalproductsfilter',compact('goods'));
        }
    }
    public function data(Request $request){
        $query=Products::query();
        $category=Category::all();
        $products=Products::all();
        if($request->ajax()){
            if(empty($request->category)){
                $goods=$query->get();
                return view('layout.categoryfilter',compact('goods','category'));
            }
            else{
                $goods=$query->where(['categoryid'=>$request->category])->get();
                return view('layout.categoryfilter',compact('goods','category'));
            }
            return response()->json(['goods'=>$goods]);
        }
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
