<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brand;

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
            'brandId' => $req->brand,
            'color'=>$req->color,
            'choices'=>$req->choices,
            'quantity'=>$req->quantity,
            'size'=>$req->size,
        ]);
        return back()->with('msg','Products added Successfully!');
    }
    public function addProducts(){
        $products=Products::all();
        $brand=Brand::all();
        $category=Category::all();
        return view('admin.addproducts',compact('products','category','brand'));
    }
}
