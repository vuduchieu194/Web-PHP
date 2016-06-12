<?
	$option = $_GET['opt'];
	if ($_GET['opt'] == 'dangxuat')
	{
		session_unset();
		unset($_SESSION['taikhoan']);
		echo"<script>alert('Logout successful!');location='index?dieuhuong=home'</script>";
	}

	if($_POST['login']=="LOGIN"){
		$account=$_POST['account'];
		$pass=md5($_POST['pass']);
		$sql="select * from khachhang where taikhoan='$account' and matkhau='$pass'";
		$kq=mysql_query($sql) or die(mysql_error());
		if(!mysql_num_rows($kq)){
			echo"<script>alert('Your ID or password was entered incorrectly! Please refill!')</script>";
			}
		else{	
			$_SESSION['taikhoan']=$account;
			echo"<script>alert('login successful!');location='index?dieuhuong=home'</script>";
			}
		}
	?>

<div class="text-center">
	<form name="formlogin" onsubmit="return dieukien()" method="post" class="form-horizontal">
		    	Account Name:
		    	<input class="form-control text-center" type="text" maxlength="30" name="account"/>
		    	Password:
		    	<input class="form-control text-center" type="password" maxlength="30" name="pass"/>
		    	<br>
		      <input class="btn btn-default" type="submit" name="login" value="LOGIN"/>
		      <br>
		      <a class="" href="?dieuhuong=matpass">Forgot password?</a>
	</form>
</div>
 <script>
function dieukien(){ 
	with(formlogin){
		if(account.value=="")
		{alert("You need to fill your account name");
		account.focus();
		return false};
		if(pass.value=="")
		{alert("You need to fill your password");
		pass.focus();
		return false};	
		}		
}
</script>



