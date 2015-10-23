@extends('def')

@section('id','login')

@section('content')
<div class="container container-login">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info panel-login">
                <div class="panel-heading">登录邂逅行</div>
                <div class="panel-body">
                    @include('error')
                    <div class="row">
                        <div class="col-md-6 login-account">
                            <h4 class="text-center">用邂逅行账号登录</h4>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-8">
                                        <input type="username" class="form-control" name="username" value="{{ old('username') }}">
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
                        <div class="col-md-6">
                            <h4 class="text-center">用第三方平台快速登录</h4>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p class="text-muted text-center">稍后支持，敬请期待！</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
