<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý khách hàng</h3>
  </div>
  <div class="panel-body">

  <form method="post">
    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="idkhach" value="" placeholder="ID">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="hoten" value="" placeholder="Họ Tên">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="taikhoan" value="" placeholder="Tài Khoản">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="email" value="" placeholder="Email">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="dienthoai" value="" placeholder="Điện thoại">
    </div>
    
    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="diachi" value="" placeholder="Địa chỉ">
    </div>

    <div class="form-group col-md-2">
      <select name="trangthai" class="form-control" id="select">
        <option hidden="" value="1"> Trạng Thái </option>
        <option value="1"> Kích hoạt </option>
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
  	include 'connect.php';
	  
		$idkhach = $_POST['idkhach'];
    $hoten = $_POST['hoten'];
    $taikhoan = $_POST['taikhoan'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 1;

		$trangso = isset($_GET['trangso']) ? $_GET['trangso'] : 1;
		$spmoitrang = isset($_POST['spmoitrang']) ? $_POST['spmoitrang'] : 50;


    $sql = "select * from khachhang where 1 ";

    if ($idkhach)
    	$sql .= "and idkhach = '$idkhach' ";
    if ($hoten)
    	$sql .= "and hoten like '%$hoten%' ";
    if ($taikhoan)
    	$sql .= "and taikhoan like '%$taikhoan%' ";
    if ($email)
    	$sql .= "and email like '%$email%' ";
    if ($dienthoai)
    	$sql .= "and dienthoai like '%$dienthoai%' ";
    if ($diachi)
    	$sql .= "and diachi like '%$diachi%' ";
    if ($trangthai == 1)
    	$sql .= "and trangthai = '1' ";
    else if($trangthai == 0)
    	$sql .= "and trangthai = '0' ";



		$query = mysql_query($sql);
		$tongsotrang = ceil(mysql_num_rows($query)/$spmoitrang);

		
		$from = $spmoitrang * ($trangso - 1);
		$sql .= " limit '$from', '$spmoitrang' ";

		// echo $sql;
    /*$idkhach = $_POST['idkhach'];
    $hoten = $_POST['hoten'];
    $taikhoan = $_POST['taikhoan'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    if  (isset($_POST['trangthai'])){
    	$trangthai = $_POST['trangthai'];
    }
    
    $sql = "select * from khachhang where 1 ";

    if ($idkhach)
    	$sql .= "and idkhach = '$idkhach' ";
    if ($hoten)
    	$sql .= "and hoten = '$hoten' ";
    if ($taikhoan)
    	$sql .= "and taikhoan = '$taikhoan' ";
    if ($email)
    	$sql .= "and email = '$email' ";
    if ($dienthoai)
    	$sql .= "and dienthoai = '$dienthoai' ";
    if ($diachi)
    	$sql .= "and diachi = '$diachi' ";
    if (isset($trangthai)){
    	$sql .= "and trangthai = '$trangthai' ";
    }else{
    	echo "loi te le";
    }*/

    // $query = mysql_query($sql);


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
			      <th>ID Khách</th>
			      <th>Tài Khoản</th>
			      <th>Họ Tên</th>
			      <th>Địa Chỉ</th>
			      <th>Email</th>
			      <th>Điện Thoại</th>
			      <th>Trạng Thái</th>
			      <th>Sửa</th>
<!-- 			      <th>Xóa</th> -->
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
			      <td><?= $row['idkhach'] ?></td>
			      <td><?= $row['taikhoan'] ?></td>
			      <td><input class="edit_hoten_<?= $row['idkhach'] ?> form-control" type="text" name="hoten" value="<?= $row['hoten'] ?>" ></td>
			      <td><input class="edit_diachi_<?= $row['idkhach'] ?> form-control" type="text" name="diachi" value="<?= $row['diachi'] ?>" ></td>
			      <td><input class="edit_email_<?= $row['idkhach'] ?> form-control" type="text" name="email" value="<?= $row['email'] ?>" ></td>
			      <td><input class="edit_dienthoai_<?= $row['idkhach'] ?> form-control" type="text" name="dienthoai" value="<?= $row['dienthoai'] ?>" ></td>
			      <td>
      	      <select name="trangthai" class="edit_trangthai_<?= $row['idkhach'] ?> form-control" id="select">
				        <option hidden="" value="<?= $row['trangthai'] ?>"><?= $row['trangthai'] ?></option>
				        <option value="1"> Kích hoạt </option>
				        <option value="0"> Ẩn </option>
				      </select>
			      </td>

			      <td><button onclick="edit_field(<?= $row['idkhach'] ?>);" class="btn btn-warning" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
			      <!-- <td><button onclick="delete_field(<?= $row['idkhach'] ?>);" class="btn btn-danger" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-remove"></span></button></td> -->
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