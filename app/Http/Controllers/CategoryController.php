<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function category(Request $req){
        $category=Category::create([
            'categories' => $req->category,
            'department_id'=>$req->department_id,
        ]);
        return back()->with('msg','New Category Added Successfully!');
    }
}
