<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;



class ResetController extends Controller
{
    //
    public function reset(Request $req){
        $user=User::where('email',$req->email)->first();
            if($user)
            {
                $token=Str::random(6);
                $expires=now()->addMinutes(1);

                Cache::put('password_reset',$user->id,$token,$expires);
                Mail::to($user->email)->send(new PasswordResetMail($user, $token));
            }
            else{
                return back()->with('msg','user couldnot be found');
            }
    }
}
