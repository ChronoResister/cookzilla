<?php
session_start();
if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
$uname = $_SESSION['uname'];
$rtitle = $_POST['rtitle'];
$nos = $_POST['nos'];
$descrip = $_POST['descrip'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO Recipe values (0,'".$uname."','".$rtitle."','".$nos."','".$descrip."', '".$date."')";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$rid =  mysql_insert_id();
$tags = $_POST['tags'];
if(isset($tags)){
  $len=count($tags);
  for($x=0;$x<$len;$x++) {
    $query = "INSERT INTO Tag values ('".$rid."','".$tags[$x]."')";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
  }
}

$inames = $_POST['inames'];
$iqs = $_POST['iqs'];
$units = $_POST['units'];
if(isset($inames)){
  $len=count($inames);
  for($x=0;$x<$len;$x++) {
    $query = "INSERT INTO Ingredient values ('".$rid."','".$inames[$x]."','".$iqs[$x]."','".$units[$x]."')";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
  }
}
//echo $units[0];
echo "<script type='text/javascript'>";  
echo "alert(create recipe successfully!);";
echo "window.location.href='/cookzilla/new_recipe.php'";
echo "</script>";  
// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($connection);
?>