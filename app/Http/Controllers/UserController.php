<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function signup(Request $req){
        $req->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],
        [
            'email.required'=>'email should not be empty',
        ]);
        $user=null;
        $user=User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return redirect()->route('login');
    }
    public function logging(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required',
        ],
        [
            'email.required'=>'email should be empty',
        ]);
        if(Auth::attempt(['email' => $req->email,'password'=>$req->password])){
            $usertype=Auth::user()->usertype;
            if($usertype==='1'){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('main');
            }
        }
        else{
            return back()->with('fail','email or password is incorrect');
        }
    }
    public function logout(){
        auth()->logout();

        return redirect()->route('main');
    }
    public function forgot(){
        return view('layout.forgot');
    }

    public function addImg(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $user=Auth::user()->id;
        $data=User::find($user);
        $data->img=$response;
        $data->save();
    }
    public function userinfo(){
        return view('layout.userinfo');
    }
    public function changePass(Request $req){
        if(Auth::check()){
            $user=User::where('email',$req->email)->first();
            if($req->oldpassword===$user->password){
                if($req->newpassword===$req->retypepassword){
                    dd('ewe');
                }
                else{
                    dd('fdsfs');
                }
            }
        }
    }
}
