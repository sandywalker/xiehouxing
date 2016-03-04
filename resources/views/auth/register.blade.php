<!-- resources/views/auth/register.blade.php -->
@extends('def')

@section('id','register')
@section('content')
<div class="container container-register">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info panel-login">
                    <div class="panel-heading"> 
                    <a href="/" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a> 欢迎注册</div>
                    <div class="panel-body">
                            <br>
                            @include('error')
                            <form class="form-horizontal" role="form" method="POST" action="/auth/register">
                                {!! csrf_field() !!}

                                 <div class="form-group">
                                            <label class="col-md-4 control-label">用户名</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="username" value="{{ old('username')}}" required="required">
                                            </div>
                                </div>
                                  <div class="form-group">
                                            <label class="col-md-4 control-label">邮箱</label>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="required">
                                            </div>
                                        </div>
                                  <div class="form-group">
                                            <label class="col-md-4 control-label">密码</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password"  required="required">
                                            </div>
                                        </div>
                                  <div class="form-group">
                                            <label class="col-md-4 control-label">密码确认</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" name="password_confirmation" required="required">
                                            </div>
                                    </div>
                                     <div class="form-group">
                                            <label class="col-md-4 control-label">&nbsp;</label>
                                            <div class="col-md-6">
                                                <input type="checkbox" checked="checked"  id="agreeCheck"> 我已阅读并同意遵守 并遵守 <a href="/articles/service" target="_blank">《邂逅行服务协议》</a>        
                                            </div>
                                    </div>
                                    
                                   <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary" id="btnRegister">注册</button>
                                            </div>
                                     </div>
                            </form>
                    </div>    
                </div>    
            </div>
    </div>
</div>
@endsection

@section('js')
    <script>
    (function(){
        $('#btnRegister').on('click',function(e){
            if (!$('#agreeCheck').is(":checked")){
                alert('您没有同意服务协议');
                return false;
            }

        });
    })();
    </script>
@endsection
