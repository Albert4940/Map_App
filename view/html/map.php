<?php
	//session_start();
require_once("../../controller/address/AddressController.php");
	if(isset($_SESSION['address'])){
		$ad = $_SESSION['address'];
		//echo $ad['id'];
	}
	if(isset($_GET['q2'])){
		//$ad['country'] = $_GET['q4'];
		 $add = new Address([
      'address' => $_GET['q2'],
      'city' => $_GET['q3'],
      'country' => $_GET['q4'],
      'zip_code' => $_GET['q5']
    ]);
	$ad = get($add);
	}
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
		<!-- <h1 style="text-align: center;"><?php var_dump($add);?></h1> -->
		<div id="map">
			<iframe width="100%" height="540" src="https://maps.google.com/maps?q=<?=$ad['country'];?>;<?=$ad['city'];?>;<?=$ad['address'];?>&output=embed"></iframe>
			<?php $_SESSION['address'] = '';?>
		</div>
	</div>
</body>
</html>