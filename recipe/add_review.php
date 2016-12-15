<?php
date_default_timezone_set('US/Eastern');

session_start();
if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
$uname = $_SESSION['uname'];
$rid = $_SESSION['rid'];
$wtitle = $_POST['wtitle'];
$rating = $_POST['rating'];
$suggestion = $_POST['suggestion'];
$review = $_POST['review'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO review values (0,'".$uname."','".$rid."','".$wtitle."','".$rating."','".$review."', '".$suggestion."','".$date."')";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$wid =  mysql_insert_id();




$inames = $_POST['inames'];



$images = $_POST['images'];
if(isset($images)){
  $len=count($images);
  for($x=0;$x<$len;$x++) {
    if ($images[$x] != '') {
    $query = "INSERT INTO review_img values (0,'".$wid."','".$images[$x]."')";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    }
  }
}
//echo $units[0];

// Free resultset


// Closing connection
mysql_close($connection);  

echo "<script type='text/javascript'>";  
echo "alert('create review successfully! Loading back to previous page...');";
//echo "window.location.href='/cookzilla/index.php'";
echo "history.go(-2)";
echo "</script>";  
?>