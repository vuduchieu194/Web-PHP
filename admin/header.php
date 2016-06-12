


    <?
    if(!$_SESSION['useradmin']){
      echo"<script> location='index.php'; </script>";
    } else {
      // <!-- echo "adsf"; -->
    }
    ?>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?location=main"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>


      <ul class="nav navbar-nav">
        
        <li><a href="?location=sanpham">SẢN PHẨM</a></li>
        <li><a href="?location=khachhang">KHÁCH HÀNG</a></li>
        <li><a href="?location=hoadon">HÓA ĐƠN</a></li>
        <li><a href="?location=phanhoi">PHẢN HỒI SẢN PHẨM</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?dieuhuong=navi&location=logout">Đăng Xuất</a></li>
    
      </ul>

  </div>
</nav>