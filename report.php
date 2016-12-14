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
//echo $uname;
$eid = $_GET["eid"];

//$uname = $_SESSION['uname'];
//echo $uname;
$con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);


echo "<h2 style= \"margin-left:40px\"> Event reports </h2>";
$rrr = mysql_query("SELECT ename from user_event where eid = '$eid' ");
echo "<h2 style= \"margin-left:40px\"> Event Title: ".
mysql_fetch_array($rrr)[0] . "</h2>";
$result2 = mysql_query("SELECT r.erId, r.ertitle, u.nickname, r.ertime
FROM user_event E, event_report R, users u
WHERE R.eid = E.eid and E.eid = '$eid' and r.uname = u.uname") or die('Query failed: ' . mysql_error());

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

<th>Title</th>
<th>Author</th>
<th>Created At</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td><a href=\"report_detail.php?erid=" . urlencode($row['erId'])."\">". $row['ertitle'] . "</td>";
  echo "<td>" . $row['nickname'] . "</td>";
  echo "<td>" . $row['ertime'] . "</td>";
 
  echo "</tr>";
  }
echo "</table>";

echo '<br>';
//<h1> Joined Group </h1>


mysql_close($con);
echo "<div class=\"navbar-form navbar-left\">
              <a class=\"btn btn-primary\" href=\"/cookzilla/createreport.php?eid=". $eid ."\">Write Report</a>
</div>";

?>
    


