@extends('app')



@section('content')
{!! Form::model($article,['method'=>'PUT','url'=>'/admin/articles/'.$article->id,'enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/articles" method="POST" enctype="multipart/form-data"> --}}

{!! Form::hidden('id') !!}	
{!! Form::hidden('redirect_to', URL::previous()) !!}
@include('admin.article.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container');
         ue.ready(function() {
		    ue.setContent('{!! $article->content !!}');
		 });
     </script>

@endsection

