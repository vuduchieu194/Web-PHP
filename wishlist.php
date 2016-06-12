<?
	include "connect.php";
	
	$idkhach = $_POST['idkhach'];
	$idsanpham = $_POST['idsanpham'];

	$sql = "select * from wishlist where idkhach = '$idkhach' and idsanpham = '$idsanpham';";	
	
	$query = mysql_query($sql);
	$numrow = mysql_num_rows($query);

	if ($numrow == 0) {
		$sql = "insert into wishlist (idkhach, idsanpham) values ('$idkhach', '$idsanpham');";
		$query = mysql_query($sql);
		echo $query;
	} else {
		echo "no record";
	}
	
?>