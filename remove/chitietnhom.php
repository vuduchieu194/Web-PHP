
<div class="row text-center">

<?
  $idnhomsanpham = $_GET['nhom'];
  $trangso = $_GET['trangso'];

  $sql = "select * from sanpham where idnhom = $idnhomsanpham and trangthai = 1";
  $kq = mysql_query($sql);
  $spmoitrang = 6;
  $tongsotrang = ceil(mysql_num_rows($kq)/$spmoitrang);

  if (!$trangso)
    $trangso = 1;
  $from = $spmoitrang * ($trangso - 1);
  $sql .= " limit $from, $spmoitrang;";
  $kq = mysql_query($sql);

  while ($row = mysql_fetch_array($kq)) {
    include 'item.php';
    }
    ?>
    <div class="text-center col-md-12 col-sm-12">
      <?
          for($i=1; $i<=$tongsotrang; $i++){
        ?>
          <a class="btn btn-primary" href="?dieuhuong=chitietnhom&nhom=<?=$_GET['nhom']?>&trangso=<?=$i?>"><?=$i?></a>
        <?
        }
      ?>
    </div>

</div>



