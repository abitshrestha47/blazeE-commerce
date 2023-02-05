<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Products;

class DepartmentController extends Controller
{
    //
    public function addDepartment(Request $req){
        $department=new Department();
        $department->departmentName=$req->deptname;
        $department->departmentImage=$req->departmentImage;
        $department->save();
    }
    public function getDepartment(){
        return view('admin.departments');
    }
    public function getDepartmentView($id){
        $department = Department::findOrFail($id);
        $departmentsort = $department->category;
        $productsArray = [];
        foreach($departmentsort as $check){
            $products=$check->products;
            foreach($products as $product){
                array_push($productsArray, $product);
            }
        }
        $departments=Department::all();
        return view('layout.filterdepartments',compact('productsArray','departments'));
    }
}
