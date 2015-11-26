@extends('app')

@section('content')

<h5 class="app-title"> 游记评论管理 </h5>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<p>
				<form action="/admin/ncomments" class="form-inline pull-right" >
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
				</form>
				<br><br>
			</p>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="200">攻略</th>
						<th>评论</th>
						<th width="100">评论人</th>
						<th width="150">发表时间</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($comments as $comment)
						<tr>
							<td class="text-info"><a href="/notes/{{$comment->note->id}}" target="_blank">{{$comment->note->title}}</a></td>
							<td>
								
								<span>{{$comment->title}}</span> 
								@if($comment->title)
									<br>
								@endif
         						@if($comment->isbest == 1)
									<span class="label label-success">精</span>
								@endif
         						<span class="text-muted" >
         						{{$comment->content}}
         						</span>
         					</td>
         					<td class="text-sm">
         						{{$comment->user->name}}
         					</td>
         					<td class="text-sm text-muted">
         						{{$comment->created_at}}
         					</td>
         					<td>
         						@if ($comment->isbest)
         							<a href="/admin/ncomments/{{$comment->id}}/setbest?value=0" class="btn btn-warning btn-xs">取消精华</a>
         						@else	
         							<a href="/admin/ncomments/{{$comment->id}}/setbest?value=1" class="btn btn-success btn-xs">设为精华</a>
         						@endif
         						{!! Form::model($comment,['url'=>'/admin/ncomments/'.$comment->id,
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
	<script>
			
	</script>
@endsection