(function(root,$){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});



})(window,jQuery);
//# sourceMappingURL=app.js.map