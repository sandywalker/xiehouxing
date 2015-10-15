	

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>&nbsp;</p>
			<legend>{{ $action}}广告</legend>
			 <div class="form-group">
			 	{!!Form::label('code','代码')!!} <span class="text-danger">*</span>
				{!!Form::text('code',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('title','标题')!!} 
				{!!Form::text('title',null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('content','内容')!!} 
				{!!Form::textarea('content',null,['class'=>'form-control'])!!}
			</div>

			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="/admin/adverts" class="btn btn-default">取消</a>

			<p>
			@include('error')
			</p>

		</div>
	</div>
</div>
	

	
