<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class QQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return Socialite::with('qq')->redirect();
    }


     public function callback() {
        $qq = \Socialite::with('qq')->user();
        if ($qq!=null){
            $user = $this->createUser($qq);
            Auth::login($user,true);
            return redirect('/');  
        }else{
            return view('qq.callback');
        }
       
    }

    private function createUser($qq)
    {
        if (!$qq){
            return;
        }
        $uname = $qq->id;
        if (User::exists($uname)){
            return User::where('username',$uname)->first();
        }
        $id = User::newId();
        $u = $qq->user;
        $gender = $u['gender'] == '男' ? 1 : 2;
        $user = User::create([
            'id' => $id,
            'username' => $uname,
            'name' => $qq->nickname,
            'email' => $uname,
            'password' => bcrypt('111111'),
            'sex' => $gender,
            'address' => $u['province'],
            'avatar' => $qq->avatar,
            'binding' => 'qq',
        ]);
        return $user;
    }


}
