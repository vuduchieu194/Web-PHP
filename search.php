
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
  while ($row = mysql_fetch_array($kq)) {
?>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="img/<?=$row['hinhanh']?>" alt="">
                <div class="caption">
                  <h4><?=$row['tensanpham']?></h4>
                  <!-- <p><?=$row['mota']?></p> -->
                  <p><a href="?dieuhuong=chitiet&idsanpham=<?=$row['idsanpham']?>" class="btn btn-primary" role="button"> Details </a> <a href="#" class="btn btn-success" role="button"> Add to Cart </a></p>
                </div>
              </div>
            </div>
    <?
    }
    ?>

</div>