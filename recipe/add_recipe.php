<?php
date_default_timezone_set('US/Eastern');

session_start();
if (!$connection = @ mysql_connect("127.0.0.1", "root", ""))
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
    if ($tags[$x] != '') {
      $query = "INSERT INTO Tag values ('".$rid."','".$tags[$x]."')";
	   $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     $rrr = "SELECT recipeId from tag where rtag = '$tags[$x]'";
     $related = mysql_query($rrr) or die('Query failed: ' . mysql_error());
     while($row = mysql_fetch_array($related)) {
      $reid = $row['recipeId'];
//       echo "<script type='text/javascript'>";  
// echo "alert('$reid');";
// echo "window.location.href='/cookzilla/index.php'";
// echo "</script>"; 
       mysql_query("INSERT INTO related values($rid, $reid)") ;
       mysql_query("INSERT INTO related values($reid, $rid)") ;
     }
    }
  }
}


$inames = $_POST['inames'];
$iqs = $_POST['iqs'];
$units = $_POST['units'];
if(isset($inames)){
  $len=count($inames);
  for($x=0;$x<$len;$x++) {
    if ($inames[$x] != '') {
    $query = "INSERT INTO Ingredient values ('".$rid."','".$inames[$x]."','".$iqs[$x]."','".$units[$x]."')";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
}
}
  }


$images = $_POST['images'];
if(isset($images)){
  $len=count($images);
  for($x=0;$x<$len;$x++) {
    if ($images[$x] != '') {
    $query = "INSERT INTO recipe_img values (0,'".$rid."','".$images[$x]."')";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    }
  }
}
//echo $units[0];

// Free resultset


// Closing connection
mysql_close($connection);  

echo "<script type='text/javascript'>";  
echo "alert('create recipe successfully! Loading back to frong page...');";
echo "window.location.href='/cookzilla/index.php'";
echo "</script>";  
?>