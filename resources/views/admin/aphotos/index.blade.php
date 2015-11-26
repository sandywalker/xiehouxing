@extends('app')


@section('css')
<link rel="stylesheet" href="{{asset('css/vendor/dropzone.css')}}">
@endsection

@section('content')

<h5 class="app-title"> <a href="{{URL::previous()}}" class="pull-right"> 返回 </a> {{$activity->title}} 照片集 </h5>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form action="/admin/activities/{{$activity->id}}/photos" class="dropzone" id="dropZoneForm">
				{{csrf_field()}}
			</form>
			<p>&nbsp;</p>
		</div>
	</div>
	<div class="row">
		@if(count($photos)>0)
			@foreach($photos as $photo)
			<div class="col-xs-6 col-md-3">
			    <div  class="thumbnail">
			      <a href="{{asset($photo->photo)}}"  class="photo-thumb">
			      	<img src="{{asset($photo->thumb)}}" alt="...">
			      </a>	
				<div class="caption">
			    	<h4>{{$photo->title}}&nbsp;</h4>
			    	<div>
			    		<a href="#" class="btn btn-primary btn-xs" role="button">编辑</a> 
			    		@include('wedgits.link-delete',['action' => '/admin/activities/photos/'.$photo->id])
			    	</div>		
			    </div>
			    </div>
			 </div>
			 @endforeach
		 @else
			<div class="col-md-12">
				<p class="text-center alert alert-info">
					还没有照片，传几张吧！
				</p>
			</div>
		 @endif
	</div>
</div>

@endsection

@section('js')
<script src="{{asset('js/vendor/dropzone.js')}}"></script>

<script>
	(function(){

		$('.photo-thumb').magnificPopup({type:'image'});
			
		Dropzone.options.dropZoneForm  = {
			acceptedFiles:'.jpg, .jpeg, .png',
			dictDefaultMessage:'点击上传或者把文件拖到这里',
			complete:function(){
				setTimeout(function(){
					location.reload();
				},3000);
				
			}
		};
	})();
</script>

@endsection