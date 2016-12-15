<head>
  <title>cookzilla</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <style>
    #profile{
      max-height: 200;
    }
    #left {

    float: left;
    width: 500px;    
    height:500px;
    padding-left: 100px;
    
}

#right {
    float: right;
    padding-right: 100px;
    width: 600px;
    
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
                <a href="/cookzilla/recipe/view_recipe.php?sort=createdat"><font color="orange">Recipe</font></a>
              </li>

              
              
              <li id="subscribe">
                <a href=/cookzilla/group/group.php><font color="orange">Group</font></a>
              </li>

            
              
              
              
            </ul>
            
            <div class="dropdown">
            <ul id="navbar-right" class="nav navbar-nav navbar-right">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
               <?php
        session_start();
      //需要用isset来检测变量，不然php可能会报错。
        echo $_SESSION['nickname']. "(". $_SESSION['uname'].")";
        
      ?>
                
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              
                <li><a href="/cookzilla/account/logout.php">Sign out</a></li>
              </ul>
              </li>
            </ul>
            </div>

          </div>
        </div>
      </div>

<br>
</br>

<?php

$uname = $_SESSION['uname'];

$gid = $_GET["gid"];
$_SESSION['gid'] = $gid;
//$uname = $_SESSION['uname'];
//echo $uname;
$con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);
$gn = mysql_query("SELECT gname from user_group where gid = '$gid'");
echo "<h2 style= \"margin-left:40px\">Group Name:&nbsp&nbsp". mysql_fetch_array($gn)[0]."</h2>";

echo "<h2 style= \"margin-left:40px\"> Joined Group Events</h2>";
$result2 = mysql_query("SELECT E.eid,E.ename,r.nickname,E.starttime,E.endtime,E.max_number FROM users r, user_event E,rsvp WHERE E.gid = '$gid' and rsvp.eid = E.eid and e.creater = r.uname and rsvp.uname = '$uname'") or die('Query failed: ' . mysql_error());
/*
SELECT E.eid,E.ename,E.creater,E.starttime,E.endtime,E.max_number
FROM user_event E,rsvp
WHERE E.gid = '$gid' and rsvp.eid = E.eid and rsvp.uname = '$uname'

SELECT E.eid,E.ename,r.nickname,E.starttime
FROM user_event E, rsvp p, users r
WHERE E.gid = '$gid' and p.eid = E.eid and p.uname = '$uname' and e.creater = r.nickname
*/

echo "
<style>
table a:link {
  color: #666;
  font-weight: bold;
  text-decoration:none;
}
table a:visited {
  color: #999999;
  font-weight:bold;
  text-decoration:none;
}
table a:active,
table a:hover {
  color: #bd5a35;
  text-decoration:underline;
}
table {
  font-family:Arial, Helvetica, sans-serif;
  color:#666;
  font-size:15px;
  text-shadow: 1px 1px 0px #fff;
  background:#eaebec;
  margin:20px;
  border:#ccc 1px solid;

  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;

  -moz-box-shadow: 0 1px 2px #d1d1d1;
  -webkit-box-shadow: 0 1px 2px #d1d1d1;
  box-shadow: 0 1px 2px #d1d1d1;
}
table th {
  padding:21px 25px 22px 25px;
  border-top:1px solid #fafafa;
  border-bottom:1px solid #e0e0e0;

  background: #ededed;
  background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
  background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
  text-align: left;
  padding-left:20px;
}
table tr:first-child th:first-child{
  -moz-border-radius-topleft:3px;
  -webkit-border-top-left-radius:3px;
  border-top-left-radius:3px;
}
table tr:first-child th:last-child{
  -moz-border-radius-topright:3px;
  -webkit-border-top-right-radius:3px;
  border-top-right-radius:3px;
}
table tr{
  text-align: center;
  padding-left:20px;
}
table tr td:first-child{
  text-align: left;
  padding-left:20px;
  border-left: 0;
}
table tr td {
  padding:18px;
  border-top: 1px solid #ffffff;
  border-bottom:1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
  background: #f6f6f6;
  background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
  background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
  border-bottom:0;
}
table tr:last-child td:first-child{
  -moz-border-radius-bottomleft:3px;
  -webkit-border-bottom-left-radius:3px;
  border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
  -moz-border-radius-bottomright:3px;
  -webkit-border-bottom-right-radius:3px;
  border-bottom-right-radius:3px;
}
table tr:hover td{
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);  
}

</style>
<table>
<tr>

<th>Event Name</th>
<th>Creater</th>
<th>Created At</th>

</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  //echo "<td>" . $row['eid'] . "</td>";
  echo "<td><a href=\"report.php?eid=".urlencode($row['eid'])."\">".$row['ename']."</a>"."</td>";
  
  echo "<td>" . $row['nickname'] . "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  //echo "<td>" . $row['endtime'] . "</td>";
 // echo "<td>" . $row['max_number'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";

echo '<br>';
//<h1> Joined Group </h1>

echo "<h2 style= \"margin-left:40px\"> Unjoined Group Events</h2>";
$result1 = mysql_query(
  "SELECT E.eid,E.ename,r.nickname,E.starttime, count(p.eid) as currentMember
FROM user_event E,rsvp p, users r
WHERE  E.eid = p.eid and E.gid = '$gid' and r.uname = e.creater and E.eid not in
(SELECT E.eid FROM user_event E,rsvp WHERE E.gid = '$gid' and rsvp.eid = E.eid and rsvp.uname = '$uname')
GROUP BY p.eid"


) or die ('Query failed: ' . mysql_error());

echo "
<style>
table a:link {
  color: #666;
  font-weight: bold;
  text-decoration:none;
}
table a:visited {
  color: #999999;
  font-weight:bold;
  text-decoration:none;
}
table a:active,
table a:hover {
  color: #bd5a35;
  text-decoration:underline;
}
table {
  font-family:Arial, Helvetica, sans-serif;
  color:#666;
  font-size:15px;
  text-shadow: 1px 1px 0px #fff;
  background:#eaebec;
  margin:20px;
  border:#ccc 1px solid;

  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;

  -moz-box-shadow: 0 1px 2px #d1d1d1;
  -webkit-box-shadow: 0 1px 2px #d1d1d1;
  box-shadow: 0 1px 2px #d1d1d1;
}
table th {
  padding:21px 25px 22px 25px;
  border-top:1px solid #fafafa;
  border-bottom:1px solid #e0e0e0;

  background: #ededed;
  background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
  background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
  text-align: left;
  padding-left:20px;
}
table tr:first-child th:first-child{
  -moz-border-radius-topleft:3px;
  -webkit-border-top-left-radius:3px;
  border-top-left-radius:3px;
}
table tr:first-child th:last-child{
  -moz-border-radius-topright:3px;
  -webkit-border-top-right-radius:3px;
  border-top-right-radius:3px;
}
table tr{
  text-align: center;
  padding-left:20px;
}
table tr td:first-child{
  text-align: left;
  padding-left:20px;
  border-left: 0;
}
table tr td {
  padding:18px;
  border-top: 1px solid #ffffff;
  border-bottom:1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
  background: #f6f6f6;
  background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
  background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
  border-bottom:0;
}
table tr:last-child td:first-child{
  -moz-border-radius-bottomleft:3px;
  -webkit-border-bottom-left-radius:3px;
  border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
  -moz-border-radius-bottomright:3px;
  -webkit-border-bottom-right-radius:3px;
  border-bottom-right-radius:3px;
}
table tr:hover td{
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);  
}

</style>
<table border='1'>
<tr>

<th>Eventname</th>
<th>Creater</th>
<th>Starttime</th>

<th>CurrentMember</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  //echo "<td>" . $row['eid'] . "</td>";
  echo "<td><a href=\"report.php?eid=".urlencode($row['eid'])."\">".$row['ename']."</a>"."</td>";
  
  echo "<td>" . $row['nickname'] . "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  //echo "<td>" . $row['endtime'] . "</td>";
  //echo "<td>" . $row['max_number'] . "</td>";
  echo "<td>" . $row['currentMember'] . "</td>";
  echo "<td><a class=\"btn btn-primary\" href=\"rsvp2.php?eid=". $row['eid'] ."\">RSVP</a></td>";


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

/*echo "<div class=\"navbar-form navbar-left\">
              <a class=\"btn btn-primary\" href=\"/cookzilla/createEvent.php?gid=".
             $gid. "\">Create Events</a>        
</div>";
*/

?>

<div class="col-xs-4  col-left-block"> 
<form class="form-horizontal" onsubmit="return check()" action="createEvent.php" method="post" name="form">
 <fieldset>
      <div id="legend" class="">
        
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Event Name</label>
          <div class="controls">
            <input class="form-control" type="text" name="ename" placeholder="Event Name" >
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group">
        <button type="submit" class="btn center-block">Create Event</button>
    </div>
    </fieldset>
    </form>
    </div>
    </body>
    <script type="text/javascript">
      function check()
{
if(document.form.ename.value.length==0){
  alert("Event name cannot be null!");
  document.form.ename.focus();
  return false;
  }
}
    </script>
    </html>


