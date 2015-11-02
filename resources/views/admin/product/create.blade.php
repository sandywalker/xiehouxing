@extends('app')



@section('content')
{!! Form::open(['url'=>'/admin/products','enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}


@include('admin.product.form',['action'=>'添加'])

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    <script type="text/javascript">
         var ue = UE.getEditor('container');
         var ueTraffic = UE.getEditor('traffic');
         var ueHotel = UE.getEditor('hotel');
         var ueQA = UE.getEditor('qa');

         $('#tags').select2();
     </script>

@endsection

