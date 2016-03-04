@extends('app')

@section('content')

<h5 class="app-title"> 活动订单管理 </h5>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<p>
				<form action="/admin/orders" class="form-inline pull-right" >
						<label for="">订单状态：
						<select name="states" class="form-control" id="">
							<option value="">所有状态</option>
							<option value="0" @if($states == 0) selected="selected" @endif >待支付</option>
							<option value="1" @if($states == 1) selected="selected" @endif >已支付</option>
							<option value="2" @if($states == 2) selected="selected" @endif >支付失败</option>
						</select>
						</label>
						<label for="">&nbsp;&nbsp;&nbsp;&nbsp;支付方式：
						<select name="approach" class="form-control" id="">
							<option value="">全部</option>
							<option value="0" @if($approach == 0) selected="selected" @endif>在线</option>
							<option value="1" @if($approach == 1) selected="selected" @endif>离线n</option>
						</select>
						</label>
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
				</form>
				<br><br>
			</p>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th width="200">活动</th>
						<th>订单号</th>
						<th width="100">用户</th>
						<th width="100">报名人数</th>
						<th width="150">联系电话</th>
						<th width="150">下单时间</th>
						<th width="100">金额</th>
						<th width="100">支付方式</th>
						<th width="100">状态</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td class="text-info">
								<a href="/activities/{{$order->activity->id}}" target="_blank">{{$order->activity->title}}</a>
							</td>
							<td>
								<span>{{$order->code}}</span> 
         					</td>
         					<td class="text-sm">
         						{{$order->user->name}}
         					</td>
         					<td class="text-sm">
         						{{$order->member_count}}
         					</td>
         					<td >
         						{{$order->phone_number}}
         					</td>
         					<td class="text-sm text-muted">
         						{{fdate($order->created_at)}}
         					</td>
         					<td class="text-orange">
         						{{$order->amount}}元
         					</td>
         					<td>
         						@include('activity.order.approach',['approach'=>$order->approach])
         					</td>
         					<td>
         						@include('activity.order.states',['states'=>$order->states])
         					</td>
         					<td>
         						@if($order->state == 0)
         							{{-- @include('wedgits.link-delete',['action'=>'/admin/gorders/'.$order->id]) --}}
         						@endif
         					</td>
						</tr>

					@endforeach
				</tbody>
			</table>
			{!! $orders->appends(['key'=>$key,'states'=>$states,'approach'=>$approach])->render() !!}
		</div>
	</div>
</div>


@endsection

@section('js')
	<script>
			
	</script>
@endsection