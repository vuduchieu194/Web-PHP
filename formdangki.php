<?
if($_POST['register']=="REGISTER"){
	$accountname=$_POST['accountname'];
	$sql="select * from khachhang where taikhoan='$accountname'";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)!=0){
		echo"<script>alert('Tên đăng nhập đã tồn tại!')</script>";
		}
	else{
		$fullname=$_POST['fullname'];
		$emailaddress=$_POST['emailaddress'];
		$password=md5($_POST['password']);
		$phonenumber=$_POST['phonenumber'];
		$homeaddress=$_POST['homeaddress'];
		$sql="insert khachhang(hoten,taikhoan,matkhau,diachi,email,dienthoai)values('$fullname','$accountname','$password','$homeaddress','$emailaddress','$phonenumber')";
		mysql_query($sql) or die(mysql_error());
		echo"<script>alert('Đăng kí thành công. Xin mời bạn đăng nhập tài khoản!')</script>";
		}	
	}
?>
<form method="post" style="width:40%; box-sizing:border-box; float:right">
<section style="border:#D0D7DE thin solid; border-radius:12px;">
	<section style="text-align:center; font-family:Verdana, Geneva, sans-serif"><h3>Don't have an account yet? Register Now!</h3></section>
    <section style="text-align:center">----</section>
    <section style="font-family:Verdana, Geneva, sans-serif"><h4>Let's join with us!Register Now!</h4></section>
    <section style="box-sizing:border-box" >
    	Full Name:><br />
    	<input type="text" style="width:523px; height:34px" name="fullname"/><br /><br />
    </section>
    <section style="box-sizing:border-box" >
    	Account Name:<br />
    	<input type="text" style="width:523px; height:34px" name="accountname"/><br /><br />
    </section>
    <section style="float:left; box-sizing:border-box">
    	Email Address:<br />
    	<input type="email" style="height:34px; width:245px" name="emailaddress" />
    </section>
    <section style="box-sizing:border-box">    
		Phone number:<br />
    	<input type="text" style="height:34px; width:245px" name="phonenumber" /><br /><br />
    </section>
    <section style="box-sizing:border-box" >
    	Home Address:<br />
    	<input type="text" style="width:523px; height:34px" name="homeaddress"/><br /><br />
    </section>
    <section style="box-sizing:border-box" >    
    	Password:<br />
    	<input type="password" style="width:523px; height:34px" name="password"/><br /><br />
    </section>
    <section>
    	Confirm Password:<br />
    	<input type="password" style="width:523px; height:34px" name="confirmpassword"/><br /><br />
	</section>  
    <button type="submit" name="register" value="REGISTER">REGISTER</button>  
</section >
</form >
<?
if($_POST['login']=="LOGIN"){
	$account=$_POST['account'];
	$pass=md5($_POST['pass']);
	$sql="select * from khachhang where taikhoan='$account' and matkhau=md5('$pass')";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)==0){
		echo"<script>alert('Sai tên đăng nhập hoặc mật khẩu!Xin mời nhập lại!');</script>";
		}
	else{
		$_SESSION['accountname']='$account';
		echo"<script>alert('Đăng nhập thành công!');</script>";
		}	
	}
?>
<form method="post" style="width:40%; box-sizing:border-box; float:right">
	<section style="border:#D0D7DE thin solid; border-radius:12px;">
	<section style="text-align:center; font-family:Verdana, Geneva, sans-serif"><h3>Login</h3></section>
	<section style="text-align:center">----</section>
	<section style="box-sizing:border-box" >
    	Account Name:<br />
    	<input type="text" style="width:523px; height:34px" name="account"/><br /><br />
    </section>
	<section style="box-sizing:border-box" >
    	Password:<br />
    	<input type="password" style="width:523px; height:34px" name="pass"/><br /><br />
    </section>
    <a href="#">Forgot password?</a><br />
    <button type="submit" name="login" value="LOGIN">LOGIN</button>  
    

</section>
</form>