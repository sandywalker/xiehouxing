<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SocialController extends Controller
{
    private $userService;

	public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function follow($fId,$id)
    {
    	$this->userService->follow($fId,$id);
    	return redirect(URL::previous());
    }

    public function unFollow($fId,$id)
    {
    	$this->userService->unFollow($fId,$id);
    	return redirect(URL::previous());
    }
}
