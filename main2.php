<!DOCTYPE html>
<html>
<head>
	<title>cookzilla</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
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
                <a href="/cookzilla/account/sign.php"><font color="orange">Recipe</font></a>
              </li>

                            
              <li id="subscribe">
                <a href="/cookzilla/account/sign.php"><font color="orange">Group</font></a>
              </li>

              
              
              
              
            </ul>
            
            <div class="navbar-form navbar-right">
              <a class="btn btn-primary" href="/cookzilla/account/sign.php">Sign up</a>
              <a class="btn btn-default" href="/cookzilla/account/sign.php">Sign in</a>
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
    echo "<p><a href='/cookzilla/account/sign.php'>".$row['r_title']."</a></p>";
   
  }
  ?>
  </div>
  <div style="float: left;">
    <h2>Latest Events:</h2>
    <?php 
   $con = mysql_connect("127.0.0.1","root",""); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);

  $result = mysql_query("SELECT * from user_event order by starttime desc limit 10");
  while ($row = mysql_fetch_array($result)) {
    echo "<p><a href='/cookzilla/account/sign.php'>".$row['ename']."</a></p>";
   
  }
  ?>
  </div>
  </div>
</div>


</body>
<script type="text/javascript">
	
</script>
</html>