<? session_start(); ?>
<? include 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN</title>



	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/material.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/custom.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://apis.google.com/js/platform.js"></script>
	

	<!-- chart -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

</head>
    <div class="wrapper">
  	  <div class="container-fluid">


	 	<?
		if(!$_SESSION['useradmin']){
			include"loginadmin.php";
		}else{

			?><div class="container">
				<? include 'header.php'; ?>
			</div>
			<?
			include"navi.php";
		}
		?>

		</div>
	</div>
</body>
</html>