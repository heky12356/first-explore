@extends('template.QZHIJIA.layout')
@section('title','播放页')
@section('content')
@section('other')
<style>
.collapse{display:none}.collapse.in{display:block;}
</style>
@endsection()
@section('content')
<script>
$("#会员视频").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel-bd">
					<div class="stui-player col-pd">
                    <div style="border: 1px solid #E6D8B9;background:#FEFFE6;color: #080;line-height: 20px;padding: 5px 10px;margin-bottom:10px;">
                    【<span style="color:red">播放提示</span>】：<label>如果无法播放请切换线路或者播放源！
</label>
                     </div>
					<div class="stui-player__video embed-responsive-16by9 embed-responsive clearfi">
					<img id="addid" src="#" style="display: none;width:100%;border: 2px solid #ff6651">
						 <iframe id="video" src="/jzad" allowfullscreen="true" allowtransparency="true" style="width:100%;border:none"></iframe>
							<a style="display:block" id="videourlgo" href=""></a>
						</div>
						<div class="stui-player__detail detail">
							<div class="title">
						
						<span class="text-muted" id="xuji">正在播放：{{$cxs['dy_title']}}</span></div>
							<p class="data margin-0">
							<a class="detail-more" href="javascript:;">详情 <i class="icon iconfont icon-moreunfold"></i></a></p>
							<div class="detail-content" style="display: none;">
								<p class="data"><span class="text-muted">类型：</span>抢先看</p>
								<p class="desc margin-0"><span class="left text-muted">简介：</span><span style="font-variant-ligatures: normal; orphans: 2; widows: 2;">{{$cxs['dy_desc']}}</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="stui-pannel stui-pannel-bg clearfix">
  <div class="top-list stui-pannel-box">
    <div class="top-list-ji">


<div class="stui-pannel stui-pannel-bg clearfix">
	<div class="stui-pannel-box">
		<div class="stui-pannel_hd">
			<div class="stui-pannel__head bottom-line active clearfix">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#cxs抢先看">
				<span class="more text-muted pull-right">
                    无需安装任何插件，点抢先看可折叠！</span>
					<h3 class="title">抢先看</h3>
                </a>
				</div>
			</div>
		<div class="stui-pannel_bd col-pd clearfix">
			<ul class="stui-content__playlist column10 clearfix collapse in" id="cxs抢先看"> 
				@foreach($cxs['dy_addr'] as $v)
				<li>
					<a href="javascript:void(0)" id="bofang" class="am-btn am-btn-default lipbtn" data-href='{{$v['url']}}' onclick="bofang(this)" target="_self">{{$v['name']}}</a>
				</li>
				@endforeach()
			</ul>
		</div>
	</div>
</div>

  </div>
 </div>		
</div>
<!--播放历史记录-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_6.png" />播放记录</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       <ul class="stui-vodlist__bd clearfix">
		@if($history)
        @foreach($history as $v)
 <li class="col-md-6 col-sm-4 col-xs-3">
                    <h4 class="title text-overflow"><a href="{{$v['url']}}" onclick="jilu(this)" title="{{$v['title']}}">{{$v['title']}}</a></h4>
		</li>
		@endforeach
        @else
        <h3>暂无历史记录</h3>
        @endif
       </ul>
      </div>
     </div>
    </div>
    <!--影片评论-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_6.png" />影片评论</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       {!! config('webset.cy') !!}
      </div>
     </div>
    </div>
	</div>
</div>
<script type="text/javascript" src="/public/static/QZHIJIA/js/jquery.SuperSlide.js"></script>
            <script>
                $(function () {
                    var biaoti = $('#xuji').text();
                    $('title').text(biaoti);
                    var href = $('#bofang').attr('data-href');
                    if (href != '' || href != null) {
                        setTimeout(function () {
                            $('#video').attr('src',href);
                        },3000)
                    }
                    $('.lipbtn:eq(0)').attr('id','ys');
                })

            </script>
            <script>
                function bofang(obj) {
                    var href = $(obj).attr('data-href');
                    var text = $(obj).text();
                    $('.js').text('-' + text);
                    $.each($('.lipbtn'), function () {
                        $(this).attr('id','');
                    });
                    $(obj).attr('id','ys');
                    if (href != '' || href != null) {
                        $('#video').attr('src', '/jzad');
                        setTimeout(function () {
                            $('#video').attr('src', href);
                        },3000)
                    }
                }
            </script>
@endsection