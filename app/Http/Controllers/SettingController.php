<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\UserFileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('settings.index',compact('user'));
    }

    public function styles()
    {
        $user = Auth::user();
        return view('settings.styles',compact('user'));   
    }

    public function likes()
    {
        $user = Auth::user();
        return view('settings.likes',compact('user'));   
    }

    public function security()
    {
        $user = Auth::user();
        return view('settings.security',compact('user'));      
    }

  



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/settings');
    }

     public function updateStyles(UserFileRequest $request)
    {
        $photo = $request->file('photo');
        $avatar = $request->file('avatar');

        $this->updatePhotos($photo,$avatar);        
        
        return redirect('/settings/styles');
    }

    public function changePassword(ChangePassRequest $request)
    {
       $user = User::findOrFail(Auth::user()->id);

       if ( !Hash::check($request->input('password'), $user->password)){
            return redirect('/settings/security')->with('wrong','现在的密码输入不正确，不能修改密码！');
       }
       $user->password = bcrypt($request->input('new_password'));
       $user->save();
       return redirect('/settings/security')->with('success',true);
    }

    private function updatePhotos($photo,$avatar)
    {
        $user = Auth::user();
        if ($avatar!=null){
            $user->removeAvatar();
            $avatarname = time().'.'.$avatar->getClientOriginalExtension();
            $avatarpath = Config::get('consts.avatar_root');
            $avatar->move($avatarpath,$avatarname);

            Image::make($avatarpath.$avatarname)->fit(200)->save();
            $user->avatar = $avatarpath.$avatarname;
        } 
        if ($photo!=null){
             $user->removeBanner();
             $photoname = time().'.'.$photo->getClientOriginalExtension();
             $path = Config::get('consts.user_banner_root');
             $photo->move($path,$photoname); 

             $user->banner = $path.$photoname;    
        }  
        $user->save();
    }

}
