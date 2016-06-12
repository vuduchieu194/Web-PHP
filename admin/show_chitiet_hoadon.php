<?

	include 'connect.php';
	$idhoadon = $_POST['id'];
	// echo "idhoadon: " . $idhoadon;
	$sql = "select a.idhoadon, b.tensanpham, a.soluong, a.gia from chitiethoadon a left join sanpham b on a.idsanpham = b.idsanpham left join hoadon c on a.idhoadon = c.idhoadon where a.idhoadon = $idhoadon ";
	$query = mysql_query($sql);
	// $numrow = mysql_num_rows($query);
	// echo $sql;
	$tongtien = 0;
	?>
		<table class="table table-striped table-hover ">
			<thead class="text-primary">
				<tr>
					<th>ID Hóa Đơn</th>
					<th>Tên Sản Phẩm</th>
					<th>Số lượng</th>
					<th>Đơn Giá</th>
					<th>Thành Tiền</th>
				</tr>
			</thead>
			<tbody>
				
	<?
	while ($row = mysql_fetch_array($query)) {
		?>
				<tr>
					<td><?= $row['idhoadon'] ?></td>
					<td><?= $row['tensanpham'] ?></td>
					<td><?= $row['soluong'] ?></td>
					<td><?= $row['gia'] ?> VND</td>
					<td><? $tong = ($row['soluong'] * $row['gia']);
									echo $tong . " VND";
									$tongtien += $tong;
							 ?></td>
				</tr>
		<?
	}
?>
				<tr>
					<td colspan="4" class="text-right text-info text-uppercase">Tổng Giá Trị Đơn Hàng</td>
					<td colspan="1" class="text-danger"><?= $tongtien ?> VND</td>
				</tr>
				
			</tbody>
		</table>