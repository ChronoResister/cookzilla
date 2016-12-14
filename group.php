<head>
  <title>cookzilla</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
              <a class="btn btn-primary" href="/cookzilla3/signup.php">Sign up</a>
              <a class="btn btn-default" href="/cookzilla3/signin.php">Sign in</a>
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
<div id="left">
<h2 style= \"margin-left:40px\">Joined Group</h2>
<a class="btn btn-primary" href="/cookzilla/createGroup.php">Create Group</a> 
<?php
session_start();
$uname = $_SESSION['uname'];
//echo $uname;
//echo $uname;
$con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);


//<h1> Joined Group </h1>


$result2 = mysql_query("SELECT u.gid, U.gname , r.nickname 
FROM user_group U, group_mem G, users r
WHERE U.gid = G.gid and G.uname = '$uname' and u.creater = r.uname") or die('Query failed: ' . mysql_error());
/*
<style>
table, th, td{
    margin:auto;
    border: 1px solid black;
    border-collapse: collapse;
}
th {
    background-color: #337ab7;
    color: white;
}
th, td {
    padding: 15px;
}
tr:hover{background-color:#f5f5f5}
</style>
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
  font-size:12px;
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

<th>Groupname</th>
<th>Creater</th>
</tr>"
;

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  
  echo "<td class='gname'><a href=\"joinEvent.php?gid=".urlencode($row['gid'])."\">".$row['gname']."</a>"."</td>"; 
  //echo "<td>" . $row['gname'] . "</td>";
  echo "<td>" . $row['nickname'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
//echo "</div>";
echo '<br>';
//echo  '<hr>'
/*
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th {
    background-color: #337ab7;
    color: white;
}
th, td {
    padding: 15px;
}
tr:hover{background-color:#f5f5f5}
</style>
*/
/*echo "<h2 style= \"margin-left:40px\">Group Members</h2>";
$result3 = mysql_query("SELECT M1.gid,M1.uname
FROM group_mem M1, group_mem M2 
WHERE M1.gid = M2.gid and M2.uname = '$uname' ");

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
  font-size:12px;
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
<table >
<tr>
<th>GroupID</th>
<th>GroupMember</th>
</tr>";

while($row = mysql_fetch_array($result3))
  {
  echo "<tr>";
  echo "<td>" . $row['gid'] . "</td>";
  echo "<td>" . $row['uname'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo '<br>';
*/
?>


</div>
<div id='right'>
<h2 style= \"margin-left:40px\">Other Groups</h2>
<input type="text" class="form-control col-xs-4" id="kw"  placeholder="Search keyword">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="filter()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
<?php
$con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);
//<h1> All  Groups <h1>
//echo "<h2 style= \"margin-left:40px\">All Groups</h2>";
$result1 = mysql_query("SELECT g.gid, g.gname, u.nickname 
  FROM user_group g, users u where g.creater = u.uname and g.gname not in
  (SELECT U.gname FROM user_group U, group_mem G, users r
WHERE U.gid = G.gid and G.uname = '$uname' and u.creater = r.uname)");

//SELECT u.gid, U.gname , r.nickname 
//FROM user_group U, group_mem G, users r
//WHERE U.gid = G.gid and G.uname = '$uname' and u.creater = r.uname

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
<table border='1' id='gn'>
<tr>

<th>Groupname</th>
<th>Creater</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  //echo "<td>" . $row['gid'] . "</td>";
  echo "<td><a href=\"event.php?gid=".urlencode($row['gid'])."\">".$row['gname']."</a>"."</td>"; 
  //echo "<td>" . $row['gname'] . "</td>";
  echo "<td>" . $row['nickname'] . "</td>";
  echo "<td><a class=\"btn btn-primary\" href=\"/cookzilla/joinGroup2.php?gid=". $row['gid'] ."\">Join Group</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);

?>
<!--
</div>
<div class="navbar-form navbar-left">
              <a class="btn btn-primary" href="/cookzilla/joinGroup.php">Join Groups</a>        
</div>
    <a class="btn btn-primary" href="/cookzilla/createGroup.php">Create Groups</a> 
<div class="navbar-form navbar-left">
                     -->
</div>
</body>
<script type="text/javascript">
  function filter() {
  // Declare variables 

  var input, filter, table, tr, td, i;
  input = document.getElementById("kw");
  filter = input.value.toUpperCase();
  table = document.getElementById("gn");
  //tr = table.getElementsByClassName("gname");
  tr = table.getElementsByTagName("tr");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    console.log(td);
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        //alert('get');
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</html>


