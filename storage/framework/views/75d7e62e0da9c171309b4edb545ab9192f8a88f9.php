
<?php $__env->startSection('vip','active opened active'); ?>
<?php $__env->startSection('newlist','active'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/public/static/admin/assets/js/datatables/dataTables.bootstrap.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="/public/static/admin/assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/public/static/admin/assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="/public/static/admin/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="/public/static/admin/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">视频列表</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#example-1").dataTable({
                        order: [[ 2, 'desc' ]],
                        aLengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>

            <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>视频名称</th>
                    <th>视频图片</th>
                    <th>视频排序</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>视频名称</th>
                    <th>视频图片</th>
                    <th>视频排序</th>
                    <th>操作</th>
                </tr>
                </tfoot>

                <tbody>
                <?php $__currentLoopData = $dylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($v['dy_title']); ?></td>
                        <td><?php echo e($v['dy_img']); ?></td>
                        <td><?php echo e($v['dy_sort']); ?></td>
                        <td>
                            <a href="/play/<?php echo e($v['dy_id']); ?>.html" target="_blank" class="btn btn-info btn-sm btn-icon icon-left">
                                打开视频
                            </a>
                            <a href="/<?php echo e(config('webset.webdir')); ?>/editmovie/<?php echo e($v['dy_id']); ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
                                编辑
                            </a>

                            <a href="javascript:void(0)" onclick="shanchu(this)" goodid="<?php echo e($v['dy_id']); ?>" class="btn btn-danger btn-sm btn-icon icon-left">
                                删除
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function shanchu(obj) {
            layer.confirm('您确认要删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $(obj).parent().parent().remove();
                $.ajax({
                    url:'/action/delmovie',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{dy_id:$(obj).attr('goodid')},
                    dataType:'json',
                    success:function (data) {
                        if (data.status == 500) {
                            layer.msg(data.msg);
                            setTimeout(function () {
                                window.location = window.location.href;
                            }, 1000)
                        }
                        else {
                            layer.msg(data.msg);
                            var webdir = "<?php echo e(config('webset.webdir')); ?>";
                            setTimeout(function () {
                                if ('<?php echo e(config('cacheconfig.autocache')); ?>' == 'on') {
                                    autocache(webdir, 'newmovielist');
                                }
                                else {
                                    window.location = '/' + webdir + '/newmovielist'
                                }
                            }, 1000);

                        }
                    }
                })
            });
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>