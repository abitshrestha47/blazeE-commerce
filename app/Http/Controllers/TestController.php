<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;

class TestController extends Controller
{
    //
    public function test(Request $request){
        $deals=Deal::all();
        foreach($deals as $makezero){
            $makezero->toshow=false;
            $makezero->save();
        }
        $data=$request->selectedValue;
        $deal=Deal::find($data);
        $deal->toshow=true;
        $deal->save();
    }
}
