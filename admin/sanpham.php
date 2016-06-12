




<?php
include 'connect.php';
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      // $file_name = iconv("utf-8", "cp1258", $filename);
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      // if(in_array($file_ext,$expensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
      
      // if($file_size > 10485760){
      //    $errors[]='File size must be excately 10 MB';
      // }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../img/".$file_name);
      }else{
         print_r($errors);
      }
   }
?>


<!-- Them san pham vao database -->

<div class="row">
</div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Nhập thêm sản phẩm </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover ">
        <thead class="text-primary">
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Nhóm</th>
            <th>Loại</th>
            <th>Mô Tả</th>
            <th>Trạng Thái</th>
            <th>Hình Ảnh</th>
            <th>Upload Ảnh</th>
            <th>ADD</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input required type="text" class="insert_tensanpham form-control" value="" placeholder="Tên Sản Phẩm"></td>
            <td><input required type="number" class="insert_soluong form-control" value="" placeholder="Số Lượng"></td>
            <td><input required type="number" class="insert_gia form-control" value="" placeholder="Giá"></td>
            <td>
              <select required class="insert_nhom form-control">
                <option hidden="" value="1"> iPhone </option>
                <!-- <option value="1"> iPhone </option> -->
                <option value="2"> iPad </option>
                <option value="3"> Macbook </option>
                <option value="4"> Watch </option>
              </select>
            </td>
            <td>
              <select required class="insert_loai form-control">
                <option hidden="" value="1"> Ốp Bảo Vệ </option>
                <!-- <option value="1"> Ốp Bảo Vệ </option> -->
                <option value="2"> Cáp Kết Nối </option>
                <option value="3"> Đồ Chơi </option>
              </select>
            </td>
            <td>
              <input required type="text" class="form-control insert_mota" placeholder="Mô tả sản phẩm"></input>
            </td>
            <td>
              <select required class="insert_trangtdai form-control">
                <option hidden="" value="0"> Ẩn </option>
                <!-- <option value="1"> Kích hoạt </option> -->
                <option value="1"> Kích hoạt </option>
              </select>
            </td>
            <td><input type="text" class="insert_hinhanh form-control" value="" placeholder="Tên Ảnh Sản Phẩm"></td>
            <td>
              <form action="" method="POST" enctype="multipart/form-data">
                <input class="btn" type="file" name="image" />
            </td>
            <td>
                <button onclick="insert_sanpham();" class="btn btn-success" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
              </form>
            </td>
          </tr>
          <tr>
            <td colspan="11" rowspan="" headers=""><p class="text-danger">Lưu ý: Nhập tên ảnh đặt trùng tên ảnh upload!</p></td>
          </tr>
        </tbody>
      </table>
    </div>
   
      

  </div>













<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý sản phẩm</h3>
  </div>
  <div class="panel-body">

  <form method="post">
    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="idsanpham" value="" placeholder="ID Sản Phẩm">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="tensanpham" value="" placeholder="Tên Sản Phẩm">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="soluong" value="" placeholder="Số Lượng">
    </div>

    <div class="form-group col-md-2">
      <input class="form-control" type="text" name="gia" value="" placeholder="Giá">
    </div>

   
    <div class="form-group col-md-2">
      <select name="nhom" class="form-control">
        <option hidden="" value=""> Nhóm </option>
        <option value="1"> iPhone </option>
        <option value="2"> iPad </option>
        <option value="3"> Macbook </option>
        <option value="4"> Watch </option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <select name="loai" class="form-control">
        <option hidden="" value=""> Loại </option>
        <option value="1"> Ốp Bảo Vệ </option>
        <option value="2"> Cáp Kết Nối </option>
        <option value="3"> Đồ Chơi </option>
      </select>
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

    <div class="form-group col-md-4">
      <textarea class="form-control" name="mota" row="3" col="5" placeholder="Mô tả sản phẩm"></textarea>
    </div>

    <div class="form-group col-md-10">
      <button type="submit" class="btn btn-default" name="search">Tìm kiếm</button>
    </div>
 
  </form>

  <?
    
    
    $idsanpham = isset($_POST['idsanpham']) ? $_POST['idsanpham'] : '';
    $tensanpham = isset($_POST['tensanpham']) ? $_POST['tensanpham'] : '';
    $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
    $gia = isset($_POST['gia']) ? $_POST['gia'] : '';
    $nhom = isset($_POST['nhom']) ? $_POST['nhom'] : '';
    $loai = isset($_POST['loai']) ? $_POST['loai'] : '';
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : 1;

    $trangso = isset($_GET['trangso']) ? $_GET['trangso'] : 1;
    $spmoitrang = isset($_POST['spmoitrang']) ? $_POST['spmoitrang'] : 50;


    $sql = "select * from sanpham where 1 ";

    if ($idsanpham)
      $sql .= "and idsanpham = '$idsanpham' ";
    if ($tensanpham)
      $sql .= "and tensanpham like '%$tensanpham%' ";
    if ($soluong)
      $sql .= "and soluong like '%$soluong%' ";
    if ($gia)
      $sql .= "and gia like '%$gia%' ";
    if ($nhom)
      $sql .= "and idnhom like '%$nhom%' ";
    if ($loai)
      $sql .= "and idloai like '%$loai%' ";
    if ($mota)
      $sql .= "and mota like '%$mota%' ";
    if ($trangthai == 1)
      $sql .= "and trangthai = '1' ";
    else if($trangthai == 0)
      $sql .= "and trangthai = '0' ";


    // echo $sql;
    $query = mysql_query($sql);
    $tongsotrang = ceil(mysql_num_rows($query)/$spmoitrang);

    
    $from = $spmoitrang * ($trangso - 1);
    $sql .= " limit '$from', '$spmoitrang' ";

    // echo $sql;
    /*$idsanpham = $_POST['idsanpham'];
    $tensanpham = $_POST['tensanpham'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['gia'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    if  (isset($_POST['trangthai'])){
      $trangthai = $_POST['trangthai'];
    }
    
    $sql = "select * from khachhang where 1 ";

    if ($idsanpham)
      $sql .= "and idsanpham = '$idsanpham' ";
    if ($tensanpham)
      $sql .= "and tensanpham = '$tensanpham' ";
    if ($soluong)
      $sql .= "and soluong = '$soluong' ";
    if ($gia)
      $sql .= "and gia = '$gia' ";
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
?>

<?
  if (mysql_num_rows($query) == 0)
  {
    ?>
    <div class="form-group col-md-12 text-center">
    <h5 class='text-success'>Không có kết quả phù hợp!</h5>
      </div>
    <?
  }else{
    $numrow = 0;
    ?>
      <table class="table table-striped table-hover ">
        <thead class="text-primary">
          <tr>
            <th>#</th>
            <th>ID Sản Phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Nhóm</th>
            <th>Loại</th>
            <th>Mô Tả</th>
            <th>Trạng Thái</th>
            <th>Tên Hình Ảnh</th>
            <th>Sửa</th>
<!--            <th>Xóa</th> -->
          </tr>
        </thead>
        <tbody>
         <!--  <tr>
            <th>THÊM SP</th>
            <th>ID Sản Phẩm</th>
            <th><input type="text" class="insert_ten" value="" placeholder="Tên Sản Phẩm"></th>
            <th><input type="number" class="insert_soluong" value="" placeholder="Số Lượng"></th>
            <th><input type="number" class="insert_ten" value="" placeholder="Giá"></th>
            <th>
              <select class="insert_nhom form-control">
                <option hidden="" value=""> Nhóm </option>
                <option value="1"> iPhone </option>
                <option value="2"> iPad </option>
                <option value="3"> Macbook </option>
                <option value="4"> Watch </option>
              </select>
            </th>
            <th>
              <select class="insert_loai form-control">
                <option hidden="" value=""> Loại </option>
                <option value="1"> Ốp Bảo Vệ </option>
                <option value="2"> Cáp Kết Nối </option>
                <option value="3"> Đồ Chơi </option>
              </select>
            </th>
            <th>
              <textarea class="form-control insert_mota" rows="3" cols="50" placeholder="Mô tả sản phẩm"></textarea>
            </th>
            <th>
              <select class="insert_trangthai form-control">
                <option hidden="" value="1"> Trạng Thái </option>
                <option value="1"> Kích hoạt </option>
                <option value="0"> Ẩn </option>
              </select>
            </th>
            <td><button onclick="insert_sanpham();" class="btn btn-warning" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
          </tr> -->
    <?
    while($row = mysql_fetch_array($query)) {
      $numrow += 1;

      ?>
      <!-- <form method="post" name="edit_form"> -->
        <tr>
            <td><?= $numrow ?></td>
            <td><?= $row['idsanpham'] ?></td>
            <td><?= $row['tensanpham'] ?></td>
            <td><?= $row['soluong'] ?></td>
            <td><input class="edit_gia_<?= $row['idsanpham'] ?> form-control" type="text" name="gia" value="<?= $row['gia'] ?>" ></td>

            <td>
              <select class="edit_nhom_<?= $row['idsanpham'] ?> form-control">
                <option hidden="" value="<?= $row['idnhom'] ?>"> <?= $row['idnhom'] ?> </option>
                <option value="1"> iPhone </option>
                <option value="2"> iPad </option>
                <option value="3"> Macbook </option>
                <option value="4"> Watch </option>
              </select>
            </td>

            <td>
              <select class="edit_loai_<?= $row['idsanpham'] ?> form-control">
                <option hidden="" value="<?= $row['idloai'] ?>"> <?= $row['idloai'] ?> </option>
                <option value="1"> Ốp Bảo Vệ </option>
                <option value="2"> Cáp Kết Nối </option>
                <option value="3"> Đồ Chơi </option>
              </select>
            </td>

           <td><input type="text" class="form-control edit_mota_<?= $row['idsanpham'] ?>" value="<?= $row['mota'] ?>"></input></td>

            <td>
              <select class="edit_trangthai_<?= $row['idsanpham']?> form-control" id="select">
                <option hidden="" value="<?= $row['trangthai'] ?>"><?= $row['trangthai'] ?></option>
                <option value="1"> Kích hoạt </option>
                <option value="0"> Ẩn </option>
              </select>
            </td>

            <td><input type="text" class="form-control edit_hinhanh_<?= $row['idsanpham'] ?>" value="<?= $row['hinhanh'] ?>"></input></td>

            <td><button onclick="edit_field_sanpham(<?= $row['idsanpham'] ?>);" class="btn btn-warning" name="submit_edit_form" value="<?= $numrow ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
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



