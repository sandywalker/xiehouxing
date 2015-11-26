@extends('def')

@section('id','space')
@section('title')
- 用户设置
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	<div class="row">
		@include('settings.menu',['menu'=>''])
		<article class="col-md-9">
			<h3 class="settings-title">基础信息</h3>
			<p>&nbsp;</p>
			<form class="form-horizontal" method="POST" action="/settings/{{$user->id}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">昵称:</label>
			    <div class="col-sm-10  col-md-4">
			      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">性别:</label>
			    <div class="col-sm-10">
			      <label class="radio-inline">
					  <input type="radio" name="sex"  value="1" @if($user->sex == 1) checked="checked" @endif > 男
					</label>
					<label class="radio-inline">
					  <input type="radio" name="sex"  value="2" @if($user->sex == 2) checked="checked" @endif > 女
					</label>
					<label class="radio-inline">
					  <input type="radio" name="sex"  value="0"  @if($user->sex == 0) checked="checked" @endif > 保密
					</label>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">居住地:</label>
			    <div class="col-sm-10 col-md-4">
			      <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="occupation" class="col-sm-2 control-label">行业:</label>
			    <div class="col-sm-10 col-md-4">
			      <input type="text" class="form-control" id="occupation" name="occupation" value="{{$user->occupation}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="occupation" class="col-sm-2 control-label">微信:</label>
			    <div class="col-sm-10 col-md-4">
			      <input type="text" class="form-control" id="wechat" name="wechat" value="{{$user->wechat}}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="birth" class="col-sm-2 control-label">联系电话:</label>
			    <div class="col-sm-10 col-md-4">
			      <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$user->phone_number}}" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="birth" class="col-sm-2 control-label">出生日期:</label>
			    <div class="col-sm-10 col-md-4">
			      <input type="text" class="form-control" id="birth" name="birth" value="{{$user->birth}}" 
			      	placeholder="格式：1990-03-12">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="description" class="col-sm-2 control-label">个性签名:</label>
			    <div class="col-sm-10 col-md-8">
			      <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$user->description}}</textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info btn-lg">&nbsp; 保存 &nbsp;</button>
			    </div>
			  </div>
			</form>
		</article>
	</div>
</div>

@endsection