<!DOCTYPE html>

<html>

<head>
	<title>cookzilla</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<style>
		.navbar.navbar-inverse.navbar-extra{
			color: orange;
		}
    .col-center-block {  
    float: none;  
    display: block;  
    margin-left: auto;  
    margin-right: auto;  
} 
#father{
  position: relative;
  width: 500;
}
#content {

    float: left;
    width: 800px;    
    height:500px;
    padding-left: 50px;
    
}
#review {
  float:left;
  width: 800px;
  height: 200px;
}
#side {
    float: right;
    padding-right: 50px;
    width: 300px;
    
}
#left {
  position: absolute;
  left:50;
  top:20;
  width: 800;
  float: left;
}
#right {
  position: absolute;
  right:50;
  top:20;
  width: 200;
  float: right;
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
                <li><a href="/cookzilla/account/logout.php">Sign out</a></li>
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
      

    
    <?php
    $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
date_default_timezone_set('US/Eastern');

mysql_select_db("cookzilla", $con);
$rid = $_GET["rid"];
$_SESSION['rid'] = $rid;
$date = date("Y-m-d H:i:s");
$visited = "INSERT INTO user_visited values('".$_SESSION['uname']."', '".$rid."', '".$date."')";
$result1 = mysql_query($visited) or die('Query failed: ' . mysql_error());

$result = mysql_query("SELECT * FROM recipe, users where recipe.recipeId = '$rid.' and users.uname = recipe.uname") or die('Query failed: ' . mysql_error());
$row = mysql_fetch_array($result);  
$_SESSION['rtitle'] = $row["r_title"];
echo "<div  id = \"content\">";
echo "<div style='text-align:center;'><h2 class='col-center-block'>". $row["r_title"]. "</div></h2>";
$visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
$v = $visits[0] == "" ? 0 : $visits[0];
echo "<div style='text-align:right;'><h4> <font color='gray'>Arthur:&nbsp&nbsp" . $row['nickname'] ."</font></h4></div>";
echo "<div style='text-align:right;'><h4> <font color='gray'>" . $row['rtime'] ."</font></h4></div>";

$ing = mysql_query("SELECT * FROM ingredient where recipeId = '$rid'");
echo "<h4>ingredients:</h4>";
while ($row = mysql_fetch_array($ing)) {
  $unit = "";
  switch ($row['iunit']) {
    case '1':
      $unit = 'piece';
      break;
    case '2':
      $unit = 'spoon';
      break;
      case '3':
      $unit = 'cup';
      break;
      case '4':
      $unit = 'bowl';
      break;
      case '5':
      $unit = 'g';
      break;
      case '6':
      $unit = 'kg';
      break;
      case '7':
      $unit = 'lb';
      break;
      case '8':
      $unit = 'oz';
      break;
      case '9':
      $unit = 'ml';
      break;
      case '10':
      $unit = 'l';
      break;
      case '11':
      $unit = 'pt';
      break;
      case '12':
      $unit = 'qt';
      break;
      case '13':
      $unit = 'gal';
      break;
  }

  echo "<p>".$row['iname'].":&nbsp&nbsp".$row['iquantity']."&nbsp".$unit."</p>";
}


echo "<pre>". $row['r_description'] . "</pre>";

$images = mysql_query("SELECT image from recipe_img where recipeId = '$rid' ");

while($row = mysql_fetch_array($images)) {
    
    echo "<img src='".$row[0]."' class='img'>";
}
echo "<h2><a class='btn btn-primary' href='/cookzilla/recipe/new_review.php'>Post Review</a></h2>";
echo "<h2>Review:</h2>";

$reviews = mysql_query("SELECT * from review where recipeId = '$rid' order by wtime desc");
while ($row = mysql_fetch_array($reviews)) {
echo "<h4><a href=\"review.php?wid=".urlencode($row['reviewId'])."\">".$row['wtitle']."</a></h4>";
$un = $row['uname'];
$reviewer = mysql_query("SELECT nickname from users where uname = '$un'") or die('Could not select database' . mysql_error());;
echo "<h5 style=\"text-align:right;\"> rating:&nbsp".$row['wrating']."&nbsp/&nbsp5&nbsp&nbsp&nbsp&nbsp".$row['wtime']."</h5>";
// echo "<script type='text/javascript'>";  
// echo "alert('$un');";
// echo "</script>"; 
}
echo "</div>";

echo "<div  id = \"side\">";
echo "<h4>". mysql_fetch_array($visits)[0]."&nbsp&nbspvisits</h4>";
$tags = mysql_query("SELECT rtag FROM tag where recipeId = '$rid'" );
echo "<h4> Tags:&nbsp&nbsp</h4><h4><font color='red'>";
while ($row = mysql_fetch_array($tags)) {
  echo $row[0]."&nbsp&nbsp";
}
echo "</font></h4>";
echo "<h4> Related&nbsp&nbspRecipes:</h4>";
$related = mysql_query("SELECT recipe.recipeId, recipe.r_title from related, recipe where related.recipeId1 = '$rid' and related.recipeId2 = recipe.recipeId") or die('Query failed: ' . mysql_error());
while ($row = mysql_fetch_array($related)) {
  echo "<h4><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row[
  'r_title'] . "</a></h4>";
}

?>
<!--<a class="btn btn-primary" href="/cookzilla/recipe/new_review.php?rid=$rid">Post Recipe</a>-->
</div>  

      
   






      </body>
      </html>