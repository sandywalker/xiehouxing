@extends('def')

@section('title','攻略预览')
@section('content')

<div class="guide-banner">
            <img src="{{asset($guide->banner_thumb)}}" alt="..." class="full-width">
            <div class="guide-brief">
                <h1>{{$guide->title}}</h1>
                <h4>{{$guide->description}}</h4>
            </div>
</div>
<p>&nbsp;</p>
<div class="container guide-main">
	<div class="row">
		<div class="col-md-1">&nbsp;</div>
		<div class="col-md-7">
			<article>
				<h2>
                            {{-- <small class="pull-right">
                                <a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-star "></i>收藏</a>
                                <a href="#" class="btn btn-lg"><i class="glyphicon glyphicon-share"></i>分享</a>
                            </small> --}}
                            {{$guide->title}}
				</h2>
				{!! $guide->content !!}			

			</article>
			
		</div>
		<div class="col-md-3">
					<h4>相关游记</h4>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/img/thumb1.jpg" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="#">朱小北</a>希腊映像</h5>
                            <p>这里有曾去过希腊游玩的旅友们所写的希腊游记/旅游博客,这里有精彩的回忆...</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/img/thumb2.jpg" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="#">愤怒的葡萄</a>重游北京</h5>
                            <p>这里有曾去过希腊游玩的旅友们所写的希腊游记/旅游博客...</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/img/thumb3.jpg" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="#">小鱼儿</a>最美九寨</h5>
                            <p>这里有曾去过希腊游玩的旅友们,这里有精彩的回忆...</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/img/thumb5.jpg" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="#">笑笑</a>身边的美景</h5>
                            <p>这里有曾去过希腊游玩的旅友们所写的希腊游记/旅游博客,这里有精彩的回忆...</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="/img/thumb-tianshan.jpg" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="#">大漠</a>天池</h5>
                            <p>这里有曾去过希腊游玩的旅友们所写的希腊游记,有精彩的回忆...</p>
                        </div>
                    </div>
                    <br/>
                    <h4>关注我们的公众微信平台</h4>
                    <div class=" qrcode">
                        <img src="/img/qrcode.jpg" alt=""/>
                    </div>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>

</div>




@endsection