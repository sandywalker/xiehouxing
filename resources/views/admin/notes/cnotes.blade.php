@extends('app')

@section('content')

	<h5 class="app-title"> 游记审核 </h5>

	@include('admin.notes.note-list',['flag'=>'check'])

@endsection

@section('js')
	<script src="{{ asset('/js/note.js') }}"></script>
@endsection