<?php
	session_start();
	if(isset($_SESSION['username'])){
		header('Location:dashboard.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<br/><br/><br/><br/>
	<div id="app-login">
		<h1>SING IN</h1> 
				<?php 
					if(isset($_SESSION['error']) AND $_SESSION['error'] != ''){
						echo'<p class="message danger">'.$_SESSION['error'].'<p/>';
						$_SESSION['error'] = '';
					}
				?>
		<form id="signin-form" action="../../controller/user/UserController.php" method="POST">
			<input type="text" name="username" placeholder="username"   />
			<input type="password" name="pass"   placeholder="password" /><br/>
			<input type="submit" name="signin" value="S'IDENTIFIER" id="signup"/>
			<input type="hidden" name="type" value="2" />
		</form>
		<p id="signup-link">Or <a href="register.php">cree un compte<a/></p>
	</div>
</body>
</html>