	

<div class="container bg-white">
	<div class="row">
	  <div class="col-md-10 col-md-offset-1">
	  
			<p>&nbsp;@include('error')</p>
			<legend> {{ $action}}游记</legend>  	
	  </div>
	
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		{{--  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">昵称:</label>
			    <div class="col-sm-10  col-md-4">
			      <input type="text" class="form-control" id="name"  value="{{$user->name}}" placeholder="">
			    </div>
			  </div> --}}

			<div class="form-group">
				{!!Form::label('title','标题',['class'=>'has-error control-label'])!!}  <span class="text-danger">*</span>
				<div>
				{!!Form::text('title',null,['class'=>'form-control'])!!}
				</div>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1 ">
			
			<div class="form-group">
				{!!Form::label('place','地点')!!}  <span class="text-danger">*</span>
				{!!Form::text('place',null,['class'=>'form-control'])!!}
			</div>

			{{-- <div class="form-group">
				{!!Form::label('tags','关键词')!!} 
				{!!Form::text('tags',null,['class'=>'form-control'])!!}
			</div> --}}
			<div class="form-group">
				{!!Form::label('thumb','预览图')!!}  <span class="text-danger">*</span>
				{!!Form::input('file','thumb',null,['class'=>'form-control'])!!}
			</div>

		</div>
			
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="form-group">
				<label for="">正文</label> <span class="text-danger">*</span>
				<script id="container" name="content" type="text/plain" style="min-height:500px;"></script>
			</div>
			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="{{URL::previous()}}" class="btn btn-default">返回</a>
			
			<p>&nbsp;</p>

		</div>

	</div>

</div>
	

	
