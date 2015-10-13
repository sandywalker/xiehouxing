	

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>&nbsp;</p>
			<legend>{{ $action}}横幅</legend>
			 {!! Form::hidden('path') !!}
			 <div class="form-group">
			 	{!!Form::label('title','标签')!!} <span class="text-danger">*</span>
				{!!Form::select('tag',$tags,null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('title','标题')!!} <span class="text-danger">*</span>
				{!!Form::text('title',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('description','描述')!!} 
				{!!Form::textarea('description',null,['class'=>'form-control','rows'=>'3'])!!}
			</div>
			@if($action=='添加')
			<div class="form-group">
				<label for=""> 横幅图片 <span class="text-danger">*</span></label>
				<input type="file" class="form-control" name="photo" placeholder="横幅图片">
			</div>
			@endif
			 <div class="form-group">
			 	{!!Form::label('link','链接地址')!!} 
				{!!Form::text('link',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('target','打开方式')!!} 
				{!!Form::select('target',['_blank'=>'新页面','_self'=>'本页面'],'_blank',['class'=>'form-control'])!!}
			</div>
			 <div class="form-group">
			 	{!!Form::label('orders','排序')!!} 
				{!!Form::input('number','orders',1,['class'=>'form-control'])!!}
			</div>


			{{-- <div class="form-group">
				<label for="">Html内容</label>
				<script id="container" name="content" type="text/plain"></script>
			</div> --}}


			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="/admin/banners" class="btn btn-default">取消</a>

			<p>
			@include('error')
			</p>

		</div>
	</div>
</div>
	

	
