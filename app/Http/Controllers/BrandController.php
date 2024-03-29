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
        return back()->with('msg','Brand named added Successfully!');
    }
    public function getBrander(){
        $brands=Brand::all();
        return view('admin.brand',compact('brands'));
    }
    public function deletebrand($id){
        $brands=Brand::find($id);
        $brands->delete();
        return back()->with('delmsg','Brand Deleted Successfully!');
    }
}
