@extends('app')



@section('content')
{!! Form::model($seo,['method'=>'PUT','url'=>'/admin/seo/'.$seo->id]) !!}
   

	

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>&nbsp;</p>
			<legend>编辑SEO信息</legend>
			 <div class="form-group">
			 	{!!Form::label('tag','页面')!!} <span class="text-danger"></span>
				{!!Form::text('tag',null,['class'=>'form-control','readonly'=>'readonly'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('title','title')!!} <span class="text-danger"></span>
				{!!Form::text('title',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('keywords','keywords')!!} 
				{!!Form::textarea('keywords',null,['class'=>'form-control','rows'=>'3'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('description','description')!!} 
				{!!Form::textarea('description',null,['class'=>'form-control','rows'=>'3'])!!}
			</div>

			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="/admin/seo" class="btn btn-default">取消</a>

			<p>
			@include('error')
			</p>

		</div>
	</div>
</div>
	

	

			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

