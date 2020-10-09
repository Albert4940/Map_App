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
					echo'<p class="message success">'.$_SESSION['success'].'<p/>';
					$_SESSION['success'] = '';
					$_SESSION['error'] = '';
				}
				if(isset($_SESSION['error']) AND $_SESSION['error'] != ''){
					echo'<p class="message danger">'.$_SESSION['error'].'<p/>';
					$_SESSION['success'] = '';
					$_SESSION['error'] = '';
				}
				?>
		<form id="signup-form" action="../../controller/address/AddressController.php" method="POST">
			<input type="text" name="address" placeholder="ADRESSE"   />
			<input type="text" name="city" placeholder="VILLE"   />
			<input type="text" name="country" placeholder="PAYS"   />
			<input type="text" name="zip"   placeholder="CODE POSTAL" /><br/>
			<input type="submit" name="ajouter" value="AJOUTER"  id="ok" />
			<input type="hidden" name="type" value="1"/>
		</form>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
	<script type="text/javascript">
		(function($){			
			$('#ajouter').addClass("active");
		})(jQuery)
	</script>
</body>
</html>