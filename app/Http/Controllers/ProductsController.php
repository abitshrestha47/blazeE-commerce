<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    //
    public function products(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $product=Products::create([
            'name' => $req->name,
            'price' => $req->price,
            'photo' => $response,
            'categoryid' => $req->categoryid,
            'brand' =>$req->brand,
            'color'=>$req->color,
        ]);
    }
}
