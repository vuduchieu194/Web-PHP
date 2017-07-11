<?
  $id = $_GET['opt'];
  $trangso = $_GET['trangso'];
  $orderby = isset($_GET['orderby']) ?  $_GET['orderby'] : "";
?>

<div class="row text-center">
<div class="col-md-12 well text-right">
  <h5 class="text-uppercase">Sort products by</h5>
  <a type="text" class="btn btn-default" class="sort-item" href="?dieuhuong=groupdetail&view=<?= $_GET['view'] ?>&opt=<?= $_GET['opt'] ?>&orderby=desc">Price decrease <span class="glyphicon glyphicon-chevron-down"></span></a>
  <a type="text" class="btn btn-default" class="sort-item" href="?dieuhuong=groupdetail&view=<?= $_GET['view'] ?>&opt=<?= $_GET['opt'] ?>&orderby=asc">Price increase <span class="glyphicon glyphicon-chevron-up"></span></a>
</div>
</div>

<?
  if ($_GET['view'] == 'loai') {
    $sql = "select * from sanpham a join loaisanpham b on a.idloai = b.idloaisanpham where a.idloai = '$id' and a.trangthai = 1";
    

    // Sắp xếp sản phẩm theo giá tăng dần
    if ($orderby == "desc") {
      $sql .= " order by gia desc";
    }
    // Sắp xếp sản phẩm theo giá giảm dần
    else if ($orderby == "asc") {
      $sql .= " order by gia asc";
    }

    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $tenloaisanpham = $row['tenloai'];
    ?>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"> Phụ kiện <?= $tenloaisanpham ?></h3>
          </div>
          <div class="panel-body">
    <?
} else if ($_GET['view'] == 'nhom') {
    $sql = "select * from sanpham a join nhomsanpham b on a.idnhom = b.idnhomsanpham where a.idnhom = '$id' and a.trangthai = 1";

    // Sắp xếp sản phẩm theo giá tăng dần
    if ($orderby == "desc") {
      $sql .= " order by gia desc";
    }
    // Sắp xếp sản phẩm theo giá giảm dần
    else if ($orderby == "asc") {
      $sql .= " order by gia asc";
    }

    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $tennhomsanpham = $row['tennhom'];
    ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"> Phụ kiện <?= $tennhomsanpham ?></h3>
          </div>
          <div class="panel-body">
    <?
      }
      $kq = mysql_query($sql);
      $spmoitrang = 6;
      $tongsotrang = ceil(mysql_num_rows($kq)/$spmoitrang);
      if (!$trangso)
        $trangso = 1;
      $from = $spmoitrang * ($trangso - 1);
      $sql .= " limit $from, $spmoitrang;";
      $kq = mysql_query($sql);
        include 'item.php';
        ?>
        <div class="text-center  col-md-12 col-sm-12">
          <?
              for($i=1; $i<=$tongsotrang; $i++) {
            ?>
              <a class="btn btn-primary" href="?dieuhuong=chitietloai&loai=<?=$_GET['loai']?>&trangso=<?=$i?>"><?=$i?></a>
            <?
            }
          ?>
        </div>
    </div>
  </div>
</div>

