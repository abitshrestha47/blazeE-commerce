<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function products(){
        return view('admin.products');
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
