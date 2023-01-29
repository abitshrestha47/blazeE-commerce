<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function category(Request $req){
        $category=Category::create([
            'categories' => $req->category,
        ]);
        return back()->with('msg','New Category Added Successfully!');


    }
}
