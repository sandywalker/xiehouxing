(function(root,$){

	$('body').on('click','a.btn-remove',function(e){
		var msg = $(this).data('message')?$(this).data('message'):'您确定删除这条数据吗？';
		if (confirm(msg)){
			return true;
		}
		return false;
	});

	//swal({   title: "收藏成功",   text: "收藏成功",   timer: 1000,   showConfirmButton: false });


	function  updateSocialCount($el,ctype,callback){
		var action = $el.data('action');
		var target = $el.data('target');
		var id = $el.data('id');
		$.ajax({
			url:'/'+ ctype +'/'+target+ '/' + id +'/'+action,
			success:function(result){
				if (result!=-1){
					if (callback){
						callback($el,result);
					}
					
				}
			}
		});
	}
	

	$('a.btn-fav').on('click',function(e){
		e.preventDefault();
		updateSocialCount($(this),'fav',function($el,result){
					swal({title:'收藏成功！',timer: 1000,   showConfirmButton: false });
					$el.find('.icon-fav').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
					$el.find('.favs').text(result);	
		});
	});

	$('a.btn-like').on('click',function(e){
		e.preventDefault();
		updateSocialCount($(this),'like',function($el,result){
					$el.find('.icon-like').removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
					$el.find('.likes').text(result);	
		});
	});



})(window,jQuery);
//# sourceMappingURL=main.js.map