<?
	$sql="select * from khachhang where taikhoan='".$_SESSION['taikhoan']."'";
	$kq=mysql_query($sql);
	$rowkhach=mysql_fetch_array($kq);
?>

<?
	if($_POST['thanhtoan']){
		$hotennn=$_POST['hotennn'];
		$diachinn=$_POST['diachinn'];
		$dienthoainn=$_POST['dienthoainn'];
		$emailnn=$_POST['emailnn'];
		$maphuongthuc=$_POST['maphuongthuc'];
		$makhach=$rowkhach['makhach'];		
		$ngaygiao=$_POST['ngaygiao'];
		$sql="insert hoadon(idkhach,idthanhtoan,tennn,diachinn,dienthoainn,emailnn,ngaygiao,ngaymua) values('$makhach','$maphuongthuc','$hotennn','$diachinn','$dienthoainn','$emailnn','$ngaygiao',now())";
		mysql_query($sql) or die(mysql_error());
		$sql="select * from hoadon order by idhoadon desc limit 0,1";
		$kq=mysql_query($sql) or die(mysql_error());
		$rowdonhang=mysql_fetch_array($kq);
		$idhoadon=$rowdonhang['idhoadon'];
		foreach(array_keys($_SESSION['CART']) as $key){
			$soluongmua = $_SESSION['CART'][$key];
			$sql = "select * from sanpham where idsanpham='$key'";
			$kq = mysql_query($sql);
			$rowsanpham=mysql_fetch_array($kq);
			$gialucmua=$rowsanpham['gia'];
			$sql="insert chitiethoadon values('$idhoadon','$key','$soluongmua','$gialucmua')";
			mysql_query($sql);
		}
		unset($_SESSION['CART']);
		echo"<script>alert('Bạn đã thanh toán thành công. Chúng tôi sẽ liên hệ lại ngay cho bạn sớm nhất có thể. Xin cám ơn!'); location='?';</script>";
	}
?>
<div>
<h3 class="text-primary">Thanh Toán</h3>
<form method="post">
	<div class="well well-lg">
  <h4>Thông tin của bạn</h4>
    <table class="table table-striped table-hover ">
		  <thead>
		    <tr class="">
		      <th> # </th>
		      <th> Fullname </th>
		      <th> Home Address </th>
		      <th> Phone number </th>
		      <th> Email </th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>1</td>
		      <td> <?=$rowkhach['hoten']?> </td>
		      <td> <?=$rowkhach['diachi']?> </td>
		      <td> <?=$rowkhach['dienthoai']?> </td>
		      <td> <?=$rowkhach['email']?> </td>
		    </tr>
		    <tr>
		    	<td colspan="5"><a href="?dieuhuong=quanlytaikhoan" class="btn btn-primary">Thay đổi thông tin cá nhân</a></td>
		    </tr>
		  </tbody>
		</table> 
	</div>

	<div class="well well-lg">
  <h4>Thông tin người nhận hàng</h4>
    <table class="table table-striped table-hover ">
		  <thead>
		    <tr class="active">
		      <th> # </th>
		      <th> Họ tên </th>
		      <th> Địa chỉ </th>
		      <th> Điện Thoại </th>
		      <th> Email </th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>1</td>
		      <td> <input required  name="hotennn" type="text" value="<?=$rowkhach['hoten']?>"> </td>
		      <td> <input required  name="diachinn" type="text" value="<?=$rowkhach['diachi']?>"> </td>
		      <td> <input required  name="dienthoainn" type="text" value="<?=$rowkhach['dienthoai']?>"> </td>
		      <td> <input required  name="emailnn" type="email" value="<?=$rowkhach['email']?>"> </td>
		    </tr>
		    <tr>
		    	<td class="text-primary" colspan="2" rowspan="" headers="">PHƯƠNG THỨC THANH TOÁN</td>
		    	<td colspan="1" rowspan="" headers="">
		    		<select name="maphuongthuc" class="form-control">
		        	<option class="form-control" hidden="">Chọn phương thức</option>
		        	<?
	            	$sql="select * from thanhtoan where trangthai=1";
								$kq=mysql_query($sql);
								while($rowphuongthuc=mysql_fetch_array($kq)){
								?>
									<option value="<?=$rowphuongthuc['idthanhtoan']?>"><?=$rowphuongthuc['hinhthuc']?></option>
								<?
								}
								?>
		        </select>
		    	</td>
		    </tr>
		    <tr>
		    	<td class="text-primary" colspan="2" rowspan="" headers="">THỜI GIAN GIAO HÀNG</td>
		    	<td colspan="1" rowspan="" headers=""> <input class="form-control" type="date" name="ngaygiao"> </td>
		    </tr>
		    <tr>
		    	<td colspan="4" rowspan="" headers="">
		    		<input class="btn btn-primary" name="thanhtoan" type="submit" value="Thanh toán">
		    	</td>
		    </tr>
		  </tbody>
		</table> 
	</div>
</form>
</div>

 <!-- remove item from wishlist -->
 <?
 	foreach(array_keys($_SESSION['CART']) as $key) {
 		echo $key;
 		$sql = "delete from wishlist where idsanpham = '$key';";
 		$query = mysql_query($sql);
 	}
 ?>
 			
