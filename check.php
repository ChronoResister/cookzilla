<?php
#require 'authentication.inc';
#require 'db.inc';

if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
#$query = 'SELECT * FROM book where topic =\'Cooking\'';
$uname = $_POST['user_id'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$profile = $_POST['profile'];
#echo $kw;
$query = "INSERT INTO Users values ('".$uname."','".$nickname."','".$password."','".$profile."')";
#echo'ok';

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo "123";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($connection);
?>