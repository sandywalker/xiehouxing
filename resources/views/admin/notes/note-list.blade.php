<div class="container-fluid" id="noteApp">
		<div class="row">
			<div class="col-md-12">
				<p>
					<form action="/admin/notes" class="form-inline pull-right" >
						<input type="text" name="key" class="form-control" value="{{$key}}">
						 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
					</form>
					<div class="clearfix"></div>
				</p>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="80">预览图</th>
							<th>标题和简介</th>
							<th width="80">地点</th>
							<th width="100">热度</th>
							<th width="60">评论</th>
							<th width="80">状态</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody class="text-sm">
						@foreach($notes as $note)
						<tr>
							<td>
								<div>
								  <a href="{{asset($note->thumb)}}" class="note-thumb"><img src="{{asset($note->thumb)}}" alt="" style="width:100%;"></a>
								</div>	
							</td>
							<td>
								@if($note->istop == 1)
									<span class="label label-success">顶</span>
								@endif
								<a href="/notes/{{$note->id}}" target="_blank"><span class="text-md">{{$note->title }}</span></a>
								
								 <br>
								 <span class="text-muted text-sm">{{str_limit($note->description,100)}}</span> 
							</td>
							
							<td>{{$note->place}}</td>
							<td class="text-sm">
								<span class="text-main"> 点击： {{$note->hits}} 次</span><br>
								<span class="text-success"> 点赞： {{$note->likes}} 次</span><br>
								<span class="text-warning"> 收藏： {{$note->favs}} 次</span><br>

							</td>
							<td> <a href="#" v-on="click:showComments({{$note->id}});">{{$note->cmts}}条</a></td>
							<td>
								@if($note->states == 1)
									<span class="text-success">正常</span>
								@elseif($note->states == 0)
									<span class="text-warning">待审核</span>
								@else
									<span class="text-muted">已禁止</span>
								@endif
							</td>	
							<td>

								@if ($flag == 'check')
										<a href="/admin/cnotes/{{$note->id}}/approve" class="btn btn-success btn-xs ">通过</a> &nbsp;
										<a href="/admin/cnotes/{{$note->id}}/deny" class="link-orange">不通过</a>
								@else
									
									@if($note->states==1)
										@if($note->istop)
											<a href="/admin/notes/{{$note->id}}/top/0" class="btn btn-xs btn-warning ">取消置顶</a>
										@else
											<a href="/admin/notes/{{$note->id}}/top/1" class="btn btn-xs btn-info">置顶</a>
										@endif
									@endif

									@if($note->states == -1)
										<a href="/admin/notes/{{$note->id}}/enable" class="btn btn-success btn-xs ">启用</a>
									@elseif($note->states==1&&!$note->istop)
										<a href="/admin/notes/{{$note->id}}/disable" class="btn btn-danger btn-xs ">禁止</a>
									@endif

									
									
								@endif

								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! $notes->render() !!}

				@if($notes->count()==0)
					<p class="text-lg text-muted text-center">
						暂时没有需要操作的游记！
					</p>

				@endif

			</div>
		</div>
		<note-comments-modal 
			comments="@{{comments}}" 
			show="@{{show}}"
			on-close="@{{hideComments}}"
			on-delete="@{{deleteComment}}"
			/>
	</div>