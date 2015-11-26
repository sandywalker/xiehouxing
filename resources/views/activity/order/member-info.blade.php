<table class="table table-bordered ">
	<thead>
		<th width="120">状态</th>
		<th width="120">称呼</th>
		<th width="150">联系电话</th>
		<th width="120">性别</th>
		<th width="120">人数</th>
		<th>同行伙伴</th>
	</thead>
	<tbody>
		<td>@include('activity.states',['states'=>-1])</td>
		<td>{{$member->name}}</td>
		<td>{{$member->phone_number}}</td>
		<td>@include('wedgits.sex',['sex'=>$member->sex])</td>
		<td>{{$member->count}}</td>
		<td>{{$member->companion}}</td>
	</tbody>
</table>