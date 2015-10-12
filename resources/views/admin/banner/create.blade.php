@extends('app')



@section('content')
<form action="/admin/banners" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    
@include('admin.banner.form')
			

</form>	

@endsection

@section('js')

	//@include('common.ueditorjs')

	// <script type="text/javascript">
 //        var ue = UE.getEditor('container',{
 //        	toolbars: [
 //        		[ 'source', 'insertimage','link']
 //    		]
 //        });
 //    </script>

@endsection