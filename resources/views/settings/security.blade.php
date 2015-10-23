@extends('def')

@section('id','space')
@section('title')
- 安全设置
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	<div class="row">
		@include('settings.menu',['menu'=>'security'])
		<article class="col-md-9">
			<h3 class="settings-title">安全设置</h3>
			<div>
				
				<p>&nbsp;</p>
				@include('error')
				@if(session('success'))
				<div class="alert alert-success">
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              	<p>密码已成功修改！</p>
	            </div>
	            @endif
	            @if(session('wrong'))
				<div class="alert alert-danger">
	            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              	<p>{{session('wrong')}}</p>
	            </div>
	            @endif
				<form class="form-horizontal" action="/settings/cpass" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">现在的密码:</label>
					    <div class="col-sm-10 col-md-5">
					      <input type="password" class="form-control" name="password"  >
					    </div>
					 </div>
					 <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">新密码:</label>
					    <div class="col-sm-10 col-md-5">
					      <input type="password" class="form-control" name="new_password"  >
					    </div>
					 </div>
					 <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">确认新密码:</label>
					    <div class="col-sm-10 col-md-5">
					      <input type="password" class="form-control" name="new_password_confirm">
					    </div>
					 </div>
					 <div class="form-group">
					   <div class="col-sm-offset-2 col-sm-10">
					     <button type="submit" class="btn btn-info btn-lg">&nbsp; 确认修改 &nbsp;</button>
					   </div>
					 </div>
				</form>
				
				
				<p>&nbsp;</p>
			</div>
			
		</article>
	</div>
</div>

@endsection