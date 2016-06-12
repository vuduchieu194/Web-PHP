<?
	include 'connect.php';
	$idsanpham = $_POST['idsanpham'];
	$gia = $_POST['gia'];
	$nhom = $_POST['nhom'];
	$loai = $_POST['loai'];
	$trangthai = $_POST['trangthai'];
	$hinhanh = $_POST['hinhanh'];
	$mota = $_POST['mota'];

	$sql = "update sanpham set gia = '$gia', idnhom = '$nhom', idloai = '$loai', mota = '$mota', hinhanh = '$hinhanh', trangthai = '$trangthai' where idsanpham = '$idsanpham' ";
	$query = mysql_query($sql);
	$result = array();
	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>


