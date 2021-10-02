<?php
	require('./data.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="cache-control" content="no-siteapp">
    <title><?php echo e(config('webset.webname')); ?>-<?php echo e(config('webset.websubname')); ?>-<?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keywords" content="<?php echo e(config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'); ?>">
    <meta name="description" content="<?php echo e(config('webset.webname')); ?>-<?php echo e(config('webset.websubname')); ?>-<?php echo $__env->yieldContent('title'); ?>-<?php echo e(config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'); ?>">
    <link rel="stylesheet" href="/public/static/wapian/css/bootstrap.min.css"/>
    <link href="/public/static/wapian/css/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="/public/static/wapian/css/iconfont.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/wapian/css/iconfont2.css" rel="stylesheet" type="text/css"/>
    <link href="/public/static/wapian/css/blackcolor.css" rel="stylesheet" type="text/css"/>    <link rel="stylesheet" href="/public/static/admin/css/layer.css">
    <link href="/public/static/wapian/css/style.min.css" rel="stylesheet" type="text/css"/>
    <script type='text/javascript' src="/public/static/wapian/js/swiper.min.js"></script>
    <script type='text/javascript' src="/public/static/wapian/js/system.js"></script>
    <script src="/public/static/wapian/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/wapian/js/su.js"></script>
    <script type="text/javascript" src="/public/static/wapian/js/lazyload.min.js"></script>

        <script src="/public/static/admin/js/layer.js"></script>
    
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/public/static/wapian/js/html5.js"></script><![endif]-->
    <?php $__env->startSection('other'); ?>
     <?php echo $__env->yieldSection(); ?>
    <style>
        #ys {
            background: deepskyblue;
            color: black;
        }
        .jkbtn{
            background: deepskyblue;
            color: black;
        }
    </style>
</head>
<body class="<?php echo $__env->yieldContent('body'); ?>">
<div class="hy-head-menu">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="logo">
                    <a class="hidden-sm hidden-xs" href="/"><img src="/public/static/wapian/images/logo.png" height="50px" width="150px"/></a>
                </div>
                <div class="search  hidden-sm">
                    <div id="ff-search" role="search">
                        <input class="form-control" placeholder="输入影片关键词..." type="text" id="ff-wd" name="wd" required="">
                        <input type="submit" class="hide"><a href="javascript:" class="btns" title="搜索" id="sousuo"><i class="icon iconfont icon-search"></i></a>
                    </div>
                </div>
                <ul class="menulist hidden-xs">
                    <?php if($navlist): ?>
                     <?php $__currentLoopData = $navlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li id="nav-index"><a href="<?php echo e($v['nav_addr']); ?>"><?php echo e($v['nav_title']); ?></a></li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php endif; ?>
                    <li id="nav-down"><?php echo config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':''; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldSection(); ?>
<div class="hy-gototop hidden-sm hidden-xs">
    <ul class="item clearfix">
        <li><a data-toggle="tooltip" data-placement="top" class="" href="javascript:scroll(0,0)" title="返回顶部"><i class="icon iconfont icon-uparrow"></i></a></li>
    </ul>
</div>
<div class="tabbar visible-xs">
    <a href="/" class="item ">
        <i class="icon iconfont icon-home"></i>
        <p class="text">首页</p>
    </a>
    <a href="/movielist/all/1.html" class="item ">
        <i class="icon iconfont icon-film"></i>
        <p class="text">电影</p>
    </a><a href="/tvlist/all/1.html" class="item ">
        <i class="icon iconfont icon-show"></i>
        <p class="text">电视剧</p>
    </a><a href="/dmlist/all/1.html" class="item ">
        <i class="icon iconfont icon-mallanimation"></i>
        <p class="text">动漫</p>
    </a><a href="/zylist/all/1.html" class="item ">
        <i class="icon iconfont icon-flag"></i>
        <p class="text">综艺</p>
    </a>
</div>

    <div class="container">
    <div class="row">
    
        <div class="hy-layout clearfix">
         <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0">友情链接</h3>             
                </div>
                   
                <div class="hy-footer-link">
                    <div class="item clearfix">
                        <ul class="clearfix">
                        <?php $yl=footer();	$yll=count($yl);	if($yll>500) $yll = 500; ?>				<?php					for($i=$yll-1;$i>=0;$i--){						echo '<a href="'.$yl[$i][2].'" target="_blank">'.$yl[$i][1].' </a>';}?>	
                      
                        </ul>
                    </div>
                </div>
            </div>
            <div style="">
                
            </div>
     
                <p class="hy-layout clearfix" style="color:#FFFFFF;text-align:center"><a href="#" data-toggle="modal" data-target="#myModal">免责声明  </a><a href="#" data-toggle="modal" data-target="#exampleModal">  申请友链</a>
   <br>Copyright:<a href="#" target="_blank"><?php echo e(config('webset.webicp')); ?>-<?php echo e(config('webset.copyright')); ?></a><br><?php echo config('webset.webtongji'); ?></p>
                
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#000">免责声明</h4>
      </div>
      <div class="modal-body">
          <p style="padding: 0 4px;text-align:center;color:#000" class="container-fluid">
                本站提供的最新电影和电视剧资源均系收集于各大视频网站,本站只提供web页面服务,并不提供影片资源存储,也不参与录制、上传<br/>
                若本站收录的节目无意侵犯了贵司版权，请给网页底部邮箱地址来信,我们会及时处理和回复<br>如果本站没有您想要的电影或电视剧，请注册后在会员中心，求片，注册会员是免费的哦！<br>请支持挚手网络 www.zswl8.cn</p>
      </div>
      
    </div>
  </div>
</div>



   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel" style="color:#000">自助友链申请</h4>
      </div>
      <div class="modal-body">
      <p style="padding: 0 4px;text-align:center;color:#ff0000" class="container-fluid">
              在申请友链之前请先添加本站友链<br/>申请后如果不显示请点击下方刷新缓存<br/>申请的友链管理会定时查看<br/>一但发现违法等网站立即删除</p>
        <form role="form"  id="myform" enctype="multipart/form-data">
      
          <div class="form-group">
            <label for="recipient-name" class="control-label" style="color:#000">网站名字：</label>
          <input type="text" name="mz" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label" style="color:#000">网站网址：</label>
            <input type="text" name="url" class="form-control" id="recipient-name">
          </div>
              <div class="form-group">
            <label for="message-text" class="control-label" style="color:#000">网站介绍：</label>
<textarea class="form-control" name="js" id="message-text"></textarea>
          </div>
              <div class="form-group">
            <label for="message-text" class="control-label" style="color:#000"><p>验证码:            <img id="captcha_img" border='1' src='http://<?php echo e(config("webset.webdomin")); ?>/yanzheng.php?r=echo rand(); ?>' style="width:100px; height:30px" />
    <a href="#" onclick="document.getElementById('captcha_img').src='http://<?php echo e(config('webset.webdomin')); ?>/yanzheng.php?r='+Math.random()" style="color:#ff0000">换一个?</a>
  </p></label>             
<input type="text" name="user_ma" class="form-control" id="recipient-name"> 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
         <button type="button"  action="index" onclick="flushcache(this)" class="btn btn-primary">刷新缓存</button>
        <button type="button" id="btt" class="btn btn-primary">立即申请</button>
      </div>
    </div>
  </div>
</div>

                
                
        </div>
    </div>
</div>
<script type="text/javascript" >
   $("#btt").click(function(){
    for(var i=1;i<5;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息');
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
            $.ajax({
      url:"/zizhu.php",
      	method: 'POST',
									dataType: 'json',
									data: fm,
				processData: false,
  contentType: false,					
  success: function (zhuangtai){
                        if(zhuangtai.ok){
                        layer.msg(zhuangtai.text);
                        document.getElementById('captcha_img').src='/yanzheng.php?r='+Math.random();
     
                        }
                        else {

                        layer.msg(zhuangtai.text);
                        }
                    }
            });
            
                 
    });
</script>
                

</body>

<script>
        function flushcache(obj) {
            var action = $(obj).attr('action');
            layer.msg('请稍等…', {
              time: 10*1000
            });
            $.ajax({
                type:"get",
                url:"/action/flushcache/"+action,
                dataType:"json",
                success: function (resp){
                    if(resp.status==200){
                        layer.msg(resp.msg);
                        window.location.href='./';
                    }
                    else {
                        layer.msg(resp.msg)
                    }
                }
            })
        }
    </script>
                
<script>
    $(function () {
        $('#sousuo').click(function () {
            var key = $('#ff-wd').val();
            if (key != '' && key != null) {
                window.location = '/search/' + key + '.html'
            }
        });

        $('input').keyup(function () {
            if (event.keyCode == 13) {
                $("#sousuo").trigger("click");
            }
        });

        $('.lazy').lazyload({
            placeholder:"/public/static/wapian/images/loading.gif",
            effect : "fadeIn", //渐现，show(直接显示),fadeIn(淡入),slideDown(下拉)
            threshold : 120, //预加载，在图片距离屏幕180px时提前载入
        });
    })
</script>
   
<script>
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).attr('src');
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
</html>
