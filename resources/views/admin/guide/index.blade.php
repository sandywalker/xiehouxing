@extends('app')

@section('content')

	<h5 class="app-title"> 攻略管理 </h5>

	<div class="container-fluid" id="guideApp">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
					  <li @if($isbest==1) class="active" @endif><a href="/admin/guides?isbest=1">精华</a></li>
					  <li @if($isbest==0) class="active" @endif><a href="/admin/guides?isbest=0">普通</a></li>
				</ul>
				<p class="">
					<form action="/admin/guides" class="form-inline pull-right" >
						<input type="hidden" name="isbest" value="{{$isbest}}">
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
					</form>
					<a href="/admin/guides/create" class="btn btn-info "> + 添加 </a>
				</p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="80">预览图</th>
							<th>标题和简介</th>
							<th width="60">类型</th>
							<th width="80">地区</th>
							<th width="150">关键字</th>
							<th width="100">热度</th>
							<th width="60">评论</th>
							<th width="100">推荐指数</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody class="text-sm">
						@foreach($guides as $guide)
						<tr>
							<td>
								<div>
								  <a href="{{asset($guide->thumb)}}" class="guide-thumb"><img src="{{asset($guide->thumb)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td>
								@if($guide->isbest == 1)
									<span class="label label-success">精</span>
								@endif
								<span class="text-md">{{$guide->title }}</span>
								
								 <br>
								 <span class="text-muted text-sm">{{str_limit($guide->description,100)}}</span> 
							</td>
							<td> 
								@if($guide->types==0)
									国内
								@elseif($guide->types==1)
									国外
								@endif
							</td>
							<td>{{$guide->area}}</td>
							<td class="text-sm">{{$guide->tags}}</td>
							<td class="text-sm">
								<span class="text-main"> 点击： {{$guide->hits}} 次</span><br>
								<span class="text-success"> 点赞： {{$guide->likes}} 次</span><br>
								<span class="text-warning"> 收藏： {{$guide->favs}} 次</span><br>

							</td>
							<td> <a href="#" v-on="click:showComments({{$guide->id}});">{{$guide->cmts}}条</a></td>
							<td>
								<div class="rating text-orange">
									@for ($i = 0; $i < $guide->points; $i++)
										<span>★</span>    
									@endfor
								</div>
							</td>
							<td>
								<a href="/admin/guides/{{$guide->id}}" target="_blank" class="btn btn-success btn-xs ">预览</a>
								<a href="/admin/guides/{{$guide->id}}/edit" class="btn btn-info btn-xs ">编辑</a> 

								{!! Form::model($guide,['url'=>'/admin/guides/'.$guide->id,
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
				{!! $guides->appends(['isbest'=>$isbest,'key'=>$key])->render() !!}

			</div>
		</div>
		<guide-comments-modal 
			comments="@{{comments}}" 
			show="@{{show}}"
			on-close="@{{hideComments}}"
			on-delete="@{{deleteComment}}"
			/>
	</div>

@endsection

@section('js')
	<script src="{{ asset('/js/guide.js') }}"></script>
	<script>
			$('.guide-thumb').magnificPopup({type:'image'});

			
	</script>
@endsection