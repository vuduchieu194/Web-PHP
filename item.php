      <?  while ($row = mysql_fetch_array($kq)) {
        ?>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="img/<?=$row['hinhanh']?>" alt="">
                <div class="caption">
                  <h4><?=$row['tensanpham']?></h4>
                  <span><?=number_format($row['gia'],0,',','.')?> VND</span>
                  <p><a href="?dieuhuong=sanpham&idsanpham=<?=$row['idsanpham']?>" class="btn btn-primary" role="button"> Xem chi tiết </a> 
                  <a href="?dieuhuong=cart&hanhdong=addtocart&idsanpham=<?=$row['idsanpham']?>" class="btn btn-success" role="button"> Add to Cart </a></p>
                </div>
              </div>
            </div>
        <?
        } ?>