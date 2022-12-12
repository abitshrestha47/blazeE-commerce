<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function signup(){
        return view('layout.signup');
    }
    public function login(){
        return view('layout.login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    // public function main(){
    //     $category=Category::all();
    //     return view('layout.index',compact('category'));
    // }
    public function main(){
        return view('layout.index');
    }
    public function shop(){
        $products=Products::all();
        return view('layout.shop',compact('products'));
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
