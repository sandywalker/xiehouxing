<div class="space-banner">
	
	<div class="space-sign">
		<div class="container">
			<div class="row">
				<div class="col-md-12 space-sign-content">
					<strong class="space-sign-username"> {{ $user->name}}的空间</strong>	 － {{$user->description}}
				</div>
			</div>
		</div>
	</div>

	<img src="{{asset($user->banner)}}" class="space-image" alt="">

</div>