<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

     public function main()
    {
        return view('admin.user.main');
    }


    public function disableUser($id)
    {
        $user = User::findOrFail($id);
        $user->states = 0;
        $user->save();
        return $user;
    }

    public function enableUser($id)
    {
        $user = User::findOrFail($id);
        $user->states = 1;
        $user->save();   
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}
