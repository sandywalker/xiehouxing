<table class="table table-bordered">
				<thead>
					<tr>
						<th>单人费用</th>
						<th>报名人数</th>
						<th>折扣</th>
						<th>合计费用</th>
					</tr>	
				</thead>
				<tbody>
					<tr>
						<td>{{round($activity->price)}}元</td>
						<td>{{$member->count}}人</td>
						<td> &times; 0.{{$discount}}</td>
						<td class="text-xl text-orange">{{round($amount)}}元</td>
					</tr>
				</tbody>
</table>