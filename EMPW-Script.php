<?php 
@session_start();
$_SESSION['EMPW'] = $_POST['email'];
?>
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

$colname_EmailPassword = "-1";
if (isset($_SESSION['EMPW'])) {
  $colname_EmailPassword = $_SESSION['EMPW'];
}
mysql_select_db($database_localhost, $localhost);
$query_EmailPassword = sprintf("SELECT * FROM usrs WHERE email = %s", GetSQLValueString($colname_EmailPassword, "text"));
$EmailPassword = mysql_query($query_EmailPassword, $localhost) or die(mysql_error());
$row_EmailPassword = mysql_fetch_assoc($EmailPassword);
$totalRows_EmailPassword = mysql_num_rows($EmailPassword);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EMPW-Script</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($EmailPassword);
?>
<?php

if ($totalRows_EmailPassword > 0) {

$from="noreply@domain.com";
$email=$_SESSION['email'];
$subject="Depression App - Your Email Password Request";
$message="Hello! Your password is:".$row_EmailPassword['Password'];

mail ( $email, $subject, $message, "From:".$from);

}

    if ($totalRows_EmailPassword > 0) {
	
	    echo "An email has been sent containing your password!";
		
	} else {
	    echo "ERROR: Server connection failed, please try again.";
	}
	
?>