
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-slide-to="0" class=""></li>
        <li data-slide-to="1" class="active"></li>
        <li data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item">
          <img class="first-slide" src="img/qc_iphone.jpg" alt="First slide" >
          <div class="container">
            <div class="carousel-caption">
              <h1 style="margin-bottom: 100px;">For the iPhone that has everything</h1>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
            </div>
          </div>
        </div>
        <div class="item active">
          <img class="second-slide" src="img/qc_ipad.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="margin-bottom: 100px;">Take your iPad even further</h1>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p> -->
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img/qc_watch.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="margin-bottom: 100px;">Switch up your look</h1>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p> -->
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="https://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="https://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->





<div class="row margin-top-bottom" style="margin-left: 5px;">
                      <div class="col-md-4">
                          <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#phukien" aria-controls="phukien" role="tab" data-toggle="tab">Tìm theo phụ kiện</a></li>
                          <li role="presentation"><a href="#sanpham" aria-controls="sanpham" role="tab" data-toggle="tab">Tìm theo sản phẩm</a></li>
                        </ul>
                      </div>

                      <!-- <div class="margin_top_bottom text-center">
                        <form class="" role="search" action="?dieuhuong=timkiem">
                          <div class="form-group col-md-7 col-xs-8">
                            <input type="text" class="form-control" placeholder="  Tìm sản phẩm" name="tukhoa">
                          </div>
                          <button style="display:;" type="submit" class="btn btn-default" value="Tìm">Search</button>
                        </form>
                      </div> -->

                      <div class="col-md-12 text-right row">
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel fade-in active" class="tab-pane active" id="phukien">
                            <!-- chinh sua slide loai san pham -->
                            <?
                              $sql = "select * from loaisanpham where trangthai=1";
                              $kq = mysql_query($sql);
                              while ($row=mysql_fetch_array($kq)) {
                                ?>
                                <a href="?dieuhuong=groupdetail&view=loai&opt=<?=$row['idloaisanpham']?>" title="">
                                  <div class="col-md-4 col-xs-12 text-center btn btn-default">
                                    <img src="img/<?=$row['tenloai']?>">
                                    <p><?=$row['tenloai']?></p>
                                  </div>
                                </a>
                                <?
                              }
                            ?>
                          </div>
                          <div role="tabpanel fade" class="tab-pane" id="sanpham">
                              <!-- chinh sua slide nhom san pham -->
                              <?
                                $sql = "select * from nhomsanpham where trangthai=1";
                                $kq = mysql_query($sql);
                                while ($row=mysql_fetch_array($kq)) {
                                  ?>
                                  <a href="?dieuhuong=groupdetail&view=nhom&opt=<?=$row['idnhomsanpham']?>" title="">
                                    <div class="col-md-3 col-xs-12 text-center btn btn-default">
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

</div>





<div class="panel col-md-12 text-center margin_top_bottom">
  <div class="panel-heading col-md-2">
    <a class="btn btn-warning" href="?dieuhuong=xemthem&add=new"><h3 class="panel-title">Sản phẩm mới</h3></a>
  </div>
  <div class="panel-body col-md-12">
    <div class="row">
    <?
      // gọi ra các sản phẩm được nhập trong vòng 30 ngày
      $sql = "select * from sanpham where datediff(CURDATE(),ngaynhap) < 30 and trangthai=1;";
      $kq = mysql_query($sql);
      $numrow = mysql_num_rows($kq);
      if ($numrow == 0)
      {
        ?>
          <h4 class="text-warning">Website đang được cập nhật!!!!</h4>
        <?
      }
      // Hiển thị tối đa 6 sản phẩm
      for ($i=0; $i < 6; $i++) {
        include 'item.php';
      }
    ?>
    </div>
  </div>
</div>

<div class="panel col-md-12 text-center margin_top_bottom">
  <div class="panel-heading col-md-2">
    <a class="btn btn-warning" href="?dieuhuong=xemthem&add=lowstock"><h3 class="panel-title">Sản phẩm bán chạy</h3></a>
  </div>
    <div class="panel-body col-md-12">
      <div class="row">
      <?
        // gọi ra các sản phẩm được nhập trong vòng 30 ngày
        $sql = "select * from sanpham where soluong < 5 and trangthai=1;";
        $kq = mysql_query($sql);
        $numrow = mysql_num_rows($kq);
       if ($numrow == 0)
            {
              ?>
                <h4 class="text-warning">Website đang được cập nhật!!!!</h4>
              <?
            }
        // Hiển thị tối đa 6 sản phẩm
        for ($i=0; $i < 6; $i++) {
         include 'item.php';
        }
      ?>
      </div>
    </div>
</div>


