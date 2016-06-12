
<div class="row text-center">

<?
  $idloaisanpham = $_GET['loai'];
  $trangso = $_GET['trangso'];

  $sql = "select * from sanpham where idloai = $idloaisanpham and trangthai = 1";
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
          for($i=1; $i<=$tongsotrang; $i++){
        ?>
          <a class="btn btn-primary" href="?dieuhuong=chitietloai&loai=<?=$_GET['loai']?>&trangso=<?=$i?>"><?=$i?></a>
        <?
        }
      ?>
    </div>
</div>



