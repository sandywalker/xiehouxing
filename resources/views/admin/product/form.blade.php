	

<div class="container">
	<div class="row">
	  <div class="col-md-12">
			<p>&nbsp;@include('error')</p>
			<legend>{{ $action}} 产品</legend>  	
	  </div>
	
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				{!!Form::label('title','标题',['class'=>'has-error'])!!}  <span class="text-danger">*</span>
				{!!Form::text('title',null,['class'=>'form-control input-sm'])!!}
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 ">
			
			
			 <div class="form-group">
			 	{!!Form::label('types','类型')!!} <span class="text-danger">*</span>
				{!!Form::select('types',['0'=>'国内','1'=>'国外','2'=>'同城'],null,['class'=>'form-control input-sm'])!!}
			</div>

			
			

			<div class="form-group">
				{!!Form::label('tags','主题')!!} <span class="text-danger">*</span>
				{!!Form::select('tags',$tags,null,['class'=>'form-control input-sm','id'=>'tags','multiple'=>'multiple'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('highlights','产品亮点')!!} 
				{!!Form::text('highlights',null,['class'=>'form-control input-sm'])!!}
			</div>
			



		</div>

		<div class="col-md-3">
			
			<div class="form-group">
				{!!Form::label('place','目的地')!!}  <span class="text-danger">*</span>
				{!!Form::text('place',null,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
			 	{!!Form::label('member_size','人数')!!} <span class="text-danger">*</span>
				{!!Form::input('number','member_size',10,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('from_place','出发地')!!}  
				{!!Form::text('from_place',null,['class'=>'form-control input-sm'])!!}
			</div>

			


		</div>
		<div class="col-md-3">
			
			
			
			<div class="form-group">
			 	{!!Form::label('days','活动天数')!!} <span class="text-danger">*</span>
				{!!Form::input('number','days',1,['class'=>'form-control input-sm'])!!}
			</div>
			

			
			
			<div class="form-group">
			 	{!!Form::label('prcie','价格')!!}  <span class="text-danger">*</span>
				{!!Form::input('number','prcie',80,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
			 	{!!Form::label('original_prcie','原价')!!} 
				{!!Form::input('number','original_prcie',90,['class'=>'form-control input-sm'])!!}
			</div>

			
			
		</div>
		<div class="col-md-3 ">
			<div class="form-group">
				{!!Form::label('thumb','预览图')!!}  <span class="text-danger">*</span>
				{!!Form::input('file','thumb',null,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('banner','主图')!!} 
				{!!Form::input('file','banner',null,['class'=>'form-control input-sm'])!!}
			</div>

			
			<div class="form-group">
			 	{!!Form::label('istop','是否首页')!!} <span class="text-danger">*</span>
				{!!Form::select('istop',['0'=>'否','1'=>'是'],1,['class'=>'form-control input-sm'])!!}
			</div>

			

		</div>
			
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				{!!Form::label('description','简介')!!} 
				{!!Form::textarea('description',null,['class'=>'form-control input-sm','rows'=>'2'])!!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">行程信息 <span class="text-danger">*</span> </a></li>
			    <li role="presentation"><a href="#traffic" aria-controls="traffic" role="tab" data-toggle="tab">参考交通</a></li>
			    <li role="presentation"><a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">参考住宿</a></li>
			    <li role="presentation"><a href="#qa" aria-controls="qa" role="tab" data-toggle="tab">常见问题</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
			    	<script id="container" name="content" type="text/plain" style="min-height:500px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="traffic">
			    	<script id="traffic" name="traffic" type="text/plain" style="min-height:500px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="hotel">
			    	<script id="hotel" name="hotel" type="text/plain" style="min-height:500px;"></script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="qa">
			    	<script id="qa" name="qa" type="text/plain" style="min-height:500px;"></script>
			    </div>
			  </div>

			</div>		
			<br>
			
			<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;
			<a href="{{URL::previous()}}" class="btn btn-default">取消</a>


		</div>
	</div>

</div>
	

	
