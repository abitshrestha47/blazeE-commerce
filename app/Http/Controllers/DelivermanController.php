<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliverMan;

class DelivermanController extends Controller
{
    //
    public function addDeliverman(Request $req){
        $deliverman=new Deliverman();
        $deliverman->name=$req->name;
        $deliverman->phone=$req->phone;
        $deliverman->address=$req->address;
        $deliverman->save();
    }
    public function getDeliverman(){
        return view('admin.deliverman');
    }
}
