<div class="">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tìm theo phụ kiện</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tìm theo sản phẩm</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel fade in active" class="tab-pane active" id="home">
      <!-- chinh sua slide loai san pham -->
      <?
        $sql = "select * from loaisanpham where trangthai=1";
        $kq = mysql_query($sql);
        while ($row=mysql_fetch_array($kq)) {
          ?>
          <a href="?dieuhuong=<?=$row['tenloai']?>" title="">
            <div class="col-md-4 text-center btn btn-default">
              <img src="img/<?=$row['tenloai']?>">
              <p><?=$row['tenloai']?></p>
            </div>
          </a>
          <?
        }
      ?>

    </div>

    <div role="tabpanel fade" class="tab-pane" id="profile">
        <!-- chinh sua slide nhom san pham -->
        <?
          $sql = "select * from nhomsanpham where trangthai=1";
          $kq = mysql_query($sql);
          while ($row=mysql_fetch_array($kq)) {
            ?>
            <a href="?dieuhuong=<?=$row['tennhom']?>" title="">
              <div class="col-md-3 text-center btn btn-default">
               <img src="img/<?=$row['tennhom']?>">
               <p><?=$row['tennhom']?></p>
              </div>
            </a>
            <?
          }
        ?>

    </div>

  </div>
</div>




