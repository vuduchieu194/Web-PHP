<?
	$cart=$_SESSION['CART'];
	$hanhdong=$_GET['hanhdong'];
	$idsanpham=$_GET['idsanpham'];
	switch($hanhdong){
		case"addtocart":
			if($cart && array_key_exists($idsanpham,$cart)){
				$cart[$idsanpham]++;
			}else{
				$cart[$idsanpham]=1;
			}
			$_SESSION['CART']=$cart;
			echo"<script>location='?dieuhuong=cart';</script>";
			break;
		case"delete":
			unset($cart[$idsanpham]);
			$_SESSION['CART']=$cart;
			break;
		case"delall":
			unset($cart);
			$_SESSION['CART']=$cart;
			break;
		case"update":
			foreach(array_keys($cart) as $key){
				$cart[$key]=$_POST[$key];
			}
			$_SESSION['CART']=$cart;
			break;
		case"order":
			if(!$_SESSION['taikhoan']){
				echo"<script>alert('Bạn cần đăng nhập để thanh toán cho giỏ hàng!'); location='?dieuhuong=login&flag=1';</script>";
			}else{
				echo"<script>location='?dieuhuong=order';</script>";
			}
			break;
	}
?>

<h3 class="text-primary">Your Cart</h3>

<form action="?dieuhuong=cart&hanhdong=update" method="post">
<div>
	<?
    	if(!$cart){
		?>
			<div class="text-center">
			  <h3>Your cart is empty!</h3>
			  <a href="?dieuhuong=home" class="btn btn-default">Continue Shopping</a>
			</div>
		<?
		}else{
			$listidsanpham="";
			foreach(array_keys($cart) as $key){
				$listidsanpham.=$key.",";
			}
			$listidsanpham.="0";
			$sql="select * from sanpham where idsanpham in($listidsanpham)";
			$kq=mysql_query($sql) or die(mysql_error());
			$tongtien=0;
			while($rowsanpham=mysql_fetch_array($kq)){
			?>
			<div class="panel panel-default text-center">
				<div class="panel-body text-center ">
					<div class="col-md-2 col-sm-2"><img style="height: 40px;" src="img/<?=$rowsanpham['hinhanh']?>"></div>
			        <div class="col-md-2 col-sm-2"><?=$rowsanpham['tensanpham']?></div>
			        <div class="col-md-2 col-sm-2 dongiasanpham"><?=$rowsanpham['gia']?></div>
			        <div class="col-md-2 col-sm-2 "><input class="soluongsanpham text-center" name="<?=$rowsanpham['idsanpham']?>" min="1" max="99" type="number" value="<?=$cart[$rowsanpham['idsanpham']]?>" /></div>
			        <div class="col-md-2 col-sm-2 thanhtiensanpham vnd"><?=$thanhtien=$rowsanpham['gia']*$cart[$rowsanpham['idsanpham']]?></div>
			        <div class="col-md-2 col-sm-2"><a class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng?')) location='?dieuhuong=cart&hanhdong=delete&idsanpham=<?=$rowsanpham['idsanpham']?>';" href="#">Remove</a></div>
		       	</div>
			</div>

			<?
				$tongtien+=$thanhtien;
			}
			?>
			<div class="panel panel-primary text-center">
			  <div class="panel-heading">
			    <h3 class="panel-title"></h3>
			  </div>
			  <div class="panel-body"> 
			  	<a href="?dieuhuong=home" class="btn btn-default">Continue Shopping</a>
			  	<a href="?dieuhuong=cart&hanhdong=delall" class="btn btn-default">Delete Cart</a>
			  	<!-- <input type="submit" value="Cập nhật giỏ hàng" class="btn btn-primary"> -->
			  	<a onclick="location='?dieuhuong=cart&hanhdong=order';" class="btn btn-success">Checkout - <span id="tongthanhtoan" class="vnd"><?=$tongtien?></span></a>
			    
			  </div>
			</div>
			<?
		}
	?>
</div>
</form>
<br>
<br>



<!-- wishlist cua khach hang -->
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Your Wishlist</h3>
  </div>
  <div class="panel-body text-center">

<?	
	$sql = "select * from wishlist a left join sanpham b on a.idsanpham = b.idsanpham left join khachhang c on a.idkhach = c.idkhach where b.trangthai = 1 and c.taikhoan = '$taikhoan' ";
	$query = mysql_query($sql);
	// echo $sql;

	if (mysql_num_rows($query) == 0) { ?>
		<h5 class="text-center text-primary"> Your Wishlist Is Empty! </h5>
	<?
	} else {

		$kq = mysql_query($sql);
		include 'item.php';
	}
?>



