	

<div class="container">
	<div class="row">
	  <div class="col-md-12">
			<p>&nbsp;@include('error')</p>
			<legend>{{ $action}} 产品</legend>  	
	  </div>
	
	</div>
	@include('admin.product.form-fields')
	<div class="row">
		<div class="col-md-4">
			{!!Form::label('start_date','出发时间')!!}  <span class="text-danger">*</span>
			{!!Form::text('start_date',fdate($activity->start_date),['class'=>'form-control input-sm'])!!}
		</div>
		<div class="col-md-4">
			{!!Form::label('istop','是否置顶')!!} <span class="text-danger">*</span>
			{!!Form::select('istop',[1=>'置顶',0=>'不置顶'],null,['class'=>'form-control input-sm','id'=>'istop'])!!}
		</div>
		<div class="col-md-4">
			{!!Form::label('states','状态')!!} <span class="text-danger">*</span>
			{!!Form::select('states',[0=>'报名中',1=>'已成行',2=>'已结束',100=>'取消'],null,['class'=>'form-control input-sm','id'=>'states'])!!}
		</div>
	</div>
	<p>&nbsp;</p>
	@include('admin.product.form-editors')
</div>