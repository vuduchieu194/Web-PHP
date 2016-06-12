<?
	$add=$_GET['add'];
	if ($_GET['add'] == 'new') { ?>
		<div class="panel col-md-12 text-center margin_top_bottom">
	  <div class="panel-heading col-md-2">
	    <a class="btn btn-warning" href="?dieuhuong=xemthem&add=new"><h3 class="panel-title">New Product</h3></a>
	  </div>
	  <div class="panel-body col-md-12">
	    <div class="row">
	    <?
	      // gọi ra các sản phẩm được nhập trong vòng 30 ngày
	      $sql = "select * from sanpham where datediff(CURDATE(),ngaynhap) < 30;";
	      $kq = mysql_query($sql);

        while ($row = mysql_fetch_array($kq)) {
        ?>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="img/<?=$row['tensanpham']?>" alt="">
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
	  </div>
	<?
	} else if ($_GET['add'] == 'lowstock') { ?>
		<div class="panel col-md-12 text-center margin_top_bottom">
	  <div class="panel-heading col-md-2">
	    <a class="btn btn-warning" href="?dieuhuong=xemthem&add=lowstock"><h3 class="panel-title">Best-selling</h3></a>
	  </div>
	    <div class="panel-body col-md-12">
	      <div class="row">
	      <?
	        // gọi ra các sản phẩm được nhập trong vòng 30 ngày
	        $sql = "select * from sanpham where soluong < 5;";
	        $kq = mysql_query($sql);

	          while ($row = mysql_fetch_array($kq)) {
	          ?>

	              <div class="col-sm-6 col-md-4">
	                <div class="thumbnail">
	                  <img src="img/<?=$row['tensanpham']?>" alt="">
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
	    </div>
<?
	}
?>