<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Products;
use App\Models\Contact;
use App\Models\Department;
use App\Models\User;


class AdminController extends Controller
{
    //
    public function products(){
        $products=Products::all();
        return view('admin.products',compact('products'));
    }
    public function category(){
        $category=Category::all();
        $departments=Department::all();
        return view('admin.category',compact('category','departments'));
    }
    public function contacts(){
        $contacts=Contact::all();
        return view('admin.contacts',compact('contacts'));
    }
    public function dashboard(){
        $use=User::all();
        return view('admin.dashboard',compact('use'));
    }
    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return back()->with('delmsg','Category Deleted Successfully!');
    }
    
    public function productdelete($id){
        $product=Products::find($id);
        $product->delete();
        return back()->with('delmg','Products Deleted Successfully!');
    }

    public function editcategory($id){
        $category=Category::find($id);
        return view('admin.categoryedit',compact('category'));
    }
    public function editingcategory(Request $req){
        $category=Category::find($req->id);
        $category->categories=$req->category;
        $category->save();
        return redirect()->route('category')->with('mssg','Category Edited successfully!');
    }
}
