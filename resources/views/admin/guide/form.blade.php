	

<div class="container">
	<div class="row">
	  <div class="col-md-12">
			<p>&nbsp;@include('error')</p>
			<legend>{{ $action}}攻略</legend>  	
	  </div>
	
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				{!!Form::label('title','标题',['class'=>'has-error'])!!}  <span class="text-danger">*</span>
				{!!Form::text('title',null,['class'=>'form-control'])!!}
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 ">
			
			
			 <div class="form-group">
			 	{!!Form::label('types','类型')!!} <span class="text-danger">*</span>
				{!!Form::select('types',['0'=>'国内','1'=>'国外'],null,['class'=>'form-control'])!!}
			</div>


			<div class="form-group">
				{!!Form::label('area','所属地区')!!}  <span class="text-danger">*</span>
				{!!Form::text('area',null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('tags','关键词')!!} 
				{!!Form::text('tags',null,['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('description','简介')!!} 
				{!!Form::textarea('description',null,['class'=>'form-control','rows'=>'2'])!!}
			</div>


		</div>
		<div class="col-md-6 ">
			<div class="form-group">
				{!!Form::label('thumb','预览图')!!}  <span class="text-danger">*</span>
				{!!Form::input('file','thumb',null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('banner_thumb','顶部大图')!!} 
				{!!Form::input('file','banner_thumb',null,['class'=>'form-control'])!!}
			</div>

			 <div class="form-group">
			 	{!!Form::label('isbest','是否精华')!!} <span class="text-danger">*</span>
				{!!Form::select('isbest',['0'=>'否','1'=>'是'],null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
			 	{!!Form::label('orders','排序')!!} 
				{!!Form::input('number','orders',1,['class'=>'form-control'])!!}
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
			<a href="/admin/guides" class="btn btn-default">取消</a>


		</div>
	</div>

</div>
	

	
