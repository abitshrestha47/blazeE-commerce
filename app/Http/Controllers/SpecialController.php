<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialProduct;

class SpecialController extends Controller
{
    //
    public function specialProducts(){
        return view("admin.addspecialproducts");
    }
    public function addSpecialProducts(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $product=SpecialProduct::create([
            'name' => $req->name,
            'price' => $req->price,
            'photo' => $response,
            'categoryid' => $req->categoryid,
            'brandId' => $req->brand,
            'color'=>$req->color,
            'quantity'=>$req->quantity,
            'size'=>$req->size,
            'description'=>$req->description,
            'discountoffer'=>$req->discountoffer,
        ]);
        return back()->with('msg','Products added Successfully!');
    }
}
