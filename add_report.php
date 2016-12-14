<?php
date_default_timezone_set('US/Eastern');

session_start();
if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
$uname = $_SESSION['uname'];
$eid = $_SESSION['eid'];
$ertitle = $_POST['ertitle'];
$ertext = $_POST['ertext'];

$date = date("Y-m-d H:i:s");

$query = "INSERT INTO event_report values (0,'".$uname."','".$eid."','".$ertitle."','".$ertext."','".$date."')";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$erid =  mysql_insert_id();




$inames = $_POST['inames'];



$images = $_POST['images'];
if(isset($images)){
  $len=count($images);
  for($x=0;$x<$len;$x++) {
    if ($images[$x] != '') {
    $query = "INSERT INTO report_img values (0,'".$erid."','".$images[$x]."')";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    }
  }
}
//echo $units[0];

// Free resultset


// Closing connection
mysql_close($connection);  

echo "<script type='text/javascript'>";  
echo "alert('create review successfully! Loading back to frong page...');";
echo "window.location.href='/cookzilla/index.php'";
echo "</script>";  
?>