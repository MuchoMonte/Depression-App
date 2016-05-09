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
        <li><a href="Admin.php">Account Page</a></li>
      </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>Your Levels</h1>
	</div>
</div>
<div id="ContentLeft">
  <table width="200" border="0" align="center">
    <tbody>
      <tr>
        <th scope="col"><h1>Level 1</h1>
          <table width="200" border="0" align="center">
            <tbody>
              <tr>
                <th class="StyleTxtField" scope="col"><a href="Level1Day1.php">Day 1</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level1Day2.php">Day 2</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level1Day3.php">Day 3</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level1Day4.php">Day 4</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level1Day5.php">Day 5</a></th>
                </tr>
              </tbody>
          </table></th>
      </tr>
      <tr>
        <th scope="col"><h1>Level 2</h1>
          <table width="200" border="0" align="center">
            <tbody>
              <tr>
                <th class="StyleTxtField" scope="col"><a href="Level2Day1.php">Day 1</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level2Day2.php">Day 2</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level2Day3.php">Day 3</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level2Day4.php">Day 4</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level2Day5.php">Day 5</a></th>
                </tr>
              </tbody>
          </table></th>
      </tr>
      <tr>
        <th scope="col"><h1>Level 3</h1>
          <table width="200" border="0" align="center">
            <tbody>
              <tr>
                <th class="StyleTxtField" scope="col"><a href="Level3Day1.php">Day 1</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level3Day2.php">Day 2</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level3Day3.php">Day 3</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level3Day4.php">Day 4</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level3Day5.php">Day 5</a></th>
                </tr>
              </tbody>
          </table></th>
      </tr>
      <tr>
        <th scope="col"><h1>Level 4</h1>
          <table width="200" border="0" align="center">
            <tbody>
              <tr>
                <th class="StyleTxtField" scope="col"><a href="Level4Day1.php">Day 1</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level4Day2.php">Day 2</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level4Day3.php">Day 3</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level4Day4.php">Day 4</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level4Day5.php">Day 5</a></th>
                </tr>
              </tbody>
          </table></th>
      </tr>
      <tr>
        <th scope="col"><h1>Level 5</h1>
          <table width="200" border="0" align="center">
            <tbody>
              <tr>
                <th class="StyleTxtField" scope="col"><a href="Level5Day1.php">Day 1</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level5Day2.php">Day 2</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level5Day3.php">Day 3</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level5Day4.php">Day 4</a></th>
                <th class="StyleTxtField" scope="col"><a href="Level5Day5.php">Day 5</a></th>
              </tr>
            </tbody>
          </table></th>
      </tr>
    </tbody>
  </table>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($Register);
?>
