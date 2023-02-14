<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialProduct;

class Test2Controller extends Controller
{
    //
    public function getdiscounts(){
        $specialproduct=SpecialProduct::all();
        return view('layout.index',compact('specialproduct'));
    }
}
