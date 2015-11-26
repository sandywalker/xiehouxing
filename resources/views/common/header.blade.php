<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<nav class="navbar navbar-default navbar-main">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>

	            <a class="navbar-brand" href="#">
	                <div class="logo"></div>
	            </a>
	        </div>
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            

	            <ul class="nav navbar-nav">
	                <li class="menu-home"><a href="/">首页 <span class="sr-only">(current)</span></a></li>
	                <li class="menu-activity"><a href="/activities">活动报名</a></li>
	                <li class="menu-guide"><a href="/guides">攻略</a></li>
	                <li class="menu-note"><a href="/notes">游记</a></li>
	                <li><a href="#">邂逅广场</a></li>
	            </ul>

				 <ul class="nav navbar-nav navbar-right navbar-user">
			        @if (Auth::guest())
	            		<li> <a href="/auth/register" >注册</a></li>
	            		<li> <a href="/auth/login" >登录</a></li>
					@else
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false" id="userMenu"> 欢迎：{{ Auth::user()->name }} <span class="caret"></span></a>
			          <div  class="webui-popover-content">
				          <ul class="dropdown-menu" >
				          	<li><a href="/u/{{Auth::user()->id}}">我的空间</a></li>
				            <li><a href="/auth/logout">退出</a></li>
				          </ul>
			          </div>
			        </li>
			        @endif
			      </ul>

	           {{--  <p class="navbar-text navbar-right navbar-user">
					@if (Auth::guest())
	            		<a href="#" class="navbar-link">注册</a> | <a href="#" class="navbar-link">登录		</a>  
					@else
							<a class="dropdown">
								欢迎：<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/auth/logout') }}">退出系统</a></li>
								</ul>
							</div>
	            	@endif
	            </p> --}}

	            <form class="navbar-form  navbar-search navbar-right" role="search" id="navbarSearch">
	                <div class="form-group">
	                    <div class="input-group">
	                        <input type="text" class="form-control"  id="query" placeholder="活动、攻略、游记...">
	                                  <span class="input-group-btn">
	                                    <button class="btn btn-default" type="button" id="btnSearch"><i class="glyphicon glyphicon-search"></i></button>
	                                  </span>
	                    </div>
	                </div>
	            </form>

	            


	        </div>

	    </div>
	</nav>