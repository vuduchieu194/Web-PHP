
<div class="row text-center">

<?
	$tukhoa=$_POST['tukhoa'];
	$sql="select * from sanpham where trangthai=1 and tensanpham like '%$tukhoa%'";

	$kq=mysql_query($sql);
	if(!mysql_num_rows($kq)){
	?>
		<div class="alert alert-dismissible alert-warning text-center">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <h4>Sorry, no results found!</h4>
		</div>
	<?
	}
    include 'item.php';
    ?>

</div>