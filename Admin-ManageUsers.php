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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['DeleteUserHiddenField'])) && ($_POST['DeleteUserHiddenField'] != "")) {
  $deleteSQL = sprintf("DELETE FROM usrs WHERE user_id=%s",
                       GetSQLValueString($_POST['DeleteUserHiddenField'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($deleteSQL, $localhost) or die(mysql_error());

  $deleteGoTo = "Admin-ManageUsers.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_ManageUsers = 10;
$pageNum_ManageUsers = 0;
if (isset($_GET['pageNum_ManageUsers'])) {
  $pageNum_ManageUsers = $_GET['pageNum_ManageUsers'];
}
$startRow_ManageUsers = $pageNum_ManageUsers * $maxRows_ManageUsers;

mysql_select_db($database_localhost, $localhost);
$query_ManageUsers = "SELECT * FROM usrs ORDER BY `Timestamp` DESC";
$query_limit_ManageUsers = sprintf("%s LIMIT %d, %d", $query_ManageUsers, $startRow_ManageUsers, $maxRows_ManageUsers);
$ManageUsers = mysql_query($query_limit_ManageUsers, $localhost) or die(mysql_error());
$row_ManageUsers = mysql_fetch_assoc($ManageUsers);

if (isset($_GET['totalRows_ManageUsers'])) {
  $totalRows_ManageUsers = $_GET['totalRows_ManageUsers'];
} else {
  $all_ManageUsers = mysql_query($query_ManageUsers);
  $totalRows_ManageUsers = mysql_num_rows($all_ManageUsers);
}
$totalPages_ManageUsers = ceil($totalRows_ManageUsers/$maxRows_ManageUsers)-1;

$queryString_ManageUsers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ManageUsers") == false && 
        stristr($param, "totalRows_ManageUsers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ManageUsers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ManageUsers = sprintf("&totalRows_ManageUsers=%d%s", $totalRows_ManageUsers, $queryString_ManageUsers);
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
                  <div id="NavBar3">
                    <nav>
                      <ul>
                        <li><a href="LogOut.php">Logout</a></li>
                      </ul>
                    </nav>
                  </div>
                </ul>
              </nav>
            </div>
        </ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
	  <h1>Admin CP</h1>
	</div>
	<div id="ContentLeft">
	  <h2>Links</h2>
	  <h6>&nbsp;</h6>
	  <h6>- &lt;link&gt;</h6>
	</div>
    <div id="ContentRight">
      <table width="670" border="0" align="center">
        <tbody>
          <tr>
            <td align="right" valign="top">&nbsp;Showing <?php echo ($startRow_ManageUsers + 1) ?>to <?php echo min($startRow_ManageUsers + $maxRows_ManageUsers, $totalRows_ManageUsers) ?> of <?php echo $totalRows_ManageUsers ?></td>
          </tr>
          <tr>
            <td align="center" valign="top"><?php if ($totalRows_ManageUsers > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <table width="500" border="0">
                    <tbody>
                      <tr>
                        <td><?php echo $row_ManageUsers['first_name']; ?> <?php echo $row_ManageUsers['last_name']; ?> | <?php echo $row_ManageUsers['email']; ?></td>
                      </tr>
                      <tr>
                        <td><input name="DeleteUserHiddenField" type="hidden" id="DeleteUserHiddenField" value="<?php echo $row_ManageUsers['user_id']; ?>">
                        <input type="submit" name="DeleteUser" id="DeleteUser" value="Delete User"></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top"><form id="DeleteUserForm" name="DeleteUserForm" method="post">
                          <?php if ($pageNum_ManageUsers > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, max(0, $pageNum_ManageUsers - 1), $queryString_ManageUsers); ?>">Previous</a>
                            <?php } // Show if not first page ?>
                          |
                          <?php if ($pageNum_ManageUsers < $totalPages_ManageUsers) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, min($totalPages_ManageUsers, $pageNum_ManageUsers + 1), $queryString_ManageUsers); ?>">Next</a>
                            <?php } // Show if not last page ?>
                        </form></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php } while ($row_ManageUsers = mysql_fetch_assoc($ManageUsers)); ?>
            <?php } // Show if recordset not empty ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($ManageUsers);
?>
