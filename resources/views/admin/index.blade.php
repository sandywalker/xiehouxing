<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link href="{{ asset('/css/libs.css') }}" rel="stylesheet">
	<style>
		html,body{
			position: relative;
			height:100%;
		}
		body{
			margin:0;
			padding:0;
			/*overflow: hidden;*/
			font-family: 'Avenir Next','Helvetica Neue',Avenir,Helvetica,'Lantinghei SC','Hiragino Sans GB','Microsoft YaHei',sans-serif !important;
		}
		.sidebar{
			position: absolute;
			left:0;
			width:180px;
			top:50px;
			bottom:6px;
			background: #333;
			color:#fff;
			overflow-y:scroll; 
			
		}
		.brand{
			font-size:22px;
			height:50px;
			line-height: 50px;
			text-align: center;
		}
		.topbar{
			position: absolute;
			height:50px;
			top:0;
			left:0;
			right:0;
			background:#222; 
			color:#fff;

		    background: -webkit-linear-gradient(90deg, #348F50 10%, #56B4D3 90%); /* Chrome 10+, Saf5.1+ */
		    background:    -moz-linear-gradient(90deg, #348F50 10%, #56B4D3 90%); /* FF3.6+ */
		    background:     -ms-linear-gradient(90deg, #348F50 10%, #56B4D3 90%); /* IE10 */
		    background:      -o-linear-gradient(90deg, #348F50 10%, #56B4D3 90%); /* Opera 11.10+ */
		    background:         linear-gradient(90deg, #348F50 10%, #56B4D3 90%); /* W3C */
		}

		#frame{
			border: 0;
			width:100%;
			height: 100%;
		}

		.main{
			position: absolute;
			right: 0;
			top:50px;
			left:180px;
			bottom:6px;
		}


		#menu{
			margin:0;
			padding:0;
		}

		#menu li{
			list-style: none;
		}
		#menu li>ul{
			margin:0;
			padding:0;
		}

	
		#menu h5{
			height:45px;
			border-bottom:1px solid #444;
			font-weight: bold;
			margin: 0;
		}
		#menu h5>a{
			color:#eee;
			display: block;
			padding: 15px;
		}

		#menu h5 a:hover{
			text-decoration: none;
		}

		#menu h5>a i{
			margin-top:-3px;
		}


		#menu li>ul>li a,#menu li>ul>li a:visited{
			display: block;
			padding:8px 0 8px 25px;	
			color:#aaa;
			text-decoration: none;
		}
		#menu li>ul>li a:hover{
			text-decoration: none;
			background: #444;
		}

		#menu li>ul>li.active a{
			text-decoration: none;
			color:#fff;
			background: #555;
		}



	</style>
	<title>邂逅行后台</title>
</head>
<body>
	<div class="topbar">
		<div class="brand"> 邂逅行后台管理</div>
	</div>

	<div class="sidebar">
		<ul id="menu">
			<li>
				<h5><a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i> 页面管理 </a></h5>
				<ul>
					<li><a href="#">横幅管理</a></li>
					<li><a href="#">广告管理</a></li>
				</ul>
			</li>
			<li>
				<h5><a href="#"> <i class="glyphicon glyphicon-chevron-down pull-right"></i> 活动产品</a></h5>
				<ul>
					<li><a href="#">活动管理</a></li>
					<li><a href="#">订单管理</a></li>
					<li><a href="#">活动评论管理</a></li>
				</ul>
			</li>
			<li>
				<h5><a href="#"> <i class="glyphicon glyphicon-chevron-down pull-right"></i> 攻略游记</a></h5>
				<ul>
					<li><a href="#">攻略管理</a></li>
					<li><a href="#">攻略评论管理</a></li>
					<li><a href="#">游记管理</a></li>
					<li><a href="#">游记评论管理</a></li>
				</ul>
			</li>
			<li>
				<h5><a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i> 基础功能设置</a></h5>
				<ul>
					<li><a href="#dict" id="menu-dict" data-url="/admin/dicts/main">数据字典管理</a></li>
					<li><a href="#">图片库管理</a></li>
					<li><a href="#">地区管理</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
	<div class="main">
		<iframe src="/admin/dashboard" id="frame" frameBorder="0" data-src="/admin/dashboard"></iframe>
	</div>
	<script src="{{ asset('/js/libs.js') }}"></script>
	<script>
		(function(){

			//Get element  from url hash
		    var getIdFromHash = function() {
		        return window.location.hash.replace(/^#\/?/, '');
		    };

		    var updateFrame = function($src){
		    	if ($src.length){
    		    	var url = $src.data('url');
    				if (url&&url!=='#'){
    					$frame.attr('src',url);	
    			 		$src.parent().addClass('active');
    				}else{
    					$frame.attr('src',$frame.data('src'));	
    				}		
		    	}
		    }

			var $menu = $('#menu');
			var $frame = $('#frame');

			var id = getIdFromHash();
			var $item = $('#menu-'+id);
			updateFrame($item);

			$menu.on('click','li>a',function(e){
				$menu.find('li').removeClass('active');
				updateFrame($(this));
			});

			

		})();	
	</script>
</body>
</html>


