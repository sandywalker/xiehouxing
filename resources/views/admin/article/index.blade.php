

@extends('app')

@section('content')

	<h5 class="app-title"> 文章管理 </h5>

	<div class="container-fluid" id="articleApp">
		<div class="row">
			<div class="col-md-12">
				<p><a href="/admin/articles/create" class="btn btn-info"> + 添加 </a></p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="100">标签</th>
							<th>标题(描述)</th>
							<th width="120">操作</th>  
						</tr>
					</thead>
					<tbody>
						@foreach($articles as $article)
						<tr>
							
							<td> <span class="label label-success">{{ $tags[$article->tag] }}</span> </td>
							<td> {{$article->title }} <br> <span class="text-muted">{{$article->description}}</span> </td>
							<td>
								<a href="/admin/articles/{{$article->id}}/edit" class="btn btn-info btn-xs pull-left">编辑</a> 

								{!! Form::model($article,['url'=>'/admin/articles/'.$article->id,'method'=>'DELETE','class'=>'pull-left']) !!}
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
			
	</script>
@endsection
