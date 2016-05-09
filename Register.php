<?php require_once('Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="Register.php";
  $loginUsername = $_POST['Username'];
  $LoginRS__query = sprintf("SELECT Username FROM usrs WHERE Username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_localhost, $localhost);
  $LoginRS=mysql_query($LoginRS__query, $localhost) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "RegisterForm")) {
  $insertSQL = sprintf("INSERT INTO usrs (first_name, last_name, email, Username, Password, InitialQuestion1, InitialQuestion2, InitialQuestion3) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['InitialQuestion1'], "text"),
                       GetSQLValueString($_POST['InitialQuestion2'], "text"),
                       GetSQLValueString($_POST['InitialQuestion3'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "Login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_Register = "SELECT * FROM usrs";
$Register = mysql_query($query_Register, $localhost) or die(mysql_error());
$row_Register = mysql_fetch_assoc($Register);
$totalRows_Register = mysql_num_rows($Register);
?>
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
        <li></li>
      </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>New User Registration</h1>
	</div>
	<div id="ContentLeft">
	  <h2>Register for an account with us here!</h2>
	  <h6>&nbsp;</h6>
	  <h6>In order to start using our application, you must first register for an account with us. Please complete the form and tell us a little bit about why you decided to use our app and your plan for integrating it into your life!</h6>
	</div>
    <div id="ContentRight">
      <form action="<?php echo $editFormAction; ?>" id="RegisterForm" name="RegisterForm" method="POST">
        <table width="400" border="0" align="center">
          <tbody>
            <tr>
              <td><table border="0">
                <tbody>
                  <tr>
                    <td><h6>First Name:</h6>
                      <p>
                        <input name="first_name" type="text" required="required" class="StyleTxtField" id="first_name">
                    </p></td>
                    <td><h6>Last Name:</h6>
                      <p>
                        <input name="last_name" type="text" required="required" class="StyleTxtField" id="last_name">
                      </p></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td><h6>Email: </h6>
                <p>
                  <input name="Email" type="email" required class="StyleTxtField" id="Email">
                </p></td>
            </tr>
            <tr>
              <td><h6>Username:</h6>
                <p>
                  <input name="Username" type="text" required="required" class="StyleTxtField" id="Username">
              </p></td>
            </tr>
            <tr>
              <td><table border="0">
                <tbody>
                  <tr>
                    <td><h6>Password: </h6>
                      <p>
                        <input name="Password" type="password" required="required" class="StyleTxtField" id="Password">
                      </p></td>
                    <td><h6>Confirm Password: </h6>
                      <p>
                        <input name="PasswordConfirm" type="password" required="required" class="StyleTxtField" id="PasswordConfirm">
                      </p></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td><h6>Why have you decided to use the application?:</h6>
              <p>
                <textarea name="InitialQuestion1" required class="StyleTxtField" id="InitialQuestion1"></textarea>
              </p></td>
            </tr>
            <tr>
              <td><h6>What three things would you like to get out of this application?:</h6>
              <p>
                <textarea name="InitialQuestion2" required class="StyleTxtField" id="InitialQuestion2"></textarea>
              </p></td>
            </tr>
            <tr>
              <td><h6>What time constraints can you forsee and how can you plan around them?:</h6>
              <p>
                <textarea name="InitialQuestion3" required class="StyleTxtField" id="InitialQuestion3"></textarea>
              </p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="RegisterButton" type="submit" id="RegisterButton" form="RegisterForm" value="Register"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="MM_insert" value="RegisterForm">
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
