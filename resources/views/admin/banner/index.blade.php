@extends('app')

@section('content')

	<h5 class="app-title"> 横幅管理 </h5>

	<div class="container-fluid" id="bannerApp">
		<div class="row">
			<div class="col-md-12">
				<p><a href="/admin/banners/create" class="btn btn-info"> + 添加 </a></p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="120">预览</th>
							<th width="300">标题(描述)</th>
							<th>标签</th>
							<th>链接</th>
							<th width="80">打开方式</th>
							<th width="120">宽高</th>
							<th width="60">点击</th>
							<th width="60">排序</th>
							<th width="60">状态</th>
							<th width="120">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($banners as $banner)
						<tr>
							<td>
								<div>
								  <a href="{{asset($banner->path)}}" class="banner-thumb"><img src="{{asset($banner->path)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td> {{$banner->title }} <br> <span class="text-muted">{{$banner->description}}</span> </td>
							<td> <span class="label label-success">{{ $banner->tag }}</span> </td>
							<td>
							  <a href="{{$banner->link}}" target="_blank">{{$banner->link}}</a> 
							 </td>
							<td>{{$banner->target}}</td>
							<td>{{$banner->width.' x '.$banner->height}}</td>
							<td>{{$banner->hits}}</td>
							<td>{{$banner->orders}}</td>
							<td>
							   @include('wedgits.states',['states'=>$banner->states])
							 </td>
							<td>
								<a href="/admin/banners/{{$banner->id}}/edit" class="btn btn-info btn-xs pull-left">编辑</a> 

								{!! Form::model($banner,['url'=>'/admin/banners/'.$banner->id,'method'=>'DELETE','class'=>'pull-left']) !!}
								&nbsp;<button type="submit" class="btn btn-danger btn-xs btn-remove">删除</buton>
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

	<script>
			$('.banner-thumb').magnificPopup({type:'image'});

			$('.btn-remove').on('click',function(e){
				if (confirm('您确定删除这条数据吗?')){
					return true;
				}
				return false;
			});
	</script>
@endsection