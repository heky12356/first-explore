<?php

	require('./data.php');
	
	$zhuangtai = array('ok' => false,'text' =>'');
	if(isset($_POST['user_ma'])){
	
if(strtolower($_POST['user_ma'])== $_COOKIE['YZCookie']){

require_once "sm.php";
if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])
{
  $sip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
}
elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])
{
  $sip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
}
elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])
{
  $sip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
}
elseif (getenv("HTTP_X_FORWARDED_FOR"))
{
  $sip = getenv("HTTP_X_FORWARDED_FOR");
}
elseif (getenv("HTTP_CLIENT_IP"))
{
  $sip = getenv("HTTP_CLIENT_IP");
}
elseif (getenv("REMOTE_ADDR"))
{
  $sip = getenv("REMOTE_ADDR");
}

$ssip=pdip($sip);

if($ssip){

$zhuangtai['text'] = '呵呵，坏蛋你以违规，如有问题请联系站长！';
}else{
$result = send_mail($SHOU, '影视系统-会员求片','用户名字：'.$_POST['user_name'].'<br><br>用户QQ：'.$_POST['user_qq'].'<br><br>用户邮箱：'.$_POST['user_mail'].'<br><br>影视名字：'.$_POST['user_mps'].'<br><br>用户IP地址：'.$sip.'<br><br>如若出现恶意行为，请屏蔽该用户！');

if ($result == 1) {
	$zhuangtai['ok'] = true;
$zhuangtai['text'] = '求片成功，邮件已发送给站长！';
} else {
						$zhuangtai['text'] = '对不起，邮件发送失败！请检查邮箱填写是否有误。';
}

}
}else{
						$zhuangtai['text'] = '验证码输入错误';
    }
   echo json_encode($zhuangtai);
  }
  
  
	$ipzt = array('ok' => false,'text' =>'');
if(isset($_POST['user_tjip'])){

$tj=tjip($_POST['user_ip']);
if($tj){
$ipzt['text']='IP屏蔽失败，已存在！';
	
}else{
$ipzt['ok'] = true;
$ipzt['text']='IP屏蔽成功';
}
echo json_encode($ipzt);
}

if(isset($_POST['user_scip'])){

$sc=scip($_POST['user_scip']);
if($sc){
$ipzt['text']='删除IP成功';
	$ipzt['ok'] = true;
}else{

$ipzt['text']='IP不存在';
}
echo json_encode($ipzt);
}

?>