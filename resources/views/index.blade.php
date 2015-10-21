@extends('def')
@section('id','home')
@section('content')
    
    		<section id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/slide3.jpg" alt="...">
                    </div>
                    <div class="item">
                        <img src="img/slide1.jpg" alt="...">
                    </div>
                    <div class="item">
                        <img src="img/slide2.jpg" alt="...">
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="icon icon-arrow-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="icon icon-arrow-right" aria-hidden="true"></span>
                </a>
            </section>
            <br/>
            
            <section class="container">
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="#"><span class="more">更多...</span></a>同城及周边</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-product" id="city">
                        <div class="row">
                            <div class="col-md-3" >
                                <div class="home-side"></div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight ">
                                    <div class="thumb-image">
                                        <a href="product.html"><img src="img/thumb-miyun.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">密云</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">密云</span> 一群好友，2日小聚，狂欢派对！ </p>
                                    </div>
                                    <div class="thumb-foot">
                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">798￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight">
                                    <div class="thumb-image">
                                        <a href="product.html"><img src="img/thumb-shidu.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">十渡</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">十渡</span> 小长假休闲，享受愉快的周末！ </p>
                                    </div>
                                    <div class="thumb-foot">

                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">599￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight">
                                    <div class="thumb-image">
                                        <a href="product.html"><img src="img/thumb-mentougou.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">门头沟</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">门头沟</span> 放松心情，爬山、烧烤、游戏！ </p>
                                    </div>
                                    <div class="thumb-foot">
                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">399￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight">
                                    <div class="thumb-image">
                                        <a href="product.html"><img src="img/thumb5.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">怀柔</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">怀柔</span> 清凉一夏，激情漂流！ </p>
                                    </div>
                                    <div class="thumb-foot">
                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">699￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight">
                                    <div class="thumb-image">
                                        <a href=  "#"><img src="img/thumb-xishan.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">西山</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">西山</span> 森林里，自由自在深呼吸！ </p>
                                    </div>
                                    <div class="thumb-foot">

                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">398￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="thumb-md hover-highlight">
                                    <div class="thumb-image">
                                        <a href="product.html"><img src="img/thumb-yanqin.jpg" alt=""/></a>
                                        <!--<div class="thumb-title">延庆</div>-->
                                    </div>
                                    <div class="thumb-info">
                                        <p> <span class="place">延庆</span> 风和日丽，暖风徐徐！ </p>
                                    </div>
                                    <div class="thumb-foot">

                                        <p>
                                            已有<span  class="people">35人</span>报名
                                            <span class="price">698￥</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="product-list.html"><span class="more">更多...</span></a>国内</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-product" id="mainland">
                            <div class="row">
                                <div class="col-md-3" >
                                    <div class="home-side"></div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-xizang.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">西藏</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p> <span class="place">西藏</span> 放下繁忙的工作，收拾好心情，享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">3998￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-qinghai.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">青海</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">青海</span> 收拾好心情，享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">2999￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-wuzheng.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">西山</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p> <span class="place">乌镇</span> 享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">1298￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-lijiang.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">丽江</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">丽江</span>  收拾好心情，享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">3999￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-gansu.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">怀柔</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">敦煌</span> 收拾好心情，享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">2998￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-tianshan.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">安徽</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p> <span class="place">新疆</span> 给自己放个长假，来一次长途跋涉！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">698￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="product-list.html"><span class="more">更多...</span></a>国际</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-product" id="foreign">
                            <div class="row">
                                <div class="col-md-3" >
                                    <div class="home-side"></div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-span.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">西藏</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">西班牙</span>  地中海式气候，阳光充足，春秋多雨！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">798￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-japan.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">日本</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">日本</span>  富士山下，融入自然！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">599￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-ruishi.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">丽江</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place">瑞士</span>  欧洲的后花园，纯净的美！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">399￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-austrila.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">怀柔</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place"> 澳大利亚 </span>  体验南半球的独特生态！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">699￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-xishan.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">韩国</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place"> 韩国 </span>  收拾好心情，享受愉快的周末！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">398￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3  col-xs-6">
                                    <div class="thumb-md hover-highlight">
                                        <div class="thumb-image">
                                            <a href="product.html"><img src="img/thumb-roma.jpg" alt=""/></a>
                                            <!--<div class="thumb-title">新西兰</div>-->
                                        </div>
                                        <div class="thumb-info">
                                            <p>  <span class="place"> 罗马 </span>  跨越千年的历史跨度！ </p>
                                        </div>
                                        <div class="thumb-foot">

                                            <p>
                                                已有<span  class="people">35人</span>报名
                                                <span class="price">698￥</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </section>


					<section class="container" >
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="#"><span class="more">更多...</span></a> 人气攻略 </h3>
                    </div>
                </div>
                <div class="row home-best">

                    <div class="col-md-3 col-xs-6">
                        <div class="thumb-square hover-zoom-in">
                            <div class="thumb-image">
                                <a href="guide.html"><img src="img/thumb2.jpg" alt=""/></a>
                                <div class="thumb-title">北京</div>
                            </div>
                            <div class="thumb-info ">
                                <p>北京同城活动，分享、娱乐、交流 </p>
                            </div>
                            <!--<div class="thumb-foot">-->

                                <!--<p>-->
                                    <!--已有<span class="people">35人</span>报名-->
                                    <!--<span class="price">399￥</span>-->
                                <!--</p>-->
                            <!--</div>-->
                        </div>

                    </div>
                    <div class="col-md-3  col-xs-6">
                        <div class="thumb-square hover-zoom-in">
                            <div class="thumb-image">
                                <a href="guide.html"><img src="img/thumb5.jpg" alt=""/></a>
                                <div class="thumb-title">北京周边</div>
                            </div>
                            <div class="thumb-info ">
                                <p> 放飞心情，享受愉快周末！ </p>
                            </div>
                            <!--<div class="thumb-foot">-->

                            <!--<p>-->
                            <!--已有<span  class="people">35人</span>报名-->
                            <!--<span class="price">799￥</span>-->
                            <!--</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="thumb-square hover-zoom-in">
                            <div class="thumb-image">
                                <a href="guide.html"><img src="img/thumb3.jpg" alt=""/></a>
                                <div class="thumb-title">九寨沟</div>
                            </div>
                            <div class="thumb-info ">
                                <p>一起领略最美的颜色 </p>
                            </div>
                            <!--<div class="thumb-foot">-->

                                <!--<p>-->
                                    <!--已有<span class="people">35人</span>报名-->
                                    <!--<span class="price">3998￥</span>-->
                                <!--</p>-->
                            <!--</div>-->
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="thumb-square hover-zoom-in">
                            <div class="thumb-image">
                                <a href="guide.html"><img src="img/thumb1.jpg" alt=""/></a>
                                <div class="thumb-title">爱情海</div>
                            </div>
                            <div class="thumb-info ">
                                <p>与你邂逅浪漫爱情海  </p>
                            </div>
                            <!--<div class="thumb-foot">-->

                            <!--<p>-->
                            <!--已有<span class="people">18人</span>报名-->
                            <!--<span class="price">11999￥</span>-->
                            <!--</p>-->
                            <!--</div>-->
                        </div>

                    </div>
                </div>
            </section>

            <section class="container home-notes">
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="guide-list.html"><span class="more">更多...</span></a>精品游记</h3>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3">
                            <div class="home-users">
                            <h5>人气排行</h5>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users1.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">小柯小哥</h4>
                                </div>
                            </div>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users2.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">孤独的牧羊人</h4>
                                </div>
                            </div>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users3.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">清水无涯</h4>
                                </div>
                            </div>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users4.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">断水流</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users5.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">傍海潮声</h4>
                                </div>
                            </div>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users6.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">愤怒的葡萄</h4>
                                </div>
                            </div>

                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users7.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">亦舒</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/users8.jpg" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">小马哥</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4  col-xs-6 ">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar1.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note1.jpg" alt=""></a>
                                    <h5>斯里兰卡，径远足去</h5>
                                    <p class="summary"><span>2014.12.13</span><span>6天</span><span>2014次浏览</span></p>
                                    <p class="summary"> 斯里兰卡, 尼甘布</p>
                                </div>
                            </div>
                            <div class="col-md-4  col-xs-6 ">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar2.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note2.jpg" alt=""></a>
                                    <h5>埃菲尔铁塔下的邂逅</h5>
                                    <p class="summary"><span>2014.12.18</span><span>6天</span><span>1909次浏览</span></p>
                                    <p class="summary"> 法国，巴黎</p>
                                </div>
                            </div>
                            <div class="col-md-4  col-xs-6">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar3.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note3.jpg" alt=""></a>
                                    <h5>冬日漫步欧洲37天...</h5>
                                    <p class="summary"><span>2014.12.5</span><span>12天</span><span>1682次浏览</span></p>
                                    <p class="summary"> 法国，巴黎</p>
                                </div>
                            </div>



                            <div class="col-md-4  col-xs-6 ">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar3.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note4.jpg" alt=""></a>
                                    <h5>首尔，径远足去</h5>
                                    <p class="summary"><span>2014.12.13</span><span>6天</span><span>2014次浏览</span></p>
                                    <p class="summary"> 斯里兰卡, 尼甘布</p>
                                </div>
                            </div>
                            <div class="col-md-4  col-xs-6 ">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar1.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note6.jpg" alt=""></a>
                                    <h5>大阪的樱花</h5>
                                    <p class="summary"><span>2014.12.18</span><span>6天</span><span>1909次浏览</span></p>
                                    <p class="summary"> 法国，巴黎</p>
                                </div>
                            </div>
                            <div class="col-md-4  col-xs-6">
                                <div class="travel-notes">
                                    <div class="travel-notes-border"></div>
                                    <div class="avatar"><img src="img/avatar2.jpg" alt=""></div>
                                    <a href="note.html" target="_blank"><img src="img/note5.jpg" alt=""></a>
                                    <h5>冬日云南</h5>
                                    <p class="summary"><span>2014.12.5</span><span>12天</span><span>1682次浏览</span></p>
                                    <p class="summary"> 法国，巴黎</p>
                                </div>
                            </div>


                        </div>


                    </div>


                </div>
            </section>

@endsection