<!-- resources/views/auth/register.blade.php -->
@extends('def')

@section('id','register')
@section('content')
<div class="container container-register">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">欢迎注册</div>
                    <div class="panel-body">
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
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">注册</button>
                                            </div>
                                     </div>
                            </form>
                    </div>    
                </div>    
            </div>
    </div>
</div>
@endsection
