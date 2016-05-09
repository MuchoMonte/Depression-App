<!doctype html>
<html>
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<title>Untitled Document</title>
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
        </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>Forgot Password</h1>
	</div>
	<div id="ContentLeft">
	  <h2>Password Recovery</h2>
	  <h6>&nbsp;</h6>
	  <h6>Please enter the email you had registered with, and we will send you an email containing your login credentials!</h6>
	</div>
    <div id="ContentRight">
      <form action="EMPW-Script.php" method="post" name="EMPWForm" id="EMPWForm">
        <p>
          <label for="email">Email:</label>
        </p>
        <p>
          <input name="email" type="email" class="StyleTxtField" id="email">
        </p>
        <p>&nbsp; </p>
        <p>
          <input name="EMPWSubmit" type="submit" id="EMPWSubmit" formaction="EMPW-Script.php" formmethod="POST" value="Submit">
        </p>
      </form>
    </div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>