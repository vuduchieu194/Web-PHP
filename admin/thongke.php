<?
	include 'connect.php';
	if(!$_SESSION) {
		echo 'Bạn không có quyền truy cập!';
	}



	$sql_tongsp = "select idsanpham from sanpham where 1 ";
	$sql_spban = $sql_tongsp . "and trangthai = 1";
	$sql_spkhongban = $sql_tongsp . "and trangthai = 0";

	$query_tongsp = mysql_query($sql_tongsp);
	$query_spban = mysql_query($sql_spban);
	$query_spkhongban = mysql_query($sql_spkhongban);

	$row_tongsp = mysql_num_rows($query_tongsp);
	$row_spban = mysql_num_rows($query_spban);
	$row_spkhongban = mysql_num_rows($query_spkhongban);


?>

<div class="container">
	<div class="panel panel-primary ">
	<div class="panel-heading">
		Thông kê sản phẩm
	</div>
	<div class="panel-body">
		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Tổng Số Sản Phẩm</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_tongsp ?></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Đang Bán</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_spban ?></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Không Bán</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_spkhongban ?></a>
			</div>
		</div>
		</div>
	</div>

<!-- /////////////////////////////////////////////////////// -->
<? 
 $sql_tongphanhoi = "select * from phanhoi where 1";
 $sql_phanhoichuatraloi = $sql_tongphanhoi . " and traloi = NULL";

 $query_tongphanhoi = mysql_query($sql_tongphanhoi);
 $query_phanhoichuatraloi = mysql_query($sql_phanhoichuatraloi);

 $row_tongphanhoi = mysql_num_rows($query_tongphanhoi);
 $row_phanhoichuatraloi = mysql_num_rows($query_phanhoichuatraloi);
?>



	<div class="panel panel-primary ">
	<div class="panel-heading">
		Thống Kê Phản Hồi
	</div>
	<div class="panel-body">

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Tổng Số Phản Hồi Về SP</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_tongphanhoi ?></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Chưa Trả Lời</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_phanhoichuatraloi ?></a>
			</div>
		</div>
	</div>
	</div>
<!-- ////////////////////////////////////////////////////////// -->

<? 
 $sql_tongkhachhang = "select * from khachhang where 1";
 $sql_khachhangkichhoat = $sql_tongphanhoi . " and trangthai = 1";

 $query_tongkhachhang = mysql_query($sql_tongkhachhang);
 $query_khachhangkichhoat = mysql_query($sql_khachhangkichhoat);

 $row_tongkhachhang = mysql_num_rows($query_tongkhachhang);
 $row_khachhangkichhoat = mysql_num_rows($query_khachhangkichhoat);
?>



	<div class="panel panel-primary ">
	<div class="panel-heading">
		Thống Kê Khách Hàng
	</div>
	<div class="panel-body">

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Tổng Số Khách Hàng</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_tongkhachhang ?></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="input-group input-group-lg col-md-2">
			  <span class="input-group-addon" id="sizing-addon1">Đang Kích Hoạt</span>
			  <a class="form-control" aria-describedby="sizing-addon1"><?= $row_khachhangkichhoat ?></a>
			</div>
		</div>
	</div>






<!-- /////////////////////////////////////////////////////// -->
</div>