<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test(Request $request){
        $data=$request->getAllPrice;
        return view('layout.testview',compact('data'));
    }
}
