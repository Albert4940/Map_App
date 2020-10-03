<?php
	session_start();
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
		<form id="signin-form" action="../../controller/user/UserController.php" method="POST">
			<input type="text" name="username" placeholder="username"  required />
			<input type="password" name="pass"  required placeholder="password" /><br/>
			<input type="submit" name="signin" value="SIGN IN" id="signup"/>
			<input type="hidden" name="type" value="2" />
		</form>
		<p id="signup-link">Or <a href="register.php">create an account<a/></p>
	</div>
</body>
</html>