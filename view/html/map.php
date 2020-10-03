<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		# code...
		header('Location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/map.css">
</head>
<body id="App">
	<div>
		<?php include('../includes/navbar.php'); ?>
		<?php include('../includes/sidenav.php'); ?>
	</div>
	<div class="main">
		<div id="map">

			<iframe width="100%" height="540" src="https://maps.google.com/maps?q=haiti;<??>&output=embed"></iframe>
		</div>
	</div>
</body>
</html>