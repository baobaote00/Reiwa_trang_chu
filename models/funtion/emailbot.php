<?php 
 

require("../PHPMailer-master/src/PHPMailer.php");
require("../PHPMailer-master/src/SMTP.php");
require("../PHPMailer-master/src/Exception.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();
 
$mail->IsSMTP(); // send via SMTP
$mail->Host = "kusamailer.tenten.cloud"; // SMTP servers change to localhost
$mail->Smtp_port ="465";       // change smtp port
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "hoanganh34k@reiwahouse.com.vn"; // SMTP username
$mail->Password = "Hoanganh11k!"; // SMTP password
 
$mail->From = "hoanganh34k@reiwahouse.com.vn";
$mail->FromName = "Name";
$mail->AddAddress("hoanganh34k@gmail.com","Phạm Hoàng Anh ReiwaHouse");
$mail->AddReplyTo("hoanganh34k@gmail.com","HoangAnh");
 
$mail->WordWrap = 50; // set word wrap
 
$mail->IsHTML(true); // send as HTML
 
$mail->Subject = "Hoàng Anh đẹp trai";
$mail->Body = "nguyên Xấu trai";
$mail->AltBody = "Chuẩn óc chó";
 
if(!$mail->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
 
echo "Message has been sent";
 
?>