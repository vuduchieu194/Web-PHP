<?
      $sql1 = "select * from wishlist where idkhach = $idkhach and idsanpham = $idsanpham ";
      // echo $sql1;
      $query1 = mysql_query($sql1);
      $row1 = mysql_fetch_array($query1);
      $numrow1 = mysql_num_rows($query1);

      // if user added item to wishlist
      if ($numrow1) {
        ?>
          <a id="add-to-wishlist" class="btn btn-default">Added to wishlist!</span></a>
        <?
      // if user haven't added item to wishlist
      } else {
    ?>
          <a id="add-to-wishlist" class="btn btn-success" onclick="add_to_wishlist()">Add to wishlist</a>
    <?
      }
    ?>