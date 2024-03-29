<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeliveryTracking;
use App\Models\Sale;
use Carbon\Carbon;


class DashboardController extends Controller
{
    //
    public function adminUser(){
        $days=array();
        $datas=array();
        for($i=7;$i>=0;$i--){
            $days=Carbon::now()->subDays($i);
            $day[]=$days->format('Y-m-d');
            $data=Sale::whereDate('created_at',$days)->get();
            $datas[]=$data->sum('total');
        }
        $today=Carbon::now()->format('Y-m-d');
        $todayValues=Sale::whereDate('created_at',$today)->get();
        $todaySales=$todayValues->sum('subtotal');
        $todayRevenue=$todayValues->sum('total');
        $adminname=User::all();
        $sale=Sale::all();
        $totalsale=$sale->sum('subtotal');
        $totalRevenue=$sale->sum('total');
        return view('admin/dashboard',compact('adminname','totalsale','todaySales','today','datas','day','todayRevenue','totalRevenue'));
    }
}
