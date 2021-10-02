<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8"); 
	
	
function qqxinxi($qq){

	$spurl = "http://r.pengyou.com/fcg-bin/cgi_get_portrait.fcg?uins=".$qq;
	$data = file_get_contents($spurl);
	$nc=explode('"',$data);
	$s=$nc[5];
	$bm=mb_convert_encoding($s,'UTF-8','UTF-8,GBK,GB2312,BIG5');
	if(empty($bm)){
	
	return array('nc'=>'QQ错误','tx'=>'http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=1418455019&src_uin=qq.feixue.me&fid=blog&spec=100');
		}else{
	return array('nc'=>$bm,'tx'=>'http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin='.$qq.'&src_uin=qq.feixue.me&fid=blog&spec=100');
}
}


function footer(){
	$json_name = "./json/footer.json";
	$json_string = file_get_contents($json_name);
	$obj = json_decode($json_string);
	$users = $obj->fo;
	return $users;
}

function shanchufooter($username){
	$json_name = "./json/footer.json";
	$json_string = file_get_contents($json_name);
	$obj = json_decode($json_string);
	$users = $obj->fo;
	$users_num = count($users); 
	for($i=0;$i<$users_num;$i++){
		if($users[$i][0]==$username){
			array_splice($users, $i, 1); 
			if($users_num!=count($users)){
				$obj =  array ('fo'=>$users);
				$json_string = json_encode($obj); 
				file_put_contents('./json/footer.json', $json_string);
				$ResTest = '<div class="alert alert-success alert-dismissable"><h4><strong>删除导友链成功</strong></h4></div>';
				break;
			}else{
				$ResTest ='<div class="alert alert-info alert-dismissable"><h4><strong>未知错误</strong></h4></div>';
			}
			break;
		}else if($i==$users_num-1){
			$ResTest = '<div class="alert alert-danger alert-dismissable"><h4><strong>友链已不存在</strong></h4></div>';
			break;
		}
	}
	return $ResTest;
}


function hqip(){
	$json_name = "./json/ip.json";
	$json_string = file_get_contents($json_name);
	$obj = json_decode($json_string);
	$users = $obj->ip;
	return $users;
}

function pdip($xip){
$dhm5=jmd5($xip,'zhishou');
	       $json_name = "json/ip.json";
									 $json_string = file_get_contents($json_name);
									 $obj = json_decode($json_string);
									 $users = $obj->ip;
									 $users_num = count($users); 
									 if($users_num!=0){
										 for($i=0;$i<$users_num;$i++){
if($users[$i]==$dhm5){
	return true;
	}else if($i==$users_num-1){
		return false;
		}
		}
		}else{
			return false;
			}
}

function tjip($xip){

$dhm5=jmd5($xip,'zhishou');
										 $json_name = "json/ip.json";
									 $json_string = file_get_contents($json_name);
									 $obj = json_decode($json_string);
									 $users = $obj->ip;
									 $users_num = count($users); 
									
									 if($users_num!=0){
										 for($i=0;$i<$users_num;$i++){
										 
											 if($users[$i]==$dhm5){
			return true;
											 }else if($i==$users_num-1){
										 $users[] = $dhm5;
										 $obj =  array ('ip'=>$users);
										 $json_string = json_encode($obj); 
										 file_put_contents('json/ip.json', $json_string);
			return false;
											}}
										
										}else{
										 $users[] = $dhm5;
										 $obj =  array ('ip'=>$users);
										 $json_string = json_encode($obj); 
										 file_put_contents('json/ip.json', $json_string);
			return false;
									 }
			
}

function scip($xip){
	$json_name = "json/ip.json";
	$json_string = file_get_contents($json_name);
	$obj = json_decode($json_string);
	$users = $obj->ip;
	$users_num = count($users); 
	for($i=0;$i<$users_num;$i++){
		if($users[$i]==$xip){
			array_splice($users, $i, 1); 
			if($users_num!=count($users)){
				$obj =  array ('ip'=>$users);
				$json_string = json_encode($obj); 
				file_put_contents('json/ip.json', $json_string);
					return true;
				break;
			}else{
				return false;
			}
			break;
		}else if($i==$users_num-1){
				return false;
			break;
		}
	}
	return false;
}




function jmd5($data, $key)
{
 $key = md5($key);
  $x = 0;
  $len = strlen($data);
  $l = strlen($key);
  for ($i = 0; $i < $len; $i++)
  {
    if ($x == $l)
    {
     $x = 0;
    }
    $char .= $key{$x};
    $x++;
  }
  for ($i = 0; $i < $len; $i++)
  {
    $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
  }
  return base64_encode($str);
}

function mmd5($data, $key)
{
 $key = md5($key);
  $x = 0;
  $data = base64_decode($data);
  $len = strlen($data);
  $l = strlen($key);
  for ($i = 0; $i < $len; $i++)
  {
    if ($x == $l)
    {
     $x = 0;
    }
    $char .= substr($key, $x, 1);
    $x++;
  }
  for ($i = 0; $i < $len; $i++)
  {
    if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
    {
      $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
    }
    else
    {
      $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
    }
  }
  return $str;
}
?>