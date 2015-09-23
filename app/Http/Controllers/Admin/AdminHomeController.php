<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    
    public function index()
    {
    	return view('admin.index');
    }

     public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
