@extends('def')

@section('id','space')
@section('title')
- 喜好设置
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	<div class="row">
		@include('settings.menu',['menu'=>'like'])
		<article class="col-md-9">
			<h3 class="settings-title">喜好设置</h3>
			<div class="text-center">
				
				<p>&nbsp;</p>
				<p>正在开发中,敬请期待...</p>
				<p>&nbsp;</p>
			</div>
			
		</article>
	</div>
</div>

@endsection