<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    //
    public function products(Request $req){
        $product=Products::create([
            'name' => $req->name,
            'price' => $req->price,
        ]);
    }
}
