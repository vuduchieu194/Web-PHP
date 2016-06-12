<?
	include 'connect.php';

	$trangthai = $_POST['trangthai'];
	$idhoadon = $_POST['idhoadon'];
	$ghichu = $_POST['ghichu'];


	$sql = "update hoadon set trangthai = '$trangthai', ghichu = '$ghichu' where idhoadon = '$idhoadon' ";
	$query = mysql_query($sql);
	$result = array();
	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>


