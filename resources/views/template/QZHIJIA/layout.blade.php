<?php
	require('./data.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')</title>
	<meta name="keywords" content="{{config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'}}">
	<meta name="description" content="{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')-{{config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'}}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="robots" content="noindex,nofollow,noarchive" />
  <link rel="stylesheet" href="/public/static/QZHIJIA/css/amazeui.min.css">
	<link rel="shortcut icon" href="/public/static/QZHIJIA/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/font/iconfont.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_block.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_default.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_custom.css" type="text/css" />
	    <link rel="stylesheet" href="/public/static/QZHIJIA/font/fontawesome/css/font-awesome.min.css">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/QZHIJIA/js/stui_default.js"></script>
	<script type="text/javascript" src="/public/static/QZHIJIA/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/public/static/QZHIJIA/js/lazyload.min.js"></script>
    
    @section('other')
     @show
</head>
<body>
  <header class="stui-header__top clearfix" id="header-top">
   <div class="container">
    <div class="row">
     <div class="stui-header_bd clearfix">
      <div class="stui-header__logo">
       <a class="logo" href="/"></a>
      </div>
      <div class="stui-header__side">
       <ul class="stui-header__user">
        <!--<li class="visible-xs"><a href="/ucenter.html"><i class="fa fa-user"></i></a></li>-->
		<li class="visible-xs"><a href="/"><i class="fa fa-user"></i></a></li>
       </ul>
       <div class="stui-header__search">
		  <form id="homeso" role="search">
      <input type="text" class="form-control ff-wd" id="sos" name="key" placeholder="请输入关键字">
      <button class="submit" id="button" type="button">
          <i class="icon iconfont icon-search"></i>
        </button>
	</form> 
        <div id="word" class="autocomplete-suggestions active" style="display: none;"></div>
       </div>
      </div>
      <ul class="stui-header__menu type-slide nav-gallery">
      			<li id="首页"><a href="/" title="首页">首页</a></li>
		@if($navlist)
		@foreach($navlist as $v)
			<li id="{{$v['nav_title']}}"><a href="{{$v['nav_addr']}}" title="{{$v['nav_title']}}">{{$v['nav_title']}}</a></li>
		@endforeach
        @else
        @endif
			<li id="{!! config('appconfig.appdh') !!}">{!! config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':'' !!}</li>
      </ul>
     </div>
    </div>
   </div>
  </header>
  
@section('content')
@show
<div class="container">
  <div class="row">
  
    <div class="col-lg-wide stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_26.png" />友情链接</h3>
       </div>
      </div>
      <div class="stui-pannel_bd clearfix">
       <div class="col-xs-1">
        <ul class="stui-link__text clearfix">
    
      @if(isset($yqlist))
                                @foreach($yqlist as $yq)
                       
                                    <li><a class="text-muted"  href="{{$yq['yq_link']}}" target="_blank">{{$yq['yq_name']}}</a></li>
                                @endforeach
                            @else
                            @endif
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  
<div class="container">
   <div class="row">
    <div class="stui-foot clearfix stui-pannel stui-pannel-bg">
       <p class="text-center"   data-am-modal="{target: '#my-popup'}">免责声明</p>
    <p class="text-center">Copyright:<a href="http://www.yeyulingfeng.com/" target="_blank">-© 2017-2018 laoyee. All Rights Reserved</a></p>
   <p class="text-center">{!! config('webset.webtongji') !!}</p>
                <p class="text-center">
				本站为非盈利性站点，不参与任何商业目的，仅供个人学习测试调试所用。若您无意中打开请关闭此页面，谢谢配合！<br>
				本站提供的最新电影和电视剧资源均系收集于各大视频网站，视频版权归源站所有<br>
				本站只提供web页面服务,并不提供影片资源存储,也不参与录制、上传<br/>若本站收录的节目无意侵犯了贵司版权，请给网页底部邮箱地址来信,我们会及时处理和回复<br>
				邮箱：yeyulingfeng001#foxmail.com  <b>(#换成@)</b><br>
				</p> 
				<p class="text-center"><a href="http://www.miitbeian.gov.cn"  target="_blank" >皖ICP备17022877号-1 </a></p><br/>
 
    </div>   
  <div class="stui-extra clearfix">
   <li><span><i class="icon iconfont icon-qrcode"></i></span><div class="sideslip"><div class="col-pd"><img class="qrcode" width="150" height="150" src="http://qr.liantu.com/api.php?text=http://{{config('webset.webdomin')}}"/> <p class="text-center font-12">扫码手机访问</p></div></div></li> 
  </div>
 </div>
</div>

<script>
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).children().children('img').attr('src');
        var title = $(obj).attr('title');
        $.ajax({
            type: "get",
            url: "/history",
            dataType: "json",
            data: {"url": url, "img": img, "title": title},
            success: function () {

            }
        })
    }
</script>
        <script>
            $(function () {
                $('#button').click(function () {
                    var key = $('#sos').val();
                    if (key != '' && key != null) {
                        window.location = '/search/' + key + '.html'
                    }
                });

                $('input').keyup(function () {
                    if (event.keyCode == 13) {
                        $("#button").trigger("click");
                    }
                });
                
        $('.lazyload').lazyload({
            placeholder:"/public/static/QZHIJIA/images/load.gif",
            effect : "fadeIn", //渐现，show(直接显示),fadeIn(淡入),slideDown(下拉)
            threshold : 120, //预加载，在图片距离屏幕180px时提前载入
        });
            })
            
           $(function(){
    $(".pay_item").click(function(){
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
    });
});
function dashangToggle(){
    $(".hide_box").fadeToggle();
    $(".shang_box").fadeToggle();
}
        </script>
       
</body>
</html>