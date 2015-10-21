@extends('app')



@section('content')
{!! Form::open(['url'=>'/admin/guides','enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}


@include('admin.guide.form',['action'=>'添加'])

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container');
     </script>

@endsection

