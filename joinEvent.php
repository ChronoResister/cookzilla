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
session_start();
$uname = $_SESSION['uname'];

$gid = $_GET["gid"];
//$uname = $_SESSION['uname'];
//echo $uname;
$con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);


echo "<h2> Joined Group Events</h2>";
$result2 = mysql_query("SELECT E.eid,E.ename,E.creater,E.starttime,E.endtime,E.max_number
FROM user_event E,rsvp
WHERE E.gid = '$gid' and rsvp.eid = E.eid and rsvp.uname = '$uname'");

echo "
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>
<table border='1'>
<tr>
<th>EventID</th>
<th>Eventname</th>
<th>Creater</th>
<th>Starttime</th>
<th>Endtime</th>
<th>MaxNumber</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['eid'] . "</td>";
  echo "<td><a href=\"report.php?eid=".urlencode($row['eid'])."\">".$row['ename']."</a>"."</td>";
  
  echo "<td>" . $row['creater'] . "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  echo "<td>" . $row['endtime'] . "</td>";
  echo "<td>" . $row['max_number'] . "</td>";
  //echo "<td>" . $row['currentMember'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo '<br>';
//<h1> Joined Group </h1>

echo "<h2> Other Group Events</h2>";
$result1 = mysql_query("
  SELECT E.eid,E.ename,E.creater,E.starttime,E.endtime,E.max_number, count(rsvp.eid) as currentMember
FROM user_event E,rsvp
WHERE  E.eid = rsvp.eid and E.gid = '$gid' 
GROUP BY rsvp.eid");

echo "
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
tr:hover{background-color:#f5f5f5}
</style>
<table border='1'>
<tr>
<th>EventID</th>
<th>Eventname</th>
<th>Creater</th>
<th>Starttime</th>
<th>Endtime</th>
<th>MaxNumber</th>
<th>CurrentMember</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['eid'] . "</td>";
  echo "<td><a href=\"report.php?eid=".urlencode($row['eid'])."\">".$row['ename']."</a>"."</td>";
  
  echo "<td>" . $row['creater'] . "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  echo "<td>" . $row['endtime'] . "</td>";
  echo "<td>" . $row['max_number'] . "</td>";
  echo "<td>" . $row['currentMember'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo '<br>';
//echo  '<hr>'
//<h1> All  Groups <h1>
/*
echo "<h2>All Groups</h2>";
$result1 = mysql_query("SELECT * FROM user_group");

echo "<table border='1'>
<tr>
<th>Groupname</th>
<th>Creater</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['gname'] . "</td>";
  echo "<td>" . $row['creater'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
*/
mysql_close($con);

?>

<div class="navbar-form navbar-left">
              <a class="btn btn-primary" href="/cookzilla/rsvp.php">Join Events</a>        
</div>

