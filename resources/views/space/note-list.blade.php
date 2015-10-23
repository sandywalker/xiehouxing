			@foreach($notes as $note)
					<div class="row">
						<div class="col-md-2">
							<div class="thumb-note">
								<img src="{{asset($note->thumb)}}" alt="" class="full-width ">	
							</div>
							
						</div>
						<div class="col-md-10">
							<h5 class="notes-title">
								<span class="pull-right text-sm text-muted">
									<i class="glyphicon glyphicon-eye-open text-main"></i> {{$note->hits}} &nbsp; 
									<i class="glyphicon glyphicon-comment text-main"></i> {{$note->cmts}} &nbsp;
									<i class="glyphicon glyphicon-thumbs-up text-main"></i> {{$note->likes}}
								</span>
								
								<strong>{{$note->title}}</strong>
							</h5>
							<p class="text-muted text-sm notes-description">
								{{$note->description}}
							</p>
							<p class="text-sm">
								<span class="pull-right text-orange"> <i class="glyphicon glyphicon-map-marker"></i> 
								{{$note->place}} &nbsp;&nbsp;
								{{$note->created_at}}</span>
							</p>
						</div>
					</div>

					<div class="divider"></div>

				@endforeach