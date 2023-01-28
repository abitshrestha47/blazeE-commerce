<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function brander(Request $req){
        $brand=Brand::create([
            'brandName' => $req->brand,
        ]);
    }
    public function getBrander(){
        $brands=Brand::all();
        return view('admin.brand',compact('brands'));
    }
}
