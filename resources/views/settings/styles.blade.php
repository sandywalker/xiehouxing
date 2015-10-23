@extends('def')

@section('id','space')
@section('title')
- 空间设置
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	<div class="row">
		@include('settings.menu',['menu'=>'style'])
		<article class="col-md-9">
			<h3 class="settings-title">空间设置</h3>
			<div class="text-center">
				<form action="/settings/styles" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p>&nbsp;</p>
					<h4>空间大图</h4>
					<p><img src="{{asset($user->banner)}}" alt="" class="full-width"></p>
					<div class="settings-file">
						<p><input type="file" name="photo" class="file form-control"></p>
					</div>


					<p>&nbsp;</p>
					<div class="divider"></div>
					<p>&nbsp;</p>

					<h4>我的头像</h4>
					<p><img src="{{asset($user->avatar)}}" alt="" class="thumb-lg thumb-round"></p>
					<p>
						<div class="settings-file">
							<input type="file" name="avatar" class="file form-control">	
						</div>
					</p>
					
					<p>&nbsp;</p>
					<div class="divider"></div>
					<button class="btn btn-info btn-lg btn-block" type="submit">提交更新</button>
				</form>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
			
		</article>
	</div>
</div>

@endsection