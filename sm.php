<?php

function send_mail($to, $sub, $msg){	
require_once "smtp.class.php";
									
	$From = 'yeyulingfeng001@foxmail.com';
	$Host = 'smtp.qq.com';
	$Port = 465;
	$SMTPAuth = 1;
	$Username = '3311748276';
	$Password = 'ukdnicugitlzdaff';
	$Nickname = '夜雨聆风';
	$SSL = 465;
	$mail = new SMTP($Host, $Port, $SMTPAuth, $Username, $Password, $SSL);
	$mail->att = array();
	if ($mail->send($to, $From, $sub, $msg, $Nickname)) {
		return true;
	}
	return $mail->log;
}

	$SHOU = 'yeyulingfeng001@foxmail.com';
?>