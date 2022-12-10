<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function products(){
        return view('Admin.products');
    }
    public function test(){
        return view('Admin.test');
    }
    public function category(){
        return view('Admin.category');
    }
}
