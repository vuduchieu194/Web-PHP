
<?
		include 'connect.php';
		$tieude = $_POST['tieude'];
		$noidung = $_POST['noidung'];
		$idkhach = $_POST['idkhach'];
		$idsanpham = $_POST['idsanpham'];

		$sql = "insert phanhoi (idkhach, idsanpham, ngayphanhoi, tieude, noidung) values ('$idkhach', '$idsanpham', now(), '$tieude', '$noidung');";
		$query = mysql_query($sql);
		echo $sql;
	

	if (mysql_affected_rows() == 0){
		$result = array(error=>1, msg=>"chưa thay đổi thông tin");
	}else{
		$result = array(error=>0, msg=>"cập nhật thành công");
	}
	echo json_encode($result);
?>

	