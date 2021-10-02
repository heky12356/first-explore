@extends('public.admin')
@section('mail','active opened active')
@section('mailip','active')

@section('content')
<?php
	include './data.php';
?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">邮箱IP屏蔽(防止恶意刷邮箱)</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">–</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                
                <div class="panel-body">

                    <form class="form-inline" id="myform">                                                  <input type="hidden" name="user_tjip" >
                        <div class="form-group">
                            <input type="text" class="form-control" size="20" name="user_ip" id="kmnum" placeholder="请输入IP地址">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-secondary btn-single" id="shengcheng">屏蔽</button>
                        </div>
                    </form>

                </div>
                
                
            </div>
        </div>
        
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">已屏蔽的IP列表</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="mform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">IP地址</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="user_scip" id="field-1">
                                    <option value="">--请选择IP地址--</option>
         
                                         
                                        <?php $iparray = hqip();
         $users_ip=count($iparray);
         if($users_ip>500) 
         $users_ip = 500;
          ?>
                <?php
					for($i=$users_ip-1;$i>=0;$i--){

						echo '<option value="'.$iparray[$i].'">'.mmd5($iparray[$i],'zhishou').'</option>';
					}
				?>
                                        
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">删除</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
           
        </div>
    
    
   <script>
        $(function () {
            $('#submit').click(function () {
                for(var i=1;i<3;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息');
                        return false;
                    }
                }
                var fm = new FormData($('#mform')[0]);
                $.ajax({
                    type:"post",
                    url:"/smtp.php",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    
                        success: function (ipzt){
                        if(ipzt.ok){
                            
                            layer.msg(ipzt.text)
                            window.location = window.location.href
                        }
                        else {
                            layer.msg(ipzt.text);
                        }
                    }
                })
            })
        })
    </script>
    
    
    <script>
        $(function () {
            $('#shengcheng').click(function () {
                var num = $('#kmnum').val();
                if(num==''){
                    layer.msg('请填写完整信息');
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/smtp.php",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (ipzt){
                        if(ipzt.ok){
             
                            layer.msg(ipzt.text)
                            window.location = window.location.href
                        }
                        else {
                            layer.msg(ipzt.text);
                        }
                    }
                })

                return false;
            })
        })
    </script>
@endsection