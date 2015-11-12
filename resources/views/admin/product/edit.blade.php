@extends('app')
@section('css')
	<style>
		.product-thumbs{
			background: #f2f2f2;
			padding-top:10px;
		}
		.product-thumbs img{
			max-width: 100%;
			max-height: 150px;

		}

	</style>
@endsection


@section('content')
{!! Form::model($product,['method'=>'PUT','url'=>'/admin/products/'.$product->id,'enctype'=>'multipart/form-data']) !!}
{{-- <form action="/admin/products" method="POST" enctype="multipart/form-data"> --}}
<br>
<div class="container product-thumbs">
	<div class="row">
		<div class="col-md-3">
		   <p class="text-center"> <img src="{{asset($product->thumb)}}" alt="" > <br>预览图</p></div>
		<div class="col-md-9">
			
			<p class="text-center">
				@if($product->banner)
				<img src="{{asset($product->banner)}}" alt="" >
				@endif
				<br>
				顶部大图
			</p>
			
		</div>
	</div>
</div>
{!! Form::hidden('id') !!}	
{!! Form::hidden('redirect_to', URL::previous()) !!}
@include('admin.product.form',['action'=>'编辑'])
			

{!! Form::close() !!}
{{-- </form>	 --}}

@endsection

@section('js')

	@include('common.ueditorjs')

    @include('admin.product.editjs')

@endsection

