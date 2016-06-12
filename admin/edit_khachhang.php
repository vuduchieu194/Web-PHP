<?
	include 'connect.php';
	$idkhach = $_POST['idkhach'];
	$hoten = $_POST['hoten'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];
	$trangthai = $_POST['trangthai'];

	$sql = "update khachhang set hoten = '$hoten', diachi = '$diachi', email = '$email', dienthoai = '$dienthoai', trangthai = '$trangthai' where idkhach = '$idkhach' ";
	$query = mysql_query($sql);
	$result = array();
	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>