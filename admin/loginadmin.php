<?
				include 'connect.php';

			if ($_POST['login'] == "done") {
				$user = $_POST['username'];
				$pass = md5($_POST['password']);
				$sql = "select * from admin where taikhoan = '$user' and matkhau = '$pass' and trangthai = 1;";
				$query = mysql_query($sql);

				if(!mysql_num_rows($query)){
					echo"<script>alert('Sai thông tin đăng nhập! Mời bạn nhập lại!')</script>";
				}
				else {	
					$_SESSION['useradmin']=$user;
					echo"<script>alert('Đăng nhập thành công!'); location='index.php'; </script>";
				}
			}
			?>

  	 		
<div class="centered" style="width:800px; margin: 200px auto;">
	<form class="form-horizontal" method="post" action="" >
	  <fieldset class="margin-center">
	    <legend class="">QUẢN LÝ WEBSITE</legend>
	    <div class="form-group">
	      <!-- <label for="inputUsername" class="col-lg-2 control-label">Username</label> -->
	      <div class="col-md-6">
	        <input type="text" required class="form-control" id="inputUsername" placeholder="Username" autocomplete="off" name="username">
	      </div>

	     <!--  <label for="inputPassword" class="col-lg-2 control-label">Password</label> -->
	      <div class="col-md-6">
	        <input type="password" required class="form-control" id="inputPassword" placeholder="Password" autocomplete="off" name="password">
	      </div>
			</div>
	    <div class="form-group centered">
	      <div class="col-lg-12">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary" name="login" value="done">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>




<? include 'signupadmin.php'; ?>
</div>


