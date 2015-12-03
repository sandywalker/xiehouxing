<table class="table table-bordered text-sm">
		<thead>
			@if($atitle)
			<th>活动</th>
			@endif
			
			@if($user->isme())
			<th width="80">称呼</th>
			<th width="100">联系电话</th>
			@endif
			<th width="60">性别</th>
			<th width="60">人数</th>
			<th width="120">同行伙伴</th>
			
			@if($user->isme())
			<th width="70">状态</th>
			<th width="120" class="text-center">操作</th>
			@endif
		</thead>
		<tbody>
			@if($atitle)
			  <td class="link-orange"> <a href="/activities/{{$member->activity->id}}" target="_blank">{{$member->activity->title}}</a> </td>
			@endif
			
			@if($user->isme())
			<td>{{$member->name}}</td>
			<td>{{$member->phone_number}}</td>
			@endif
			<td>@include('wedgits.sex',['sex'=>$member->sex])</td>
			<td>{{$member->count}}</td>
			<td>{{$member->companion}}</td>
			
			@if($user->isme())
			<td>@include('activity.states',['states'=>$member->states])</td>
			<td>

				@if ($member->states == 0)
					<a href="/activities/{{$member->activity->id}}/orders/create?memberId={{$member->id}}" class="btn btn-warning btn-xs">下订单</a> &nbsp;&nbsp;
					<a  class="btn-remove" href="/activities/{{$activity->id}}/cancel/{{$member->id}}" data-message="机会难得，您确定取消此次活动报名吗？">取消</a>
				@elseif($member->states > 0)
					<a href="/activities/orders/{{$member->order->id}}" class="btn btn-success btn-xs" target="_blank">查看订单</a>
				@endif
			</td>
			@endif

		</tbody>
	</table>