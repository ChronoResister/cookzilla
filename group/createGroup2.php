<head>
  <title>cookzilla</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    #profile{

      max-height: 200;
    }
  </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-extra" >
        <div class="container">
          <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/cookzilla"><font color="red">🍴Cookzilla!🍴</font></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              


              <li id="subscribe">
                <a href="/subscribe/"><font color="orange">Recipe</font></a>
              </li>

              <li id="subscribe">
                <a href="/subscribe/"><font color="orange">Tag</font></a>
              </li>
              
              <li id="subscribe">
                <a href="/subscribe/"><font color="orange">Group</font></a>
              </li>

              <li id="subscribe">
                <a href="/subscribe/"><font color="orange">Event</font></a>
              </li>
              
              
              
            </ul>
            
            <div class="navbar-form navbar-right">
              <a class="btn btn-primary" href="/cookzilla/signup.php">Sign up</a>
              <a class="btn btn-default" href="/cookzilla/signin.php">Sign in</a>
            </div>
            
            <!--
            <form class="navbar-form pull-right">
              <input class="col-md-2" type="text" placeholder="Email">
              <input class="col-md-2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
            -->
          </div><!--/.navbar-collapse -->
        </div>
      </div>

<br>
</br>




<?php
#require 'authentication.inc';
#require 'db.inc';
session_start();
$uname = $_SESSION['uname'];
$gname = $_POST['gname'];
echo $uname;

if (!$connection = mysql_connect("127.0.0.1", "root", ""))
  die("Cannot connect" . mysql_error());
mysql_select_db('cookzilla') or die('Could not select database' . mysql_error());
#echo $kw;
//$idd = 1;
$query1 = "INSERT INTO user_group values (0,'$gname','$uname')";



$result = mysql_query($query1) or die('Query failed: ' . mysql_error());
$gid = mysql_insert_id();
$query2 = "INSERT INTO group_mem values ('$gid','$uname')";
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());

echo "success";
echo "<script type='text/javascript'>";  
echo "alert('You have Created group $gname! Loading into group page...');";
echo "history.go(-2)";
echo "</script>";  
// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($connection);
?>


