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
      <div class="center-block" style="width:600px">
      <?php 
       
    $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("cookzilla", $con);
$wid = $_GET["wid"];


$review =  mysql_query("SELECT u.nickname, r.r_title, w.wtitle, w.wrating, w.wtext, w.wsuggestion, w.wtime FROM review w,recipe r,users u where w.reviewId = '$wid' and w.recipeId = r.recipeId and w.uname = u.uname") or die('Query failed: ' . mysql_error());

$row = mysql_fetch_array($review);  

echo "<h3>Recipe&nbspTitle:&nbsp&nbsp&nbsp" . $row['r_title'] ."</h3>";
echo "<h3>Review&nbspTitle:&nbsp&nbsp&nbsp" . $row['wtitle'] ."</h3>";
$star = "";
for ($x = 0; $x < intval($row['wrating']); $x++) {
  $star = $star . "⭐️";
}
echo "<h4 style='text-align:right;'>Rating:&nbsp&nbsp&nbsp" . $star ."</h4>";
echo "<h4 style='text-align:right;'>Author:&nbsp&nbsp&nbsp" . $row['nickname'] ."</h4>";
echo "<h4 style='text-align:right;'>" . $row['wtime'] ."</h4>";
echo "<h4>Suggestion:</h4>";
echo "<pre>" . $row['wsuggestion'] ."</pre>";
echo "<h4>Review:</h4>";
echo "<pre>" . $row['wtext'] ."</pre>";

$images = mysql_query("SELECT image from review_img where reviewId = '$wid'") or die('Query failed: ' . mysql_error());
while($row = mysql_fetch_array($images)) {
    
    echo "<img src='".$row[0]."' class='img' width='600'>";
}
      ?>

    
    
<!--<a class="btn btn-primary" href="/cookzilla/recipe/new_review.php?rid=$rid">Post Recipe</a>-->


      
   





      </div>
      </body>
      </html>