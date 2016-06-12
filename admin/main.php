

<? include 'connect.php'; ?>

<?
	$taikhoan = $_SESSION['useradmin'];

	if ($_POST['smform'] == 'Submit') 
		$pass = md5($_POST['pass']);
		$sql = "update admin set matkhau = $pass where taikhoan = $taikhoan ";
		mysql_query($sql);
?>

<div class="container">
	

 	 <h1>Xin chào <?= $_SESSION['useradmin'] ?> </h1>
  	
	<form action="" method="POST" accept-charset="utf-8" class="centered">
	<div class="input-group input-group-lg col-md-4">
	  <span class="input-group-addon" id="sizing-addon1">Đổi Mật Khẩu</span>
	  <input type="text" class="form-control" placeholder="Mật Khẩu Mới" aria-describedby="sizing-addon1">
	</div>

		<div class="panel-body"><input class="btn btn-primary control-label" type="submit" name="smform" value="Submit"></div>

	</form>

</div>


<? 
	include 'thongke.php';

?>