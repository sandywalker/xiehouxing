@extends('app')

@section('content')

	<h5 class="app-title"> 攻略管理 </h5>

	<div class="container-fluid" id="guideApp">
		<div class="row">
			<div class="col-md-12">
				<p>
					<form action="" class="form-inline pull-right" >
						<input type="text" class="form-control">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
					</form>
					<a href="/admin/guides/create" class="btn btn-info"> + 添加 </a>
				</p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="80">预览图</th>
							<th>标题和简介</th>
							<th width="60">类型</th>
							<th width="80">地区</th>
							<th width="100">关键字</th>
							<th width="120">热度</th>
							<th width="80">评论</th>
							<th width="120">推荐指数</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($guides as $guide)
						<tr>
							<td>
								<div>
								  <a href="{{asset($guide->thumb)}}" class="guide-thumb"><img src="{{asset($guide->thumb)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td>{{$guide->title }} <br> <span class="text-muted">{{$guide->description}}</span> </td>
							<td> {{$guide->types }}</td>
							<td>{{$guide->area}}</td>
							<td>{{$guide->tags}}</td>
							<td>
								<span> 点击： {{$guide->hits}}</span><br>
								<span> 点赞： {{$guide->likes}}</span><br>
								<span> 收藏： {{$guide->favs}}</span><br>

							</td>
							<td>{{$guide->cmts}}</td>
							<td>
								<a href="/admin/guides/{{$guide->id}}" target="_blank" class="btn btn-success btn-xs ">预览</a>
								<a href="/admin/guides/{{$guide->id}}/edit" class="btn btn-info btn-xs ">编辑</a> 

								{!! Form::model($guide,['url'=>'/admin/guides/'.$guide->id,
														 'method'=>'DELETE',
														 'class'=>'inblock']) !!}
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

	<script>

			$('.btn-remove').on('click',function(e){
				if (confirm('您确定删除这条数据吗?')){
					return true;
				}
				return false;
			});
	</script>
@endsection