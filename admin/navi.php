<?
	$location = $_GET['location'];
	switch ($location) {
		case 'main':
			include 'main.php';
			break;
		case 'sanpham':
			include 'sanpham.php';
			break;
		case 'khachhang':
			include 'khachhang.php';
			break;
		case 'hoadon':
			include 'hoadon.php';
			break;
		case 'phanhoi':
			include 'phanhoi.php';
			break;
		case 'logout':
			session_unset();
			unset($_SESSION['taikhoan']);
			echo"<script>alert('Bạn đã đăng xuất thành công!');location='index'</script>";
		default:
			include 'main.php';
			break;
	}

?>