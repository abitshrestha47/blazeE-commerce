<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Department;
use App\Models\Brand;

class SearchController extends Controller
{
    //
    public function getSearch(Request $req){
        $searchItem=$req->input('searchItem');
        $items=Products::where('name','LIKE','%'.$searchItem.'%')->get();
        return response()->json($items);
    }
    public function searchResults(){
        $id=request()->input('id');
        $product=Products::where('id',$id)->get();
        $productrelate=Products::where('categoryid',$product[0]->categoryid)->get();
        return view('layout.searchView',compact('product','productrelate'));
    }
    public function searchThis(Request $req){
        $searchItem=$req->searchItem;
        $category=Category::where('categories','LIKE',$searchItem.'%')->get();
        return view('admin.categoryfilter',compact('category'));
    }
    public function searchProducts(Request $req){
        $searchItem=$req->searchItem;
        $products=Products::where('name','LIKE','%'.$searchItem.'%')->get();
        return view('admin.prouductsfilter',compact('products'));
    }
    public function searchDepartments(Request $req){
        $searchItem=$req->searchItem;
        $departsearched=Department::where('departmentName','LIKE','%'.$searchItem.'%')->get();
        return view('admin.departmentsfilter',compact('departsearched'));
    }
    public function searchBrands(Request $req){
        $searchItem=$req->searchItem;
        $brandsearched=Brand::where('brandName','LIKE','%'.$searchItem.'%')->get();
        return view('admin.brandfilter',compact('brandsearched'));
    }
}
