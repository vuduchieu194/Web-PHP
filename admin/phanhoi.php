
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý phản hồi</h3>
  </div>
  <div class="panel-body">

  <form method="post">

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="sanpham" value="" placeholder="Tên Sản Phẩm">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="khachhang" value="" placeholder="Tên Khách Hàng">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="tieude" value="" placeholder="Tiêu Đề">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="noidung" value="" placeholder="Nội Dung">
    </div>

    <div class="form-group col-md-2">
      <label>Ngày Nhập Từ</label>
      <input class="form-control" type="date" name="thoigiansau" value="" placeholder="Ngày Nhập Từ">
    </div>

    <div class="form-group col-md-2">
      <label>Ngày Nhập Đén</label>
      <input class="form-control" type="date" name="thoigiantruoc" value="" placeholder="Ngày Nhập Đén">
    </div>

    <div class="form-group col-md-2">
      <select name="thoigian" class="form-control" id="select">
        <option hidden="" value="1"> Mới nhất trước </option>
        <option value="0"> Cũ nhất trước </option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <select name="trangthai" class="form-control" id="select">
        <option hidden="" value=""> Trạng Thái </option>
        <option value="1"> Hiện </option>
        <option value="0"> Ẩn </option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <select name="spmoitrang" class="form-control" id="select">
        <option hidden="" value="50"> Só dòng hiển thị </option>
        <option value="100"> 100 </option>
        <option value="200"> 200 </option>
        <option value="100"> 300 </option>
      </select>
    </div>

    <div class="form-group col-md-10">
      <button type="submit" class="btn btn-default" name="search">Tìm kiếm</button>
    </div>
 
  </form>

  <?
    
    $sanpham = isset($_POST['sanpham']) ? $_POST['sanpham'] : '';
    $khachhang = isset($_POST['khachhang']) ? $_POST['khachhang'] : '';
    $tieude = isset($_POST['tieude']) ? $_POST['tieude'] : '';
    $noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
    $thoigiansau = isset($_POST['thoigiansau']) ? $_POST['thoigiansau'] : '';
    $thoigiantruoc = isset($_POST['thoigiantruoc']) ? $_POST['thoigiantruoc'] : '';
    $thoigian = isset($_POST['thoigian']) ? $_POST['thoigian'] : 1;

    $trangso = isset($_GET['trangso']) ? $_GET['trangso'] : 1;
    $spmoitrang = isset($_POST['spmoitrang']) ? $_POST['spmoitrang'] : 50;


    $sql = "select a.noidung, a.tieude, a.trangthai, b.hoten, c.tensanpham, c.idsanpham from phanhoi a left join khachhang b on a.idkhach = b.idkhach left join sanpham c on a.idsanpham = c.idsanpham where 1 ";

    if ($sanpham)
      $sql .= "and c.tensanpham like '%$sanpham%' ";
    if ($khachhang)
      $sql .= "and b.hoten like '%$khachhang%' ";
    if ($noidung)
      $sql .= "and a.noidung like '%$noidung%' ";
    if ($tieude)
      $sql .= "and a.tieude like '%$tieude%' ";
   	if ($thoigiansau and $thoigiantruoc)
   		$sql .= "and a.ngaynhap between '$thoigiansau' and '$thoigiantruoc' ";

    if ($trangthai == 1)
      $sql .= "and a.trangthai = 1 ";
    else if($trangthai == 0)
      $sql .= "and a.trangthai = 0 ";


    $query = mysql_query($sql);
    $tongsotrang = ceil(mysql_num_rows($query)/$spmoitrang);

    
    $from = $spmoitrang * ($trangso - 1);
    $sql .= " limit '$from', '$spmoitrang' ";

   if ($thoigian == 1)
     	$sql .= "order by day(a.ngayphanhoi) desc ";
   else
     	$sql .= "order by day(a.ngayphanhoi) asc ";


// echo " ---" . $sql . " ----";

  if (mysql_num_rows($query) == 0)
  {
    ?>
    <div class="form-group col-md-12 text-center">
    <h5 class='text-primary'>Không có kết quả phù hợp!</h5>
      </div>
    <?
  }else{
    $numrow = 0;
    ?>
      <table class="table table-striped table-hover ">
        <thead class="text-primary">
          <tr>
            <th>#</th>
            <th>Tên Sản Phẩm</th>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Người Đăng</th>
            <th>Thời Gian</th>
            <th>Trả Lời</th>
            <th>Trạng Thái</th>
            <th>Sửa</th>

          </tr>
        </thead>
        <tbody>
    <?
    while($row = mysql_fetch_array($query)) {
      $numrow += 1;
      ?>
      <!-- <form method="post" name="edit_form"> -->
        <tr>
            <td><?= $numrow ?></td>
            <td><?= $row['tensanpham'] ?></td>
            <td><?= $row['tieude'] ?></td>
            <td><?= $row['noidung'] ?></td>
            <td><?= $row['hoten'] ?></td>
            <td><?= $row['ngayphanhoi'] ?></td>
            <td><input type="text" class="form-control edit_traloi_<?= $row['idphanhoi'] ?>" value="<?= $row['traloi'] ?>"></input></td>

            <td>
              <select class="edit_trangthai_<?= $row['idsanpham']?> form-control">
                <option hidden="" value="<?= $row['trangthai'] ?>"> 
                <? 
                  if($row['trangthai'] == 0) echo "Ẩn";
                  elseif($row['trangthai'] == 1) echo "Hiện";
                ?> 
                </option>
                <option value="1"> Kích hoạt </option>
                <option value="0"> Ẩn </option>
              </select>
            </td>

            <td><button onclick="response_feedback(<?= $row['idphanhoi'] ?>);" class="btn btn-warning" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
          </tr>
      <!-- </form> -->
      <?
      } 
      // echo "numrow: " . $numrow;
    ?>
        </tbody>
      </table> 
  <?
    
  } 
  ?>
  </div>
</div>

        <div class="text-center  col-md-12 col-sm-12">
          <?
              for($i=1; $i<=$tongsotrang; $i++) {
            ?>
              <a class="btn btn-primary" href="?dieuhuong=khachhang&trangso=<?=$i?>"><?=$i?></a>
            <?
            }
          ?>
        </div>
    </div>
  </div>
</div>



