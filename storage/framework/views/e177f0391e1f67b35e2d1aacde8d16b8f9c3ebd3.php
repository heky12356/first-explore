<?php $__env->startSection('nail','active opened active'); ?>
<?php $__env->startSection('content'); ?>
        
        
        <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">用户求片</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">用户名:</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="<?php echo e(session('username')); ?>" name="user_name"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">QQ：</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="" name="user_qq" placeholder="请输入联系QQ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">邮箱：</label>

                            <div class="col-sm-10">
                                <input type="mail" class="form-control" id="field-3" value="" name="user_mail" placeholder="请输入邮箱" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">影视名字：</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="" name="user_mps" placeholder="请输入影视名字" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="btt">发送</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
   
               <script type="text/javascript" >
   $("#btt").click(function(){
    for(var i=1;i<4;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息');
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
            $.ajax({
      url:"smtp.php",
      	method: 'POST',
									dataType: 'json',
									data: fm,
				processData: false,
  contentType: false,					
  success: function (zhuangtai){
                        if(zhuangtai.ok){
                        layer.msg(zhuangtai.text);
                        }
                        else {

                        layer.msg(zhuangtai.text);
                        }
                    }
            });
    });
</script>
                
                
    
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>