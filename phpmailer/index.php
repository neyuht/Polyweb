<?php
include "src/PHPMailer.php";
include "src/Exception.php";
include "src/OAuth.php";
include "src/POP3.php";
include "src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
	$nFrom = '199z.Net';
    $mFrom = 'ib.gionho@gmail.com';  //dia chi email cua ban 
    $mPass = 'avdhkzqqhbxhhjgm';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
    	foreach ($ccmail as $k => $v) {
    		$mail->AddCC($v);
    	}
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('ib.gionho@gmail.com', '199z.Net');
    if(!$mail->Send()) {
    	return 0;
    } else {
    	return 1;
    }
}

function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
	$nFrom = '199z.Net';
    $mFrom = 'ib.gionho@gmail.com';  //dia chi email cua ban 
    $mPass = 'avdhkzqqhbxhhjgm';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
    	foreach ($ccmail as $k => $v) {
    		$mail->AddCC($v);
    	}
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('ib.gionho@gmail.com', '199z.Net');
    $mail->AddAttachment($file,$filename);
    if(!$mail->Send()) {
    	return 0;
    } else {
    	return 1;
    }
}


$title = 'Hướng dẫn gửi mail bằng phpmailer';
$content = 'Bạn đang tìm hiểu về cách gửi email bằng php mailler trên 199z.net chúc các bạn có những phút giây vui vẻ.';
$nTo = 'admin 199z.net';
$mTo = 'waptop2s@gmail.com';
$diachicc = 'ib.gionho@gmail.com';
    //test gui mail
$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
if($mail==1)
	echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
else echo 'Co loi!';
?>