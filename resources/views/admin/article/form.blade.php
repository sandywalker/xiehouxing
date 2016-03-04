	

<div class="container">
	<div class="row">
	  <div class="col-md-12">
			<p>&nbsp;@include('error')</p>
			<legend>{{ $action}}文章</legend>  	
	  </div>
	
	</div>
	<div class="row">
		<div class="col-md-12">

			<div class="form-group">
			 	{!!Form::label('tag','标签')!!} <span class="text-danger">*</span>
				{!!Form::select('tag',$tags,null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('title','标题',['class'=>'has-error'])!!}  <span class="text-danger">*</span>
				{!!Form::text('title',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('description','简介',['class'=>'has-error'])!!} 
				{!!Form::textarea('description',null,['class'=>'form-control','rows'=>'2'])!!}
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="">正文</label> <span class="text-danger">*</span>
				<script id="container" name="content" type="text/plain" style="min-height:500px;"></script>
			</div>
			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="{{URL::previous()}}" class="btn btn-default">取消</a>


		</div>
	</div>

</div>
	

	
