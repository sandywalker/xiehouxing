<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Weibo\SaeTClientV2;
use App\Weibo\SaeTOAuthV2;
use App\Weibo\WeiboConfig;
use App\Weibo\WeiboUtils;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WeiboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        //
        $o = new SaeTOAuthV2( WeiboConfig::appKey() , WeiboConfig::securityKey() );
        $success = false;
        $weibo_user = null;
        $token = null;
        $user = null;

        if ($request->has('code')){
            $keys = array();
            $keys['code'] = $request->input('code');
            $keys['redirect_uri'] = WeiboConfig::callbackUrl();
            try {
                $token = $o->getAccessToken( 'code', $keys ) ;
                $success = $token!=null;
            } catch (OAuthException $e) {

            }
        }
        
        
        if ($token){
            $success = true;
            $request->session()->put('token',$token);
            $c = new SaeTClientV2( WeiboConfig::appKey() , WeiboConfig::securityKey() ,$token['access_token'] );
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $weibo_user = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
            $user = WeiboUtils::createUser($weibo_user);
            if ($user!=null){
                Log::debug('login:'.$user->id);
                Auth::login($user,true);
                //Auth::attempt(['email' => $user->email, 'password' => '111111'], true);
                return redirect('/');
            }
        }
        $view = view('weibo.callback',compact('success','weibo_user','user'));
        $response = Response($view);
        return $response;
        
    }

}
