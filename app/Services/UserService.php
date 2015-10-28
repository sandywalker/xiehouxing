<?php

namespace App\Services;

use App\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService
{
	

	//返回关注标示供页面做判断, 'follow','unFollow',null
	public function followFlag($user)
	{
		if (Auth::guest()||$user->isme()){
			return null;
		}else if ($this->isFollowing($user->id)){
			return 'unFollow';
		}else{
			return 'follow';
		}
	}

	public function follow($followerId,$id)
	{
		if (!$this->isFollowing($id))
		{
			DB::table('user_relations')->insert([
					'user_id'=>$id,
					'follower_id'=>$followerId
				]);
		}
	}

	public function unFollow($followerId,$id)
	{
		if ($this->isFollowing($id))
		{
			DB::table('user_relations')->where('user_id',$id)->where('follower_id',$followerId)->delete();
		}
	}

	//是否已关注该用户
	public function isFollowing($id)
	{
		if (Auth::check()){
			$cid = Auth::user()->id;
			return DB::table('user_relations')->where('user_id',$id)->where('follower_id',$cid)->count()>0;
		}
		return false;
	}

	//游记数量
	public function noteCount($user)
	{
		return Note::where('creator',$user->id)->count();
	}

	//粉丝数量
	public function fansCount($user)
	{
		return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.follower_id')
                    ->where('user_relations.user_id','=',$user->id)->count();
	}

	//关注数量
	public function followingCount($user){
        return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.user_id')
                    ->where('user_relations.follower_id','=',$user->id)->count();   
    }

    //粉丝列表
    public function fans($user){
        return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.follower_id')
                    ->where('user_relations.user_id','=',$user->id)->get();
    }

    //关注列表
    public function following($user){
        return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.user_id')
                    ->where('user_relations.follower_id','=',$user->id)->get();   
    }
}