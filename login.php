<?php
if(isset($_SESSION) == false){
	session_start();
}
$has_Cookie_DisplayName = isset($_COOKIE["COOKIE_DISPLAYNAME"]);
if($has_Cookie_DisplayName == true) {
	$_SESSION["SESS_DISPLAYNAME"] = $_COOKIE["COOKIE_DISPLAYNAME"];
}

if(isset($_SESSION['SESS_DISPLAYNAME'])) {
	header("location: logcall.php");
}
$isLoginButtonClicked = isset($_POST["btnSubmit"]); {
	$userName = $_POST["tbusername"];
	$password = $_POST["tbpassword"];
	
	if($userName == "david" && $password == "password") {
		$_SESSION["SESS_DISPLAYNAME"] = "David";
		
		$rememberMeChecked = isset($_POST["cbRememberMe"]);
		if($rememberMeChecked == true) {
			$expiryTime = time() + 60 * 60 *60 * 24 * 30;
			setcookie("COOKIE_DISPLAYNAME","David",$expiryTime);
		}
		header("location: logcall.php");
	}
	else {
		echo "span style='color:red'>Wrong Username or password</span>";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h2>Patrol Login</h2>
	<p>Please enter your username and password to log in.<br/>
	If you do not have an account, you can get one for free by <a href="register.php">Registering</a>.</p>
	<form method="POST" action="<?php echo $SERVER['REQUEST_URL'];?>"
		<table>
			<tbody>
				<tr>
					<td>Username</td>
					<td><input type="textbox" name="tbusername" id="tbusername /"</td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="textbox" name="tbusername" id="tbusername /"</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="checkbox" name="cbRememberMe" id="cbRememberMe" value="Yes" />Remember Me</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnSubmit" id="btnSubmit" value="Log in" /></td>
				</tr>
			</tbody>
	</table>
	</form>
			
</body>
</html>