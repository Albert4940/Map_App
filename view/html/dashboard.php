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
	<link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body id="App">
	<div>
		<?php include('../includes/navbar.php'); ?>
		<?php include('../includes/sidenav.php'); ?>
	</div>
	<div class="main">
		<div id="form_signup">
			<h1 class="title">AJOUTER UNE ADRESSE</h1>
			<?php 
				if(isset($_SESSION['success']) AND $_SESSION['success'] != ''){
					echo'<p>'.$_SESSION['success'].'<p/>';
					$_SESSION['success'] = '';
					$_SESSION['error'] = '';
				}
				if(isset($_SESSION['error']) AND $_SESSION['error'] != ''){
					echo'<p>'.$_SESSION['error'].'<p/>';
					$_SESSION['success'] = '';
					$_SESSION['error'] = '';
				}
				?>
		<form id="signup-form" action="../../controller/address/AddressController.php" method="POST">
			<input type="text" name="address" placeholder="ADRESSE"   />
			<input type="text" name="city" placeholder="VILLE"   />
			<input type="text" name="country" placeholder="PAYS"   />
			<input type="text" name="zip"   placeholder="CODE POSTAL" /><br/>
			<input type="submit" name="ajouter" value="AJOUTER"  />
			<input type="hidden" name="type" value="1"/>
		</form>
		</div>
	</div>
</body>
</html>