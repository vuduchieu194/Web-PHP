

<?
	include 'connect.php';
	$taikhoan = $_SESSION['taikhoan'];
	$sql = "Select * from khachhang where taikhoan = '$taikhoan' and trangthai = 1;";
	$kq = mysql_query($sql);
	$row = mysql_fetch_array($kq);
	$hoten = $row['hoten'];
	$email = $row['email'];
	$dienthoai = $row['dienthoai'];
	$diachi = $row['diachi'];

	if ($_POST['register'] == "REGISTER") {
		$currentpass = md5($_POST['currentpass']);
		$sql = "select * from khachhang where taikhoan = '$taikhoan' and matkhau = '$currentpass';";
		$kq = mysql_query($sql) or die(mysql_error());

		if (mysql_num_rows($kq)==0) {
			echo"<script>alert('Mật khẩu hiện tại không chính xác!')</script>";
		}

		else if ($_POST['password'] != $_POST['password_confirm']) {
	        echo"<script>alert('Xác nhận mật khẩu mới chưa chính xác!')</script>";
	  }

		else {
			$fullname = ($_POST['fullname'] != '') ? $_POST['fullname'] : $hoten;
			$emailaddress = ($_POST['emailaddress'] != '') ? $_POST['emailaddress'] : $email;
			$phonenumber = ($_POST['phonenumber'] != '') ? $_POST['phonenumber'] : $dienthoai;
			$homeaddress = ($_POST['homeaddress'] != '') ? $_POST['homeaddress'] : $diachi;

			if ($_POST['password'] != '') {
				$password = md5($_POST['password']);
				$sql = "update khachhang set hoten = '$fullname', matkhau = '$password', diachi = '$homeaddress', dienthoai = '$phonenumber';";
				mysql_query($sql) or die(mysql_error());
				echo"<script>alert('Cập nhật thành công. Xin mời bạn đăng nhập tài khoản!'); location='?dieuhuong=login';</script>";
			}

			else {
				$sql = "update khachhang set hoten = '$fullname', diachi = '$homeaddress', dienthoai = '$phonenumber';";
				mysql_query($sql) or die(mysql_error());
				echo"<script>alert('Cập nhật thành công. Xin mời bạn đăng nhập tài khoản!'); location='?dieuhuong=login';</script>";
			}	
		}
	}
?>

<form onsubmit="return checkform()" class="form-horizontal" method="post" name="updateMemberInfo">

    <legend>Xin chào <?= $hoten ?>, mời bạn cập nhật thông tin cá nhân</legend>
    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Tên của bạn</label>
        <div class="col-lg-10">
            <input type="text"  class="form-control" id="inputName" placeholder="<?= $hoten ?>" autocomplete="off" name="fullname">
            <span class="help-block" id="inputNameError"></span>
        </div>

        <label for="inputEmail" class="col-lg-2 control-label">Email của bạn</label>
        <div class="col-lg-10">
            <input type="email"  class="form-control" id="inputEmail" placeholder="<?= $email ?>" autocomplete="off" name="emailaddress">
        </div>

        <label for="inputCurrentPassword" class="col-lg-2 control-label">Mật khẩu hiện tại</label>
        <div class="col-lg-10">
            <input type="password" required class="form-control" id="inputCurrentPassword" placeholder="Mời bạn nhập mật khẩu hiện tại để cập nhật thông tin" autocomplete="off" name="currentpass">
        </div>

        <label for="inputPassword" class="col-lg-2 control-label">Mật khẩu mới</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu mới" autocomplete="off" name="password">
            <span class="help-block" id="inputPasswordError"></span>
        </div>

        <label for="inputpassword_confirm" class="col-lg-2 control-label">Xác nhận mật khẩu mới</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" id="inputpassword_confirm" placeholder="Xác nhận mật khẩu mới" autocomplete="off" name="password_confirm">
        </div>

        <label for="inputPhone" class="col-lg-2 control-label">Số điện thoại</label>
        <div class="col-lg-10">
            <input type="text"  class="form-control" id="inputPhone" placeholder="<?= $dienthoai ?>" autocomplete="off" name="phonenumber">
        </div>

    </div>

    <div class="form-group">
      <label for="inputAddress" class="col-lg-2 control-label">Địa chỉ</label>
      <div class="col-lg-10">
        <textarea class="form-control"  rows="3" id="inputAddress" name="homeaddress" placeholder="<?= $diachi ?>"></textarea>
        <span class="help-block">Nhập địa chỉ bạn muốn nhận hàng.</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary" name="register" value="REGISTER">Cập nhật thông tin</button>
        <button type="reset" class="btn btn-default" >Hủy cập nhật</button>
      </div>
    </div>

</form>



<!-- ////////////////////////////////////////////////////////////////////////////////// -->
