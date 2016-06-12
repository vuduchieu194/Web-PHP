<?
	include 'connect.php';
	$taikhoan = $_SESSION['taikhoan'];
	$sql = "select * from khachhang where taikhoan = '$taikhoan' and trangthai = 1;";
	$kq = mysql_query($sql);
	$row = mysql_fetch_array($kq);
	$idkhach = $row['idkhach'];


	$idsanpham=$_GET['idsanpham'];
	$sql = "select * from sanpham where idsanpham='$idsanpham'";
	$kq = mysql_query($sql);
	$row = mysql_fetch_array($kq);
	// $sql="update sanpham set luotxem=luotxem+1 where idsanpham='$idsanpham'";
	// mysql_query($sql);
?>

<div class="hidden">
	<input type="text" id="idkhachhang" value="<?= $idkhach ?>">
	<input type="text" id="idsanpham" value="<?= $idsanpham ?>">
</div>



<div class="row">
</div>
<div class="row">
	<div class="col-md-4 col-sm-12 text-right">
		<h3><?=$row['tensanpham']?></h3>

		<span><?=number_format($row['gia'],0,',','.')?> VND</span><br>
		<!-- wishlist -->
		<?
			$sql1 = "select * from wishlist where idkhach = '$idkhach' and idsanpham = '$idsanpham';";
			$query1 = mysql_query($sql1);
			$row1 = mysql_fetch_array($query1);
			$numrow1 = mysql_num_rows($query1);

			// if user added item to wishlist
			if ($numrow1) {
				?>
					<a id="add-to-wishlist" class="btn btn-default">Added to wishlist <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
				<?
			// if user haven't added item to wishlist
			} else {
		?>
					<a id="add-to-wishlist" class="btn btn-success" onclick="add_to_wishlist()">Add to wishlist <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
		<?
			}
		?>
		
		<!-- add to cart -->
		<a href="?dieuhuong=cart&hanhdong=addtocart&idsanpham=<?=$row['idsanpham']?>" class="btn btn-success" role="button"> Add to Cart </a>
		<div class="col-md-12 text-justify">
			<p><?=$row['mota']?></p>
		</div>
	</div>
	<div class="col-md-8 col-sm-4 text-left">
		<img src="img/<?=$row['tensanpham']?>" alt="">
	</div>
</div>


<div class="col-md-12">
<?
	$sql = "select * from phanhoi where idsanpham = '$idsanpham' and trangthai = 1;";

	$kq = mysql_query($sql);
	$numrow = mysql_num_rows($kq);
	if ($numrow == 0) { ?>
		<div class=well>Sản phẩm này chưa có bình luận!</div>
	<?
	}
	while($row = mysql_fetch_array($kq)) {
		$thoigian = $row['ngayphanhoi'];
		$tieude = $row['tieude'];
		$noidung = $row['noidung'];
		$idkhach = $row['idkhach'];

		$sqlkhach = "select * from khachhang where idkhach = $idkhach and trangthai=1;";
		$kqkhach = mysql_query($sqlkhach);
		$rowkhach = mysql_fetch_array($kqkhach);
		$tenkhach = $rowkhach['hoten'];


?>
	<div class="panel panel-default">
	<div class="panel-heading">
		<span class=""> <?= $tieude ?> </span>
		<div>
			<span class=""> Đăng bởi <?= $tenkhach ?> lúc <?= $thoigian ?> </span>
		</div>
	</div>
	  <div class="panel-body">
	  	<p><?= $noidung ?></p>
	  </div>
	</div>
<?
	}
?>
</div>


