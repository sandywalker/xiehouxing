			@foreach($notes as $note)
					<div class="row">
						<div class="col-md-2">
							<div class="thumb-note">
								<a href="/notes/{{$note->id}}" target="_blank" ><img src="{{asset($note->thumb)}}" alt="" class="full-width ">	</a>
							</div>
							
						</div>
						<div class="col-md-10">
							<h5 class="notes-title">
								<span class="pull-right text-sm text-muted">
									<i class="glyphicon glyphicon-eye-open text-main"></i> {{$note->hits}} &nbsp; 
									<i class="glyphicon glyphicon-comment text-main"></i> {{$note->cmts}} &nbsp;
									<i class="glyphicon glyphicon-thumbs-up text-main"></i> {{$note->likes}}
								</span>
								
								<a href="/notes/{{$note->id}}" target="_blank" class="link-orange"><strong>{{$note->title}}</strong></a>
							</h5>
							<p class="text-muted text-sm notes-description">
								{{$note->description}}
							</p>
							<p class="text-sm">
								<span class="pull-right text-orange"> <i class="glyphicon glyphicon-map-marker"></i> 
								{{$note->place}} &nbsp;&nbsp;
								{{$note->created_at}}</span>
								@if($isme)
								<span class="pull-left">
									<a href="/notes/{{$note->id}}/edit">编辑</a> &nbsp;|&nbsp; 
									<a href="/notes/{{$note->id}}/delete" class="btn-remove">
										<span class="text-danger">删除</span>
									</a>
								</span>
								@endif
							</p>
						</div>
					</div>

					<div class="divider"></div>

				@endforeach