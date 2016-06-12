<?
header("Content-Type: application/json;charset=utf8");
$conn1 = mysqli_connect('localhost','root','123456', 'dbproject');
mysqli_set_charset($conn1,"utf8");

$error=array(
	'error' => 'success',
	'sendmail' => ''
);
$accountforgot=$_POST['accountforgot'];
$emailforgot=$_POST['emailforgot'];
$sql=mysqli_query($conn1,"select * from khachhang where taikhoan='$accountforgot' and email='$emailforgot'");
if(mysqli_num_rows($sql)==0){
	$error['sendmail']='No account have found!please refill!';
	}
else{
	$rand=mt_rand(100000,999999);
	include "phpmailer/class.phpmailer.php";  
	include "phpmailer/class.smtp.php";    
	//require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();  
	$mail->IsSMTP(); // set mailer to use SMTP   
	$mail->Host = "smtp.gmail.com"; // specify main and backup server
	$mail->Port = 465; // set the port to use   
	$mail->SMTPAuth = true; // turn on SMTP authentication   
	$mail->SMTPSecure = 'ssl';   
	$mail->Username = "vuduchieu.hieu@gmail.com"; // your SMTP username or your gmail username   
	$mail->Password = "vuduchieu1904"; // your SMTP password or your gmail password   
	$from = "vuduchieu.hieu@gmail.com"; // Reply to this email   
	$to="$emailforgot"; // Recipients email ID   
	$name="ITLC"; // Recipient's name   
	$mail->From = $from;   
	$mail->FromName="Vu Duc Hieu"; // Name to indicate where the email came from when the recepient received   
	$mail->AddAddress($to,$name);   
	$mail->AddReplyTo($from,"ITLC");   
	$mail->WordWrap = 50; // set word wrap   
	$mail->IsHTML(true); // send as HTML   
	$mail->Subject = "Forgot password Apple Acess account";   
	$mail->Body = "Account Name:$accountforgot ----- Password:$rand"; //HTML Body   
	$mail->AltBody = "Mail nay duoc goi bang phpmailer class. - itlc.tnus.edu.vn"; //Text Body   
	//$mail->SMTPDebug = 2;   
	if(!$mail->Send())   
	{   
		$error['sendmail']="Error send mail";//.$mail->ErrorInfo;   
	}   
	else   
	{
		$encryptrand=md5($rand);
		$sql=mysqli_query($conn1,"update khachhang set matkhau='$encryptrand' where taikhoan='$accountforgot'");
		$error['sendmail']='';
	}
}	

mysqli_close($conn1);

	echo json_encode($error);
?>
