@extends('app')

@section('content')

	<h5 class="app-title"> 活动管理 </h5>
	<div class="container-fluid" id="activityApp">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs">
					  <li @if($states==0) class="active" @endif><a href="/admin/activities?states=0">
					  	<span class="text-orange">报名中</span></a></li>
					  <li @if($states==1) class="active" @endif><a href="/admin/activities?states=1"><span class="text-success">活动中</span></a></li>
					  <li @if($states==2) class="active" @endif><a href="/admin/activities?states=2">
					  <span class="text-muted">已结束</span>	</a></li>
					  <li @if($states== 100) class="active" @endif><a href="/admin/activities?states=100">
					  	<span class="text-danger">已取消</span></a></li>
				</ul>
				<p class="">
					<form action="/admin/activities" class="form-inline pull-right" >
						<input type="hidden" name="states" value="{{$states}}">
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
					</form>
					@if($states==0)
						<a href="#" class="btn btn-info " id="addActivity"> + 添加活动 </a>
					@endif
					<div class="clearfix"></div>
				</p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="40">ID</th>
							<th width="80">预览图</th>
							<th>标题和简介</th>
							<th width="150">出行时间</th>
							<th width="60">类型</th>
							<th width="80">目的地</th>
							<th width="80">天数</th>
							<th width="150">主题</th>

							<th width="100">热度</th>
							<th width="80">状态</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody class="text-sm">
						@foreach($activities as $activity)
						<tr>	
							<td>{{$activity->id}}</td>
							<td>
								<div>
								  <a href="{{asset($activity->thumb)}}" class="activity-thumb"><img src="{{asset($activity->thumb)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td>
								@if($activity->istop == 1)
									<span class="label label-success">顶</span>
								@endif

								<span class="text-md" >{{$activity->title }}</span>
								 <br>
								 <span class="text-muted text-sm">{{str_limit($activity->description,100)}}</span> 
							</td>
							<td>
								{{ fdate($activity->start_date) }}
							</td>
							<td> 
								@include('wedgits.types',['types'=>$activity->types])
							</td>
							<td>{{$activity->place}}</td>
							<td>{{$activity->days}}</td>
							<td class="text-sm">{{$activity->tags}}</td>
							<td class="text-sm">
								<span class="text-main"> 总点击： {{$activity->hits}} 次</span><br>
								<span class="text-success"> 总成交： {{$activity->deals}} 次</span><br>
							</td>
							<td>
								@include('wedgits.activity-states',['states'=>$activity->states])
							</td>
							<td>
								{{-- <a href="/admin/activities/{{$activity->id}}" target="_blank" class="btn btn-success btn-xs ">预览</a> --}}
								<a href="/admin/activities/{{$activity->id}}/edit" class="btn btn-info btn-xs ">编辑</a> 
								<a href="/admin/activities/{{$activity->id}}/photos" class="btn btn-success btn-xs ">照片</a> 
								@include('wedgits.link-delete',['action' => '/admin/activities/'.$activity->id])

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $activities->appends(['key'=>$key,'states'=>$states])->render() !!}

			</div>
		</div>
	</div>

	<div id="productsModal" class="modal"></div>

@endsection

@section('js')
	<!--<script src="{{ asset('/js/activity.js') }}"></script>-->
	<script>
			var $pm = $('#productsModal');

			$('.activity-thumb').magnificPopup({type:'image'});

			

			$('#addActivity').on('click',function(e){
				e.preventDefault();
				var $this = $(this);
				$.ajax({
					url:'/admin/activities/select/products',
					success:function(html){
						$pm.html(html).modal('show');
					}
				});
			});

			$pm.on('click','.media',function(e){
				e.preventDefault();
				var $this = $(this);
				$this.addClass('active').siblings().removeClass('active');
			});

			$pm.on('click','.btn-primary',function(e){
				e.preventDefault();
				var $product = $('.media.active');
				var startTime = $('#startTime').val();
				if (!$product.length){
					alert('请选择产品！');
					return;
				}
				if (!startTime){
					alert('请填写活动时间！');
					return;
				}
				$.ajax({
					url:'/admin/activities',
					type:'POST',
					data:{pid:$product.data('id'),startTime:startTime},
					success:function(ok){
						if (ok){
							location.reload();
						}
					}
				});
				


			});


	</script>
@endsection