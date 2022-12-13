<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    //
    public function products(){
        $products=Products::all();
        return view('admin.products',compact('products'));
    }
    public function category(){
        $category=Category::all();
        return view('admin.category',compact('category'));
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return back();
    }
    public function productdelete($id){
        $product=Products::find($id);
        $product->delete();
        return back();
    }

    public function editcategory($id){
        $category=Category::find($id);
        return view('admin.categoryedit',compact('category'));
    }
    public function editingcategory(Request $req){
        $category=Category::find($req->id);
        $category->categories=$req->category;
        $category->save();
        return redirect()->route('category');
    }
}
