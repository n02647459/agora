<?php
require_once 'settings.php';
// Constants
DEFINE("USER_PERMISSION_VIEW_SHOP", pow(2^20));
DEFINE("USER_PERMISSION_EDIT_SHOP", pow(2^21));


$con = mysqli_connect(DB_LOCATION, DB_USERNAME, DB_PASSWORD, DB_NAME);
$session = 0;
if ($_COOKIE["session"] != "")
{
	$session = $_COOKIE["session"];
}
function getUserID()
{
	global $session;
	global $con;
	if ($session != 0)
	{
		$sql = "SELECT user, expires from sessions WHERE id='".$session."';";
		$response = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($response);
		if ($row["expires"] > time())
		{
			return $row["user"];
		}
	}
	return -1;
}
function isLoggedIn()
{
	return getUserID() != -1;
}
?>
