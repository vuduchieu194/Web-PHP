
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý hóa đơn</h3>
  </div>
  <div class="panel-body">

  <form method="post">
    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="idhoadon" value="" placeholder="ID Hóa Đơn">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="taikhoannguoimua" value="" placeholder="Tài Khoản Người Mua">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="thongthanhtoan" value="" placeholder="Tổng Thanh Toán">
    </div>

    <div class="form-group col-md-2">
    <label>Ngày Mua</label>
      <input class="form-control" type="date" name="ngaymua" value="" placeholder="Ngày Mua">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="tennguoinhan" value="" placeholder="Người Nhận">
    </div>

    <div class="form-group col-md-2">
    <label>Ngày Giao</label>
      <input class="form-control" type="date" name="ngaymua" value="" placeholder="Ngày Giao">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="emailnguoinhan" value="" placeholder="Email Người Nhận">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="dienthoainguoinhan" value="" placeholder="Điện thoại">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="diachinguoinhan" value="" placeholder="Địa chỉ">
    </div>

    <div class="form-group col-md-2">
      <select name="thanhtoan" class="form-control" id="select">
        <option hidden="" value=""> Phương Thức Thanh Toán </option>
        <option value="1"> Trực tiếp </option>
        <option value="2"> Chuyển khoản </option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <select name="trangthai" class="form-control" id="select">
        <option hidden="" value="0"> Trạng Thái Hóa Đơn </option>
        <option value="0"> Chưa xử lý </option>
        <option value="1"> Đang xử lý </option>
        <option value="2"> Đã xử lý </option>
      </select>
    </div>

  <div class="form-group col-md-2">
      <select name="spmoitrang" class="form-control" id="select">
        <option hidden="" value="50"> Số dòng hiển thị </option>
        <option value="100"> 100 </option>
        <option value="200"> 200 </option>
        <option value="100"> 300 </option>

      </select>
    </div>

    <div class="form-group col-md-10">
      <button type="submit" class="btn btn-default" name="search">Tìm kiếm</button>
    </div>
  </form> 
<!-- ======================== form end ======================== -->


    <div class="row"></div>
    <div class="panel panel-primary">
      <div class="panel-heading">Chi tiết hóa đơn</div>
      <div id="chitiethoadon" class="panel-body">

      </div>
    </div>


  <?
  	include 'connect.php';

		$idhoadon = $_POST['idhoadon'];
    $tennguoinhan = $_POST['tennguoinhan'];
    $taikhoannguoimua = $_POST['taikhoannguoimua'];
    $emailnguoinhan = $_POST['emailnguoinhan'];
    $dienthoainguoinhan = $_POST['dienthoainguoinhan'];
    $diachinguoinhan = $_POST['diachinguoinhan'];
    $ngaymua = $_POST['ngaymua'];
    $ngaygiao = $_POST['ngaygiao'];
    $thanhtoan = $_POST['thanhtoan'];
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 0;

		$trangso = isset($_GET['trangso']) ? $_GET['trangso'] : 1;
		$spmoitrang = isset($_POST['spmoitrang']) ? $_POST['spmoitrang'] : 50;


    $sql = "select a.idhoadon, a.tennn, a.emailnn, a.dienthoainn, a.diachinn, a.ngaygiao, a.ngaymua, a.trangthai, b.taikhoan, c.hinhthuc, a.ghichu from hoadon a left join khachhang b on a.idkhach = b.idkhach left join thanhtoan c on a.idthanhtoan = c.idthanhtoan where 1 ";
    // $sql = "select * from hoadon a join khachhang b on a.idkhach = b.idkhach join thanhtoan c on a.idthanhtoan = c.idthanhtoan where 1 ";

    if ($idhoadon)
    	$sql .= "and idhoadon = '$idhoadon' ";
    if ($tennguoinhan)
    	$sql .= "and tennn like '%$tennguoinhan%' ";
    if ($emailnguoinhan)
      $sql .= "and emailnn like '%$emailnguoinhan%' ";
    if ($dienthoainguoinhan)
      $sql .= "and dienthoainn like '%$dienthoainguoinhan%' ";
    if ($diachinguoinhan)
      $sql .= "and diachinn like '%$diachinguoinhan%' ";
    if ($ngaymua)
      $sql .= "and ngaymua = $ngaymua ";
    if ($ngaygiao)
      $sql .= "and ngaygiao = $ngaygiao ";

    // table khachhang
    if ($taikhoannguoimua)
    	$sql .= "and taikhoan like '%$taikhoannguoimua%' ";

    // table thanhtoan
    if ($thanhtoan)
      $sql .= "and hinhthuc like '%$thanhtoan%' ";

    if ($trangthai == 1)
    	$sql .= "and a.trangthai = 1 ";
    else if($trangthai == 0)
    	$sql .= "and a.trangthai = 0 ";
    else if($trangthai == 2)
      $sql .= "and a.trangthai = 2 ";



		$query = mysql_query($sql);
		$tongsotrang = ceil(mysql_num_rows($query)/$spmoitrang);


		$from = $spmoitrang * ($trangso - 1);
		$sql .= " limit $from, $spmoitrang ";

	 // echo $sql; 
    ?>


<?
 	if (mysql_num_rows($query) == 0)
 	{
 		?>

    <!-- hien thi chi tiet hoa don -->

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
			      <th>ID Hóa Đơn</th>
			      <th>Tài Khoản Người Mua</th>
            <th>Ngày Mua</th>
			      <th>Tên Người Nhận</th>
            <th>Ngày Giao</th>
			      <th>Địa Chỉ NN</th>
			      <th>Email NN</th>
			      <th>Điện Thoại NN</th>
            <th>Hình Thức TT</th>
			      <th>Trạng Thái</th>
            <th>Chi Tiết</th>
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
			      <td><?= $row['idhoadon'] ?></td>
			      <td><?= $row['taikhoan'] ?></td>
            <td><?= $row['ngaymua'] ?></td>
            <td><?= $row['tennn'] ?></td>
            <td><?= $row['ngaygiao'] ?></td>
            <td><?= $row['diachinn'] ?></td>
            <td><?= $row['emailnn'] ?></td>
            <td><?= $row['dienthoainn'] ?></td>
            <td><?= $row['hinhthuc'] ?></td>
            <td>
              <select name="trangthai" class="edit_trangthai_<?= $row['idhoadon'] ?> form-control" id="select">
                <option hidden="" value="<?= $row['trangthai'] ?>">
                <?
                  if($row['trangthai'] == 0) echo "Chưa xử lý";
                  elseif($row['trangthai'] == 1) echo "Đang xử lý";
                  else echo "Đã xử lý";
                ?>
                </option>
                <option value="0"> Chưa xử lý </option>
                <option value="1"> Đang xử lý </option>
                <option value="2"> Đã xử lý </option>
              </select>
            </td>
            <td><button onclick="show_chitiet_hoadon(<?= $row['idhoadon'] ?>)" class="btn btn-primary">
              <span class="glyphicon glyphicon-search"></span>
            </button></td>
			      <td><button onclick="edit_field_hoadon(<?= $row['idhoadon'] ?>);" class="btn btn-warning" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
			      <!-- <td><button onclick="delete_field(<?= $row['idkhach'] ?>);" class="btn btn-danger" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-remove"></span></button></td> -->
			    </tr>
          <tr>
            <td colspan="1" rowspan="" headers="">Ghi Chú: </td>
            <td colspan="12" rowspan="" headers=""> <textarea rows="1" cols="200" name="edit_ghichu_<?= $row['idhoadon'] ?>" placeholder="<?= $row['ghichu'] ?>"></textarea> </td>
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
