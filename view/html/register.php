<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<br/><br/><br/><br/>
	<div id="app-login">
		<h1>SING UP</h1>
		<form id="signup-form" action="../../controller/user/UserController.php" method="POST">
			<input type="text" name="firstN" placeholder="First Name"  required />
			<input type="text" name="lastN" placeholder="Last Name"  required />
			<input type="text" name="username" placeholder="username"  required />
			<input type="password" name="pass"  required placeholder="password" /><br/>
			<input type="submit" name="signup" value="SING UP" id="'signup" />
			<input type="hidden" name="type" value="1"/>
		</form>
		
		<p id="signin-link">Or <a href="login.php">Sign In<a/></p>
	</div>
</body>
</html>