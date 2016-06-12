<?
if($_POST['register']=="Hoàn tất đăng ký"){
	$accountname = $_POST['accountname'];
	$sql = "select * from khachhang where taikhoan='$accountname'";
	$kq = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($kq)!=0) {
		$_REQUEST['fullname']=$_POST['fullname'];
		$_REQUEST['emailaddress']=$_POST['emailaddress'];
		$_REQUEST['phonenumber']=$_POST['phonenumber'];
		$_REQUEST['homeaddress']=$_POST['homeaddress'];
		echo"<script>alert('Account name has existed!')</script>";
	}
	else {
		$fullname=$_POST['fullname'];
		$emailaddress=$_POST['emailaddress'];
		$password=md5($_POST['password']);
		$phonenumber=$_POST['phonenumber'];
		$homeaddress=$_POST['homeaddress'];
		$sql = "insert khachhang (hoten,taikhoan,matkhau,diachi,email,dienthoai) values ('$fullname','$taikhoan','$password','$homeaddress','$emailaddress','$phonenumber');";
		mysql_query($sql) or die(mysql_error());
		echo"<script>alert('Signup successful! Please login!'); location='?dieuhuong=login';</script>";
		}	
	}
?>


<form name="formregister" onsubmit="return dieukien();" class="form-horizontal" method="post">

    <legend>Register</legend>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Full name:</label>
        <div class="col-lg-10">
            <input type="text" maxlength="30" required class="form-control" id="inputName" placeholder="Full Name" autocomplete="off" name="fullname" value="<?=$_REQUEST['fullname']?>">
        </div>

        <label for="inputAccount" class="col-lg-2 control-label">Account Name:</label>
        <div class="col-lg-10">
            <input type="text" maxlength="30" required class="form-control" id="inputAccount" placeholder="Account name used to login the website" autocomplete="off" name="accountname">
        </div>

        <label for="inputEmail" maxlength="40" class="col-lg-2 control-label">Email address:</label>
        <div class="col-lg-10">
            <input type="email" required class="form-control" id="inputEmail" placeholder="Your Email" autocomplete="off" name="emailaddress" value="<?=$_REQUEST['emailaddress']?>">
        </div>

        <label for="inputPassword" class="col-lg-2 control-label">Password:</label>
        <div class="col-lg-10">
            <input type="password" maxlength="30" class="form-control" id="inputPassword" placeholder="Password" autocomplete="off" name="password">
        </div>

        <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm Password:</label>
        <div class="col-lg-10">
            <input type="password" maxlength="30" required class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" autocomplete="off" name="confirmpassword">
        </div>

        <label for="inputPhone" class="col-lg-2 control-label">Phone number:</label>
        <div class="col-lg-10">
            <input type="text" maxlength="15" required class="form-control" id="inputPhone" placeholder="Phone number" autocomplete="off" name="phonenumber" value="<?=$_REQUEST['phonenumber']?>">
        </div>

    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Home Address:</label>
      <div class="col-lg-10">
        <textarea class="form-control" required rows="3" id="textArea" name="homeaddress" value="<?=$_REQUEST['homeaddress']?>"></textarea>
        <span class="help-block" style="color:#930">Note: Please write down please write down the delivery address.</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary" name="register" value="Hoàn tất đăng ký">Register</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
</form>
<script>
function dieukien(){
	with(formregister){
		/*alert('');
		return false;*/
		var mau1=/^\w{6,20}$/;
		var mau2=/^\d{8,12}$/;
		var mau3=/^\w+$/;
		if(fullname.value=="")
		{alert("You need to fill your name!");
		fullname.focus();
		return false};
		if(accountname.value=="")
		{alert("You need to fill your account name!");
		accountname.focus();
		return false};
		if(mau3.test(accountname.value)==false)
		{alert("It must be no space in account name");
		accountname.focus();
		return false};
		if(emailaddress.value=="")
		{alert("You need to fill your email address!");
		emailaddress.focus();
		return false};
		if(phonenumber.value=="")
		{alert("You need to fill your phone number!");
		phonenumber.focus();
		return false};
		if(mau2.test(phonenumber.value)==false)
		{alert("You need to fill only number and it must be 8-13 numbers!");
		phonenumber.focus();
		return false};
		if(homeaddress.value=="")
		{alert("You need to fill your home address!");
		homeaddress.focus();
		return false};
		if(password.value=="")
		{alert("You need to fill your password!");
		password.focus();
		return false};
		if(mau1.test(password.value)==false)
		{alert("Your password must be 6-20 characters!");
		password.focus();
		return false};
		if(confirmpassword.value=="")
		{alert("You need to confirm password!");
		confirmpassword.focus();
		return false};
		if(password.value!=confirmpassword.value)
		{alert("Password and confirm password not match!");
		confirmpassword.focus();
		return false};
	}
}

</script>