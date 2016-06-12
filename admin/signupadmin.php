
<?
if($_POST['register']=="Hoàn tất đăng ký"){
    $taikhoan = $_POST['taikhoan'];
    $sql = "select * from admin where taikhoan='$taikhoan'";
    $kq = mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($kq)!=0) {
        echo"<script>alert('Tên đăng nhập đã tồn tại!')</script>";
    }
    else {

        $password=md5($_POST['password']);

        $sql = "insert admin (taikhoan, matkhau, trangthai) values ('$taikhoan','$password', 0);";
        mysql_query($sql) or die(mysql_error());
        echo"<script>alert('Đăng kí thành công'); location='?dieuhuong=login';</script>";
        }   
    }
?>



<form class="form-horizontal" method="post">

    <legend>Đăng ký tài khoản</legend>
    <div class="form-group">

        <label for="inputAccount" class="col-lg-2 control-label">Tên đăng nhập</label>
        <div class="col-lg-10">
            <input type="text" required class="form-control" id="inputAccount" placeholder="Tên đăng nhập vào website" autocomplete="off" name="taikhoan">
        </div>

      

        <label for="inputPassword" class="col-lg-2 control-label">Mật khẩu</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu" autocomplete="off" name="password">
        </div>

    </div>


    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary" name="register" value="Hoàn tất đăng ký">Hoàn tất đăng ký</button>
        <button type="reset" class="btn btn-default">Hủy đăng ký</button>
      </div>
    </div>

</form>