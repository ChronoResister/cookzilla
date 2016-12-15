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
      

    <div class="center-block" style="width:600px">
    <?php
    $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
date_default_timezone_set('US/Eastern');

mysql_select_db("cookzilla", $con);
$erid = $_GET["erid"];



$result = mysql_query("SELECT er.*, u.nickname FROM event_report er, users u where er.erId = '$erid.' and u.uname = er.uname") or die('Query failed: ' . mysql_error());
$row = mysql_fetch_array($result);  
//$_SESSION['rtitle'] = $row["r_title"];
echo "<div  id = \"content\">";
echo "<div style='text-align:center;'><h2 class='col-center-block'>". $row["ertitle"]. "</div></h2>";

echo "<div style='text-align:right;'><h4> <font color='gray'>Arthur:&nbsp&nbsp" . $row['nickname'] ."</font></h4></div>";
echo "<div style='text-align:right;'><h4> <font color='gray'>" . $row['ertime'] ."</font></h4></div>";


  



echo "<pre>". $row['rtext'] . "</pre>";

$images = mysql_query("SELECT image from report_img where erId = '$erid' ");

while($row = mysql_fetch_array($images)) {
    
    echo "<img src='".$row[0]."' class='img'>";
}






?>
<!--<a class="btn btn-primary" href="/cookzilla/recipe/new_review.php?rid=$rid">Post Recipe</a>-->
</div>  

       






      </body>
      </html>