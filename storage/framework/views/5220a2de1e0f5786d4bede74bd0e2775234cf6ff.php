
<?php $__env->startSection('banner','active opened active'); ?>
<?php $__env->startSection('bannerlist','active'); ?>
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
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">首页轮播列表</h3>

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
                    $("#example-2").dataTable({
                        dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                        aoColumns: [
                            null,
                            null,
                            null,
                            null
                        ],
                    });

                    // Replace checkboxes when they appear
                    var $state = $("#example-2 thead input[type='checkbox']");

                    $("#example-2").on('draw.dt', function()
                    {
                        cbr_replace();

                        $state.trigger('change');
                    });

                    // Script to select all checkboxes
                    $state.on('change', function(ev)
                    {
                        var $chcks = $("#example-2 tbody input[type='checkbox']");

                        if($state.is(':checked'))
                        {
                            $chcks.prop('checked', true).trigger('change');
                        }
                        else
                        {
                            $chcks.prop('checked', false).trigger('change');
                        }
                    });
                });
            </script>

            <table class="table table-bordered table-striped" id="example-2">
                <thead>
                <tr>
                    <th>轮播名称</th>
                    <th>轮播图片地址</th>
                    <th>轮播链接地址</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody class="middle-align">
                <?php $__currentLoopData = $bannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($v['banner_title']); ?></td>
                        <td><?php echo e($v['banner_img']); ?></td>
                        <td><?php echo e($v['banner_link']); ?></td>
                        <td>
                            <a href="/<?php echo e(config('webset.webdir')); ?>/editbanner/<?php echo e($v['banner_id']); ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
                                编辑
                            </a>

                            <a href="javascript:void(0)" onclick="shanchu(this)" goodid="<?php echo e($v['banner_id']); ?>" class="btn btn-danger btn-sm btn-icon icon-left">
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
                    url:'/action/delbanner',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{banner_id:$(obj).attr('goodid')},
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
                                    autocache(webdir, 'bannerlist');
                                }
                                else {
                                    window.location = '/' + webdir + '/bannerlist'
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