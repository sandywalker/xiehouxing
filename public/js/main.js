(function(root,$){

	$('body').on('click','a.btn-remove',function(e){
		var msg = $(this).data('message')?$(this).data('message'):'删除不可恢复，您确定删除这条数据吗？';
		if (confirm(msg)){
			return true;
		}
		return false;
	});

})(window,jQuery);
//# sourceMappingURL=main.js.map