<?
	include 'connect.php';
	$tensanpham = $_POST['tensanpham'];
	$hinhanh = $_POST['hinhanh'];
	$gia = $_POST['gia'];
	$soluong = $_POST['soluong'];
	$idnhom = $_POST['idnhom'];
	$idloai = $_POST['idloai'];
	$mota = $_POST['mota'];
	$trangthai = $_POST['trangthai'];

	$sql = "select * from sanpham where tensanpham = '$tensanpham'";
	$query = mysql_query($sql);
	$numrow = mysql_num_rows($query);
	if ($numrow == 0)
	{
		$sql = "insert sanpham(tensanpham, gia, soluong, idnhom, idloai, mota, hinhanh, trangthai, ngaynhap) values ('$tensanpham', '$gia', '$soluong', '$idnhom', '$idloai', '$mota', '$hinhanh', '$trangthai', now())";
		$query = mysql_query($sql);
		$result = array();
	} else {
		$row = mysql_fetch_array($query);
		$soluongmoi = $row['soluong'] + $soluong;
		$sql = "update sanpham set soluong = '$soluongmoi' where tensanpham = '$tensanpham' ";
		mysql_query($sql);
	}
	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>
