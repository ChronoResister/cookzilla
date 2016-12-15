<!DOCTYPE html>

<html>

<head>
	<title>cookzilla</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<style>
		.navbar.navbar-inverse.navbar-extra{
			color: orange;
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
<div class="container">
   <div class="jumbotron" id="outer">
        <h1 align="center">Cookzilla!</h1>
        <p align="center">The best community for recipe sharing and cooking events.</p>
        <!--<p align="center">
        <a class="btn btn-primary btn-lg" href="/cookzilla/sign.php">Sign up</a>
              <a class="btn btn-default btn-lg" href="/cookzilla/sign.php">Sign in</a>
      </p>-->
   </div>

<div class="inline">
   <div style="float: left;width: 600px;">
   <h2>Latest Recipes:</h2>
   <?php 
   $con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);

  $result = mysql_query("SELECT * from recipe order by rtime desc limit 10");
  while ($row = mysql_fetch_array($result)) {
    echo "<p><a href=\"recipe/recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></p>";
   
  }
  ?>
  </div>
  <div style="float: left;">
    <h2>My Latest Recipes:</h2>
    <?php 
   $con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);
  $uname = $_SESSION['uname'];
  $result = mysql_query("SELECT * from recipe where uname = '$uname' order by rtime desc limit 10");
  while ($row = mysql_fetch_array($result)) {
    echo "<p><a href=\"recipe/recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></p>";
   
  }
  ?>
  </div>
  </div>

  <div style="float: left;width: 600px;">
   <h2>Latest Visited Recipes:</h2>
   <?php 
   $con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);
  $uname = $_SESSION['uname'];
  $result = mysql_query("SELECT distinct r.recipeId, r.r_title from recipe r, user_visited v where v.uname = '$uname' and v.recipeId = r.recipeId order by v.vtime desc limit 10");
  while ($row = mysql_fetch_array($result)) {
    echo "<p><a href=\"recipe/recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></p>";
   
  }
  ?>
  </div>

<div style="float: left;">
    <h2>My Groups:</h2>
    <?php 
   $con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);
  $uname = $_SESSION['uname'];
  $result = mysql_query("SELECT g.gid, g.gname from user_group g, group_mem m where m.uname = '$uname' and m.gid = g.gid");
  while ($row = mysql_fetch_array($result)) {
    echo "<p><a href=\"group/event.php?gid=".urlencode($row['gid'])."\">".$row['gname']."</a></p>";
   
  }
  ?>
  </div>

</div>
</body>
<script type="text/javascript">
	
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</html>