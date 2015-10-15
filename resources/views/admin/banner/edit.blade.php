@extends('app')



@section('content')
{!! Form::model($banner,['method'=>'PUT','url'=>'/admin/banners/'.$banner->id]) !!}

{{-- <form action="/admin/banners" method="POST" enctype="multipart/form-data"> --}}

{!! Form::hidden('id') !!}			    
@include('admin.banner.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

