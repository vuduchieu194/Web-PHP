<?
/*$rand=mt_rand(100000,999999);
if($_POST['sendmail']=="sendmail"){
	$accountforgot=$_POST['accountforgot'];
	$emailforgot=$_POST['emailforgot'];
	$sql="select * from khachhang where taikhoan='$accountforgot' and email='$emailforgot'";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)==0){
		echo"<script>alert('No account have found!please refill!')</script>";
		}
	else{
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
			echo "Error send mail";//.$mail->ErrorInfo;   
		}   
		else   
		{
			$encryptrand=md5($rand);
			$sql="update khachhang set matkhau='$encryptrand' where taikhoan='$accountforgot'";
			mysql_query($sql);
			echo"<script>alert('Your access token have been send!plese check your mail!');location='?dieuhuong=login'</script>";
		}
	}	
	}*/

?>
<form id="formforgotpass" method="post" name="formforgotpass" onsubmit="return fSendmail();"  style="width:515px; height:182px; margin:auto; box-sizing:border-box; text-align:center" >
	<section style="border:#D0D7DE thin solid; border-radius:12px;">
		<section style="font-family:Verdana, Geneva, sans-serif"><h4>FORGOT YOUR PASSWORD?</h4></section>
		<hr>
        <section style="font-family:Verdana, Geneva, sans-serif; font-size:16px; margin-left:-290px">Account Name:</section>
        <section><input id="accountforgot" type="text" name="accountforgot" style="width:416px; height:44px; border:#D0D7DE thin solid; border-radius:3px;" maxlength="30" placeholder="Your account name"></section><br>
        <section style="font-family:Verdana, Geneva, sans-serif; font-size:16px; margin-left:-360px">Email:</section>
        <section><input id="emailforgot" type="email" name="emailforgot" style="width:416px; height:44px; border:#D0D7DE thin solid; border-radius:3px;" maxlength="40" placeholder="Your email address"></section><br>
        <button id="submitf" type="submit" name="sendmail" value="sendmail" style="background:#21abc7; border-radius:100px; width:163px; height:36px; font-size:16px;" >Send Password</button><br>
        <section>Trying to <a href="index?dieuhuong=login">Sign in</a>?</section><br> <!--mustbepopup-->
		<section>Don't have an account? <a href="index?dieuhuong=signup">Create a free account</a></section><br>
	</section>
</form>
<script>
function fSendmail(){
	/*with(formforgotpass){
		if(accountforgot.value=="")
		{alert("You need to fill your account name!");
		accountforgot.focus();
		return false};
		
		if(emailforgot.value=="")
		{alert("You need to fill your email address!");
		emailforgot.focus();
		return false};
	}*/
	
	$('#submitf').attr('disabled',true).fadeTo('fast',0.5);
	
	var accountforgot=$('#accountforgot').val();
	var emailforgot=$('#emailforgot').val();
	
	if(accountforgot=='' || emailforgot==''){
		alert('Please fill in all blanks!');
		$('#submitf').attr('disabled',false).fadeTo('fast',1);
		return false;	
	}
	
	$.ajax({
		url: 'sendmail.php',
        type: 'POST',
        dataType: 'json',
        data: {
			accountforgot: accountforgot,
			emailforgot: emailforgot
        },
		error: function(xhr, ajaxOptions, thrownError){
			alert(xhr.status);
			alert(xhr.responseText);
			alert(thrownError);
		},
        success: function(result)
        {
			if(result.sendmail!=''){
				alert(result.sendmail);
				$('#submitf').attr('disabled',false).fadeTo('fast',1);
			}else{
				alert('Your access token have been send!plese check your mail!');
				location='?dieuhuong=login';
			}
        }
	});
	return false;
};
</script>
