
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','尝鲜视频'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="hy-cascade clearfix">
                <div class="left-head hidden-sm hidden-xs">
                    <ul class="clearfix">
                        <li class="text"><span class="text-muted">当前频道</span></li>
                        <li><a href="/autocxlist.html"  class="active">尝鲜视频</a></li></ul>
                </div>
                <div class="content-meun clearfix">
                    <a class="head" href="javascript:;" data-toggle="collapse" data-target="#collapse">
                        <span class="text">尝鲜分类</span></a>
                    <div class="item collapse in" id="collapse">
                        <ul class="visible-sm visible-xs clearfix">
                            <li class="text"><span class="text-muted">按频道</span></li>
                            <li><a href="/autocxlist/5/1.html" id="">尝鲜</a></li>	</ul>

                        <ul class="clearfix">
                            <li><a href="/autocxlist/5/1.html" class="acat" style="white-space: pre-wrap;">全部</a></li>
                            <?php $__currentLoopData = $cxtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href='/autocxlist/<?php echo e($v); ?>/1.html' class='acat' style='white-space: pre-wrap;margin-bottom: 4px;'><?php echo e($key); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="hy-layout clearfix">
                <?php echo config('adconfig.list_top'); ?>

            </div>
            <div class="hy-layout clearfix" style="margin-top: 0;">
                <div class="hy-switch-tabs active clearfix">
                    <span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">尝鲜视频</a></li>
                    </ul>
                </div>
                <div class="hy-video-list">
                    <div class="item">
                        <ul class="clearfix">
                            <div class="item">
                                <?php if(isset($dydata)&&!empty($dydata)): ?>
                                    <?php $__currentLoopData = $dydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-2 col-sm-3 col-xs-4">
                                            <a class="videopic lazy" href="/play/<?php echo e($dy['dy_addr']); ?>.html" title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>" onclick="jilu(this)">
                                                <span class="play hidden-xs"></span><span class="score"></span></a>
                                            <div class="title">
                                                <h5 class="text-overflow"><a href="/play/<?php echo e($dy['dy_addr']); ?>.html" title="<?php echo e($dy['dy_title']); ?>" src="<?php echo e($dy['dy_img']); ?>" onclick="jilu(this)"><?php echo e($dy['dy_title']); ?></a></h5>
                                            </div>
                                            <div class="subtitle text-muted text-muted text-overflow hidden-xs"></div>
                                        </div>
                            <?php if($loop->index==29) break; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="hy-page clearfix">
                    <ul class="cleafix">
                        <?php echo $pagehtml; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.wapian.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>