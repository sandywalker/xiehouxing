@extends('app')



@section('content')
{!! Form::model($advert,['method'=>'PUT','url'=>'/admin/adverts/'.$advert->id]) !!}

{{-- <form action="/admin/adverts" method="POST" enctype="multipart/form-data"> --}}

			    
@include('admin.advert.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection


@section('js')

	

@endsection
