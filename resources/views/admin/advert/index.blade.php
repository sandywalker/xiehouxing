@extends('app')

@section('content')

	<h5 class="app-title"> 广告管理 </h5>

	<div class="container-fluid" id="advertApp">
		<div class="row">
			<div class="col-md-12">
				<p><a href="/admin/adverts/create" class="btn btn-info"> + 添加 </a></p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="80">代码</th>
							<th >标题</th>
							<th width="60">点击</th>
							<th width="60">状态</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($adverts as $advert)
						<tr>
							<td> <span class="text-success">{{ $advert->code }}</span> </td>
							<td> {{$advert->title }}</td>
							<td>{{$advert->hits}}</td>
							<td>@include('wedgits.states',['states'=>$advert->states])</td>
							<td>
								<a href="/admin/adverts/{{$advert->id}}" target="_blank" class="btn btn-success btn-xs ">预览</a>
								<a href="/admin/adverts/{{$advert->id}}/edit" class="btn btn-info btn-xs ">编辑</a> 

								{!! Form::model($advert,['url'=>'/admin/adverts/'.$advert->id,
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