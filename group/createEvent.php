<?php 
date_default_timezone_set('US/Eastern');
session_start();
$uname = $_SESSION['uname'];
$gid = $_SESSION['gid'];
$ename = $_POST['ename'];
$date = date("Y-m-d H:i:s");

if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
$query = "INSERT INTO user_event values (0,'".$gid."','".$ename."','".$uname."','".$date."','".$date."', 0)";


$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$eid =  mysql_insert_id();
$query2 = mysql_query("INSERT INTO RSVP values('".$uname."', '".$eid."')") or die('Query failed: ' . mysql_error());
mysql_close($connection);  

echo "<script type='text/javascript'>";  
echo "alert('create review successfully! Loading back to previous page...');";
echo "history.go(-1)";
echo "</script>"; 
?>