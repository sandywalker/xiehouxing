@extends('app')

@section('content')

	<h5 class="app-title"> 游记管理 </h5>

	@include('admin.notes.note-list',['flag'=>'manage'])

@endsection

@section('js')
	 <script src="{{ asset('/js/note.js') }}"></script>
	<script>
			$('.note-thumb').magnificPopup({type:'image'});
			$('body').on('click','.btn-remove',function(e){
				if (confirm('您确定删除这条数据吗?')){
					return true;
				}
				return false;
			});
	</script>
@endsection