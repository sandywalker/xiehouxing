@extends('app')
@section('css')
	<style>
		.guide-thumbs{
			background: #f2f2f2;
			padding-top:10px;
		}
		.guide-thumbs img{
			max-width: 100%;
			max-height: 150px;

		}

	</style>
@endsection


@section('content')
{!! Form::model($guide,['method'=>'PUT','url'=>'/admin/guides/'.$guide->id,'enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/guides" method="POST" enctype="multipart/form-data"> --}}
<br>
<div class="container guide-thumbs">
	<div class="row">
		<div class="col-md-3">
		   <p class="text-center"> <img src="{{asset($guide->thumb)}}" alt="" > <br>预览图</p></div>
		<div class="col-md-9">
			<p class="text-center"><img src="{{asset($guide->banner_thumb)}}" alt="" ><br>顶部大图</p>
		</div>
	</div>
</div>
{!! Form::hidden('id') !!}	
{!! Form::hidden('redirect_to', URL::previous()) !!}
@include('admin.guide.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container');
         ue.ready(function() {
		    ue.setContent('{!! $guide->content !!}');
		 });
     </script>

@endsection

