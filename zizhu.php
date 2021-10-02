<?php

//友链自助申请
	$zhuangtai = array('ok' => false,'text' =>'');
	
    
if(strtolower($_POST['user_ma'])== $_COOKIE['YZCookie']){

$a1 = htmlspecialchars($_POST['url']. '/' , ENT_QUOTES);

$a2 = htmlspecialchars($_POST['mz'], ENT_QUOTES);

$a3 = htmlspecialchars($_POST['js'], ENT_QUOTES);


$name = file_get_contents($a1);
$pan = $_SERVER['HTTP_HOST']; 
$ming="挚手影院";
$con = explode($pan,$name); 
$conn = explode($ming,$name);
if (count($con)>1&&count($conn)>1){
$dhm5=md5($a1);
	 $json_name = "json/footer.json";
									 $json_string = file_get_contents($json_name);
									 $obj = json_decode($json_string);
									 $users = $obj->fo;
									 $users_num = count($users); 
									 if($users_num!=0){
										 for($i=0;$i<$users_num;$i++){
										 
											 if($users[$i][0]==$dhm5){
			$zhuangtai['text'] = '您的网站已是本站友链！';
											 }else if($i==$users_num-1){
										 $user = array($dhm5,$a2,$a1);
												 $users[] = $user;
												 $obj =  array ('fo'=>$users);
												 $json_string = json_encode($obj); 
												 file_put_contents('json/footer.json', $json_string);
											 require_once "sm.php";

$result = send_mail($SHOU, '影视系统-友链申请','网站名字：'.$a2.'<br><br>网站网址：'.$a1.'<br><br>网站介绍：'.$a3.'<br><br>申请时间：'.date("Y.m.d").'<br><br>请站长速速审核哦！');

     if ($result == 1) {
						$zhuangtai['ok'] = true;
			$zhuangtai['text'] = '添加友链成功';
			
									}else{
									
						$zhuangtai['ok'] = true;
			$zhuangtai['text'] = '添加友链成功';
									 }
											}
											
											
											}
										
										}else{
										 $user = array($dhm5,$a2,$a1);
										 $users[] = $user;
										 $obj =  array ('fo'=>$users);
										 $json_string = json_encode($obj); 
										 file_put_contents('json/footer.json', $json_string);
										 require_once "sm.php";

$result = send_mail($SHOU, '影视系统-友链申请','网站名字：'.$a2.'<br><br>网站网址：'.$a1.'<br><br>网站介绍：'.$a3.'<br><br>申请时间：'.date("Y.m.d").'<br><br>请站长速速审核哦！');

     if ($result == 1) {
						$zhuangtai['ok'] = true;
			$zhuangtai['text'] = '添加友链成功';
									}else{
									
						$zhuangtai['ok'] = true;
			$zhuangtai['text'] = '添加友链成功';
									 }
									 
									 }


}else{

			$zhuangtai['text'] = '请先添加本站为友链,请确保名字是挚手影院';
}



 }else{
						$zhuangtai['text'] = '验证码输入错误';
    }
    
  
			echo json_encode($zhuangtai);
?>




