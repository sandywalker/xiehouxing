
	{!! Form::open(['url'=>$action,
							 'method'=>'DELETE',
							 'class'=>'inblock']) !!}
	{!! Form::hidden('redirect_to', Request::url()) !!}	
	<button type="submit" class="btn btn-danger btn-xs btn-remove">删除</buton>
	{!! Form::close() !!}