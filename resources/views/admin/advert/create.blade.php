@extends('app')



@section('content')
{!! Form::open(['url'=>'/admin/adverts']) !!}
{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}


@include('admin.advert.form',['action'=>'添加'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection