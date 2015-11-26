(function(root,$){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	$('body').on('click','.btn-remove',function(e){
				if (confirm('您确定删除这条数据吗?')){
					return true;
				}
				return false;
	});



})(window,jQuery);
//# sourceMappingURL=app.js.map