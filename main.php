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
                <li><a href="/profile/">My Recipe</a></li>
                <li><a href="/subscription/">My Review</a></li>
                <li><a href="/subscription/">My Group</a></li>
                <li><a href="/subscription/">My Event</a></li>
                <li><a href="/subscription/">My Report</a></li>
                <li class="divider"></li>
                <li><a href="/submissions/">My Notifications</a></li>
                <li class="divider"></li>
                <li><a href="logout.php">Sign out</a></li>
              </ul>
              </li>
            </ul>
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
</div>
<div class="navbar-form navbar-left">
              <a class="btn btn-primary" href="/cookzilla/add_recipe.php">Post Recipe</a>
              
            </div>

</body>
<script type="text/javascript">
	
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</html>