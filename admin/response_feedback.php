<?
	include 'connect.php';
	$idphanhoi = $_POST['idphanhoi'];
	$traloi = $_POST['traloi'];
	$trangthai = $_POST['trangthai'];

	$sql = "update phanhoi set traloi = '$traloi', trangthai = '$trangthai' where idphanhoi = '$idphanhoi' ";
	$query = mysql_query($sql);
	$result = array();
	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>


