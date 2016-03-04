@extends('app')

@section('content')

	<h5 class="app-title"> 产品管理 </h5>

	<div class="container-fluid" id="productApp">
		<div class="row">
			<div class="col-md-12">
				<p class="">
					<form action="/admin/products" class="form-inline pull-right" >
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
					</form>
					<a href="/admin/products/create" class="btn btn-info "> + 添加 </a>
				</p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="40">ID</th>
							<th width="80">预览图</th>
							<th>标题和简介</th>
							<th width="60">类型</th>
							<th width="80">目的地</th>
							<th width="80">天数</th>
							<th width="150">主题</th>
							
							<th width="100">热度</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody class="text-sm">
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>
								<div>
								  <a href="{{asset($product->thumb)}}" class="product-thumb"><img src="{{asset($product->thumb)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td>
								<span class="text-md">{{$product->title }}</span>
								 <br>
								 <span class="text-muted text-sm">{{str_limit($product->description,100)}}</span> 
							</td>
							<td> 
								@include('wedgits.types',['types'=>$product->types])
							</td>
							<td>{{$product->place}}</td>
							<td>{{$product->days}}</td>
							<td class="text-sm">{{$product->tags}}</td>
							<td class="text-sm">
								<span class="text-main"> 总点击： {{$product->hits}} 次</span><br>
								<span class="text-success"> 总成交： {{$product->deals}} 次</span><br>
							</td>
							<td>
								{{-- <a href="/admin/products/{{$product->id}}" target="_blank" class="btn btn-success btn-xs ">预览</a> --}}
								<a href="/admin/products/{{$product->id}}/edit" class="btn btn-info btn-xs ">编辑</a> 

								{!! Form::model($product,['url'=>'/admin/products/'.$product->id,
														 'method'=>'DELETE',
														 'class'=>'inblock']) !!}
								{!! Form::hidden('redirect_to', Request::url()) !!}	
								<button type="submit" class="btn btn-danger btn-xs btn-remove">删除</buton>
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				

			</div>
		</div>
	</div>

@endsection

@section('js')
	<!--<script src="{{ asset('/js/product.js') }}"></script>-->
	<script>
			$('.product-thumb').magnificPopup({type:'image'});

			
	</script>
@endsection