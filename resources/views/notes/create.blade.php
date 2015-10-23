@extends('def')

@section('id','space')
@section('title')
- 写游记
@endsection

@section('content')
@include('common.space-banner')

{!! Form::open(['url'=>'/notes','enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}


@include('notes.form',['action'=>'写'])

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container',{
         	toolbars: ueditorSettings
         });
     </script>

@endsection

