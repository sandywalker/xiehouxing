@extends('app')
@section('css')
	<style>
		.activity-thumbs{
			background: #f2f2f2;
			padding-top:10px;
		}
		.activity-thumbs img{
			max-width: 100%;
			max-height: 150px;

		}

	</style>
@endsection


@section('content')
{!! Form::model($activity,['method'=>'PUT','url'=>'/admin/activities/'.$activity->id,'enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/activities" method="POST" enctype="multipart/form-data"> --}}
<br>
<div class="container activity-thumbs">
	<div class="row">
		<div class="col-md-3">
		   <p class="text-center"> <img src="{{asset($activity->thumb)}}" alt="" > <br>预览图</p></div>
		<div class="col-md-9">
			
			<p class="text-center">
				@if($activity->banner)
				<img src="{{asset($activity->banner)}}" alt="" >
				@endif
				<br>
				顶部大图
			</p>
			
		</div>
	</div>
</div>
{!! Form::hidden('id') !!}	
{!! Form::hidden('redirect_to', URL::previous()) !!}
@include('admin.activity.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container');
         ue.ready(function() {
		    ue.setContent('{!! $activity->content !!}');
		 });

		 var ueTraffic = UE.getEditor('traffic');
		 ueTraffic.ready(function() {
		    ueTraffic.setContent('{!! $activity->traffic !!}');
		 });			 
         var ueHotel = UE.getEditor('hotel');
         ueHotel.ready(function() {
		    ueHotel.setContent('{!! $activity->hotel !!}');
		 });
         var ueQA = UE.getEditor('qa');
         ueQA.ready(function() {
		    ueQA.setContent('{!! $activity->qa !!}');
		 });

         $('#tags').select2();


     </script>

@endsection

