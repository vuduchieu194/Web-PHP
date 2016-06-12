<?
	$dieuhuong=$_GET['dieuhuong'];
	switch($dieuhuong){
		case"home":
			include"home.php";
			break;
		case"signup":
			include"signup.php";
			break;
		case"login":
			include"login.php";
			break;
		case"logout":
			unset($_SESSION['taikhoan']);
			echo"<script>location='?dieuhuong=home';</script>";
			break;
		case"sanpham":
			include"productdetail.php";
			break;
		case"timkiem":
			include"search.php";
			break;
		case"cart":
			include"cart.php";
			break;
		case"order":
			include"order.php";
			break;
		// case "chitietnhom":
		// 	include "chitietnhom.php";
		// 	break;
		// case "chitietloai":
		// 	include "chitietloai.php";
		// 	break;
		case "xemthem":
			include "xemthem.php";
			break;
		case "groupdetail":
			include "groupdetail.php";
			break;
		case "quanlytaikhoan":
			include "member.php";
			break;
		case "matpass":
			include"forgotpass.php";
			break;
		default: include"home.php";
	
	}


?>