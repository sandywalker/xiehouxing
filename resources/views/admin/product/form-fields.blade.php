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
				{!!Form::input('number','member_size',null,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('from_place','出发地')!!}  
				{!!Form::text('from_place',null,['class'=>'form-control input-sm'])!!}
			</div>

			


		</div>
		<div class="col-md-3">
			
			
			
			<div class="form-group">
			 	{!!Form::label('days','活动天数')!!} <span class="text-danger">*</span>
				{!!Form::input('number','days',null,['class'=>'form-control input-sm'])!!}
			</div>
			
			
			<div class="form-group">
			 	{!!Form::label('price','价格')!!}  <span class="text-danger">*</span>
				{!!Form::input('number','price',null,['class'=>'form-control input-sm'])!!}
			</div>

			<div class="form-group">
			 	{!!Form::label('original_price','原价')!!} 
				{!!Form::input('number','original_price',null,['class'=>'form-control input-sm'])!!}
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