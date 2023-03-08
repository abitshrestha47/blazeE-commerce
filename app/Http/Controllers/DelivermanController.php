<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliverMan;

class DelivermanController extends Controller
{
    //
    public function addDeliverman(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $deliverman=new Deliverman();
        $deliverman->name=$req->name;
        $deliverman->phone=$req->phone;
        $deliverman->address=$req->address;
        $deliverman->image=$response;
        $deliverman->save();
        return back()->with('msg','DeliveryMan Data Added Successfully');
    }
    public function getDeliverman(){
        return view('admin.deliverman');
    }
}
