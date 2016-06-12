

<?
		//Kết nối tới host:
		$conn=mysql_connect("localhost","root","123456") or die(mysql_error());
		//Kết nối tới DataBase:
		mysql_select_db("dbproject",$conn) or die(mysql_error());
		//Hỗ trợ chữ có dấu:
		mysql_query("SET NAMES'UTF8'",$conn) or die("Sai câu lệnh truy vấn");
?>