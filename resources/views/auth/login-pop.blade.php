<a href="#" class="pop-login" title="登录邂逅行" data-animation="pop" data-placement="vertical">登录</a>
<div class="webui-popover-content">
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="login_to" value="{{isset($url)?$url:URL::current()}}">
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="请输入注册邮箱">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">密码</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> 记住登录信息
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-warning">&nbsp;登录&nbsp;</button>
                                        <br><br> 
                                        <p>还没账号？<a href="/auth/register" class="link-orange">立即注册>></a></p>
                                        {{-- <a class="btn btn-link" href="{{ url('/password/username') }}">忘记密码?</a> --}}
                                    </div>
                                </div>
   </form>
</div>