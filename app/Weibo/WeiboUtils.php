<?php

namespace App\Weibo;

use App\User;


class WeiboUtils {

	public static function createUser($weiboUser)
	{
		if (!$weiboUser){
			return;
		}
		$uname = $weiboUser['profile_url'];
		if (User::exists($uname)){
			return User::where('username',$uname)->first();
		}
		$id = User::newId();
		$gender = $weiboUser['gender'] == 'm' ? 1 : 2;
        $user = User::create([
            'id' => $id,
            'username' => $uname,
            'name' => $weiboUser['name'],
            'email' => $uname,
            'password' => bcrypt('111111'),
            'sex' => $gender,
            'description' => $weiboUser['description'],
            'address' => $weiboUser['location'],
            'avatar' => $weiboUser['profile_image_url'],
            'binding' => 'weibo',
        ]);
        return $user;


	}
}