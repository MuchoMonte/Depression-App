<?php @session_start(); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateForm")) {
  $updateSQL = sprintf("UPDATE ``usrs`` SET email=%s, Password=%s WHERE user_id=%s",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['UpserIDhiddenField'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());

  $updateGoTo = "Account.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_User = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_User = $_SESSION['MM_Username'];
}
mysql_select_db($database_localhost, $localhost);
$query_User = sprintf("SELECT * FROM usrs WHERE Username = %s", GetSQLValueString($colname_User, "text"));
$User = mysql_query($query_User, $localhost) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);
?>
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
            <div id="NavBar2">
              <nav>
                <ul>
                  <li><a href="#">Start App!</a></li>
                </ul>
                <ul>
                  <li><a href="LogOut.php">Logout</a></li>
                </ul>
              </nav>
            </div>
        </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>Update Account</h1>
	</div>
	<div id="ContentLeft">
	  <h2>Your Links:</h2>
      <h6>&nbsp;</h6>
      <h6>- <a href="Account.php">Show Account Panel</a><br>
      - Show Previous Answers </h6>
	</div>
    <div id="ContentRight">
      <form action="<?php echo $editFormAction; ?>" id="UpdateForm" name="UpdateForm" method="POST">
        <table width="600" border="0" align="center">
          <tbody>
            <tr>
              <td><h6>Account: <?php echo $row_User['Username']; ?> (<?php echo $row_User['first_name']; ?> <?php echo $row_User['last_name']; ?>)
                </h6>
                <table width="400" border="0" align="center">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><h6>Email:
                      </h6>
                        <p>
                          <input name="email" type="email" class="StyleTxtField" id="email" value="<?php echo $row_User['email']; ?>">
                      </p></td>
                    </tr>
                    <tr>
                      <td><h6>Password:
                      </h6>
                        <p>
                          <input name="password" type="password" class="StyleTxtField" id="password" value="<?php echo $row_User['Password']; ?>">
                      </p></td>
                    </tr>
                    <tr>
                      <td><input type="submit" name="Update" id="Update" value="Update">
                      <input name="UpserIDhiddenField" type="hidden" id="UpserIDhiddenField" value="<?php echo $row_User['user_id']; ?>"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><h6>&nbsp;</h6></td>
                    </tr>
                    <tr>
                      <td><h6>&nbsp;</h6></td>
                    </tr>
                  </tbody>
              </table></td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="MM_update" value="UpdateForm">
      </form>
    </div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($User);
?>
