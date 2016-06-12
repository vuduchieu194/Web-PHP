<nav class="navbar navbar-default container-fluid">
		  <div class="container-fluid">
		    <div class="navbar-header">

		      <a class="navbar-brand" href="?dieuhuong=home" alt="brand"><img height="30px;" src="https://upload.wikimedia.org/wikipedia/commons/8/8a/Apple_Logo.svg" alt=""></a>
		      <a class="navbar-brand" href="?dieuhuong=home">Apple Aces</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <div class="collapse navbar-collapse" id="navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-left">
		        <?
              $sql = "select * from nhomsanpham where trangthai=1";
              $kq = mysql_query($sql);
              while ($row=mysql_fetch_array($kq)) {
                ?>
                <li>
                  <a href="?dieuhuong=groupdetail&view=nhom&opt=<?=$row['idnhomsanpham']?>" title=""><?=$row['tennhom']?>
                  </a>
                </li>
                <?
              }
            ?>
		      </ul>

          <!-- Tìm sản phẩm theo từ khóa -->
          <div class="nav navbar-center col-md-4">
            <form style="margin-top: 14px;" class="" role="search" action="?dieuhuong=timkiem" method="post">
                <input type="text" class="form-control" placeholder="  Tìm sản phẩm" name="tukhoa">
            </form>            
          </div>



		      <ul class="nav navbar-nav navbar-right">
		      	<? include 'connect.php';
		        	 if (!$_SESSION['taikhoan']) { ?>
								<li><!-- Button to trigger modal -->
									<a href="#member" role="button" class="" data-toggle="modal">Signup/Login</a>
								</li>

							<? 
								} else {
									$taikhoan = $_SESSION['taikhoan'];
									$sql = "select * from khachhang where taikhoan = '$taikhoan' and trangthai=1;";
									$kq = mysql_query($sql);
									$row = mysql_fetch_array($kq);
									$hoten = $row['hoten'];
								
							?>
								<li><a href="?dieuhuong=quanlytaikhoan">Hello <?=$hoten?></a></li>
								<li><a href="?dieuhuong=login&opt=dangxuat">Logout</a></li>
							<? }?>
		        <li><a class='navbar-brand' data-placement='bottom' title="" href='?dieuhuong=cart'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
		        <!-- cart button -->
      </ul>
    </div>
  </div>
</nav>




<!-- Modal -->
<div id="member" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog text-center">
      <div class="modal-content">          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
          </div>

						  <div class="panel panel-success">
							  <div class="panel-heading">
							    <h3 class="panel-title">Mời bạn đăng nhập</h3>
							  </div>
							  <div class="panel-body">
<!--//////////////////////////////////////////////////// form đăng nhập ////////////////////////////////////////////////////-->
<!-- /////////////////-->
									<? include 'login.php'; ?>
							  </div>
							</div>
          <div class="modal-body text-center">
            <a class="btn btn-default" href="?dieuhuong=signup">Đăng ký thành viên</a>
          </div>
          
          <!-- <a class="btn btn-default" href="?dieuhuong=home" onclick="signOut();">Sign out</a> -->
          <!-- <a href="" onclick="getBasicProfile();">Get User Profile</a> -->


        </div>
    </div>
  </div>


<!--//////////////////////////////////////////////////// form đăng nhập ////////////////////////////////////////////////////-->

<form action="post" hidden="hidden" name="addGoogleIdToDB">
	<input type="text" value="">
	
</form>