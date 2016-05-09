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
        </ul>
      <ul>
        <li><a href="LevelPage.php">Go Back</a></li>
      </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>Level 1 - Managing Emotions</h1>
	</div>
	<div id="ContentLeft">
	  <h2>Reflecting on Positive Emotions</h2>
	  <h6>&nbsp;</h6>
	  <h6>For your first step, try to	note 3 different positive emotions that you had felt throughout the day and what had influenced them. Once we have done this 5 days in a row, we will be able to continue on to the next step (Level 2)</h6>
	</div>
    <div id="ContentRight">
      <form action="<?php echo $editFormAction; ?>" id="Level1Day1Form" name="Level1Day1Form" method="POST">
        <table width="200" border="0" align="center">
          <tbody>
            <tr>
              <th class="StyleTxtField" scope="col"><p>Positive Emotion 1:</p>
              <p>
                <input name="textfield" type="text" class="StyleTxtField" id="textfield">
              </p></th>
            </tr>
            <tr>
              <th class="StyleTxtField" scope="row"><p>Positive Emotion 2:</p>
              <p>
                <input name="textfield2" type="text" class="StyleTxtField" id="textfield2">
              </p></th>
            </tr>
            <tr>
              <th align="center" class="StyleTxtField" scope="row"><p>Positive Emotion 3:</p>
                <p>
                  <input name="textfield4" type="text" class="StyleTxtField" id="textfield4">
                </p></th>
            </tr>
            <tr>
              <th height="129" align="center" class="StyleTxtField" scope="row"><input name="Level1Day1Submit" type="submit" class="StyleTxtField" id="Level1Day1Submit" value="Submit"></th>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($Register);
?>
