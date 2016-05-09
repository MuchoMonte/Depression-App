<?php require_once('Connections/localhost.php'); ?>
<!doctype html>
<html>
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<title>Depression App</title>
</head>

<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
  <nav>
    <ul>
      <li></li>
      <li><a href="Login.php">Login</a></li>
      <li><a href="Register.php">Register</a></li>
      <li><a href="ForgotPassword.php">Forgot Password</a></li>
      <li></li>
    </ul>
  </nav>
</div>
<div id="Content">
	<div id="PageHeading"></div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($Register);
?>
