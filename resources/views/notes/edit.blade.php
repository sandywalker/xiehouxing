@extends('app')
@section('css')
	<style>
		.note-thumbs{
			background: #f2f2f2;
			padding-top:10px;
		}
		.note-thumbs img{
			max-width: 100%;
			max-height: 150px;

		}

	</style>
@endsection


@section('content')
{!! Form::model($note,['method'=>'PUT','url'=>'/notes/'.$note->id,'enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/notes" method="POST" enctype="multipart/form-data"> --}}
<br>
<div class="container note-thumbs">
	<div class="row">
		<div class="col-md-3">
		   <p class="text-center"> <img src="{{asset($note->thumb)}}" alt="" > <br>预览图</p></div>
		<div class="col-md-9">
			<p class="text-center"><img src="{{asset($note->banner_thumb)}}" alt="" ><br>顶部大图</p>
		</div>
	</div>
</div>
{!! Form::hidden('id') !!}	
{!! Form::hidden('redirect_to', URL::previous()) !!}
@include('admin.note.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container',{
         	toolbars: ueditorSettings
         });
         ue.ready(function() {
		    ue.setContent('{!! $note->content !!}');
		 });
     </script>

@endsection

