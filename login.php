<?php
#require 'authentication.inc';
#require 'db.inc';

if (!$connection = @ mysql_connect("localhost", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
#$query = 'SELECT * FROM book where topic =\'Cooking\'';
$uname = $_POST['user_id'];
$password = $_POST['password'];
#echo $kw;

$query = "SELECT * from users where uname = '".$uname."' and password = '".$password."'";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$num_rows = mysql_num_rows($result);
if ($num_rows == 0) {
    echo "<script type='text/javascript'>
       alert('Wrong email address or password!');
       history.go(-1);
    </script>";
} else {
	echo "<script type='text/javascript'>";  
echo "alert('Sign in successfully. Loading back to frong page...');";
echo "window.location.href='/cookzilla/index.php'";
echo "</script>";  
}



// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($connection);
?>