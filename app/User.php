<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    const  DEF_AVATAR  = 'img/no-avatar.png';
    const  DEF_BANNER  = 'img/banner-space.jpg';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','username', 'email', 'password','address','sex','birth','occupation','description','avatar','banner'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public static function avatar($user){
        return $user->avatar==null?User::DEF_AVATAR:$user->avatar;
    }

    public function getAvatarAttribute($value)
    {
        return  $value==null?User::DEF_AVATAR:$value;
    }


     public function getAddressAttribute($value)
    {
        return  $value==null?'中国':$value;
    }

    public function getDescriptionAttribute($value)
    {
        return $value==null?'邂逅行，开始不一样的旅行！':$value;
    }

     public function getBannerAttribute($value)
    {
        return $value==null?User::DEF_BANNER:$value;
    }

    public function hasBanner(){
        return $this->banner != User::DEF_BANNER;
    }
    public function hasAvatar(){
        return $this->avatar != User::DEF_AVATAR;
    }

    public function removeAvatar(){
        if ($this->hasAvatar()){
            unlink($this->avatar);
        }    
    }

    public function removeBanner(){
        if ($this->hasBanner()){
            unlink($this->banner);
        }    
    }

    public function fans(){
        return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.follower_id')
                    ->where('user_relations.user_id','=',$this->id)->get();
    }

    public function following(){
        return DB::table('users')
                    ->join('user_relations','users.id','=','user_relations.user_id')
                    ->where('user_relations.follower_id','=',$this->id)->get();   
    }
}
