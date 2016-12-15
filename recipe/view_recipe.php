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

      <div class="container inline" >
     <div class="col-xs-12  col-center-block" style="float: left">
     <a class="btn btn-primary" href="/cookzilla/recipe/new_recipe.php">Post Recipe</a>
     <div class="inline">

     <h3 class="form-signin-heading" style="float: left">All Recipes
     </h3>
     
  
</div>
   <div class="row">    
        <div class="col-xs-12">
        <div class="input-group">
                
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" id="kw"  placeholder="Search keyword">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="kwfilter()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
  </div>
  <div class="row">    
        <div class="col-xs-12">
        <div class="input-group">
                
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" id="tag" placeholder="Search tag: use comma to seperate">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="tagfilter()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
  </div>
  
  <div style="height:400px;overflow: auto;">
  <table class="table" id="recipe">
  
  <thead class="thead-inverse"><tr>
  <th width="350">Title</th>
  <th>Tags</th>
  <th>servings</th>
  <th><a href="view_recipe.php?sort=rating">Rating</a></th>
  <th><a href="view_recipe.php?sort=visits">Visits</a></th>
  <th>Arthur</th>
  <th><a href="view_recipe.php?sort=createdat">Created At</a></th>
  </tr></thead>
  <tbody>
  <?php 
  $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("cookzilla", $con);

if($_GET['sort'] == 'rating') {
    $result = mysql_query("SELECT * from recipe NATURAL JOIN review order by avg(wrating) desc
");
    while($row = mysql_fetch_array($result)){
      echo "<tr>";
    
    echo "<td class=\"title\"><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></td>";
    $arthur = mysql_query("SELECT nickname FROM users where uname = '$row[uname]'" );

    $tags = mysql_query("SELECT rtag FROM tag where recipeId = '$row[recipeId]'" );
    $tag_td = "<td class=\"tag\" >";
    while ($tag_row = mysql_fetch_array($tags)) {
      $tag_td = $tag_td . $tag_row['rtag'] . "&nbsp";
    }
    $tag_td ."</td>";
    echo $tag_td;

    $nos = mysql_query("SELECT num_of_serving FROM recipe where recipeId = '$row[recipeId]'" );
    $n = mysql_fetch_array ($nos)[0];
    echo "<td>"  . $n . "</td>";

    $rating = mysql_query("SELECT avg(wrating) as avg FROM review where recipeId = '$row[recipeId]'" );
    $r = mysql_fetch_array ($rating)[0];
    echo "<td>"  . round($r ,2) . " / 5</td>";

    $visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
    echo "<td>"  .mysql_fetch_array($visits)[0] . "</td>";

    echo "<td class=\"arthur\">" . mysql_fetch_array($arthur)[0] . "</td>";
    echo "<td class=\"time\">" . $row['rtime'] . "</td>";
    }
  } else if($_GET['sort'] == 'visits'){
    $result = mysql_query("SELECT recipe.recipeId, recipe.uname, recipe.r_title, recipe.num_of_serving, recipe.rtime from recipe, user_visited where recipe.recipeId = user_visited.recipeId order by count(*) desc

");
    while($row = mysql_fetch_array($result))
  {
    echo "<tr>";
    
    echo "<td class=\"title\"><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></td>";
    $arthur = mysql_query("SELECT nickname FROM users where uname = '$row[uname]'" );

    $tags = mysql_query("SELECT rtag FROM tag where recipeId = '$row[recipeId]'" );
    $tag_td = "<td class=\"tag\" >";
    while ($tag_row = mysql_fetch_array($tags)) {
      $tag_td = $tag_td . $tag_row['rtag'] . "&nbsp";
    }
    $tag_td ."</td>";
    echo $tag_td;

    $nos = mysql_query("SELECT num_of_serving FROM recipe where recipeId = '$row[recipeId]'" );
    $n = mysql_fetch_array ($nos)[0];
    echo "<td>"  . $n . "</td>";

    $rating = mysql_query("SELECT avg(wrating) as avg FROM review where recipeId = '$row[recipeId]'" );
    $r = mysql_fetch_array ($rating)[0];
    echo "<td>"  . round($r ,2) . " / 5</td>";

    $visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
    echo "<td>"  .mysql_fetch_array($visits)[0] . "</td>";

    echo "<td class=\"arthur\">" . mysql_fetch_array($arthur)[0] . "</td>";
    echo "<td class=\"time\">" . $row['rtime'] . "</td>";
    //echo "</tr>";

    //echo "<tr>";
    

    

    
    echo "</tr>";
}
  }else {

$result = mysql_query("SELECT * FROM recipe order by rtime desc");
while($row = mysql_fetch_array($result))
  {
    echo "<tr>";
    
    echo "<td class=\"title\"><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></td>";
    $arthur = mysql_query("SELECT nickname FROM users where uname = '$row[uname]'" );

    $tags = mysql_query("SELECT rtag FROM tag where recipeId = '$row[recipeId]'" );
    $tag_td = "<td class=\"tag\" >";
    while ($tag_row = mysql_fetch_array($tags)) {
      $tag_td = $tag_td . $tag_row['rtag'] . "&nbsp";
    }
    $tag_td ."</td>";
    echo $tag_td;

    $nos = mysql_query("SELECT num_of_serving FROM recipe where recipeId = '$row[recipeId]'" );
    $n = mysql_fetch_array ($nos)[0];
    echo "<td>"  . $n . "</td>";

    $rating = mysql_query("SELECT avg(wrating) as avg FROM review where recipeId = '$row[recipeId]'" );
    $r = mysql_fetch_array ($rating)[0];
    echo "<td>"  . round($r ,2) . " / 5</td>";

    $visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
    echo "<td>"  .mysql_fetch_array($visits)[0] . "</td>";

    echo "<td class=\"arthur\">" . mysql_fetch_array($arthur)[0] . "</td>";
    echo "<td class=\"time\">" . $row['rtime'] . "</td>";
    //echo "</tr>";

    //echo "<tr>";
    

    

    
    echo "</tr>";
}
    /*$images = mysql_query("SELECT image FROM recipe_img where recipeId = '$row[recipeId]'" );
    echo "<tr>";
    echo "<ul class=\"thumbnails\">";
    echo "<td colspan=\"4\">";
    //echo "<li class=\"span4\">";
    while ($img = mysql_fetch_array($images)) {
      //echo "<td width = \"33%\">";
      //echo "<li class=\"span4\">";
      echo "<a  class=\"thumbnail\">";
      echo "<img src='../".end(mysql_fetch_array($images))['image']."' >";
      echo "</a>";
      //echo "</li>";
      //echo "</td>";
    }*/
    
  }


  ?>
  </tbody>
  </table>
  </div>
     </div>
     </div>

     <div class="container inline" >
     <div class="col-xs-12  col-center-block" style="float: left">
     <h3 class="form-signin-heading">Latest Visited Recipes</h3>
     
   
  
  <div style="height:400px;overflow: auto;">
  <table class="table">
  <thead class="thead-inverse"><tr>
  <th width="350">Title</th>
  <th>Tags</th>
  <th>Servings</th>
  <th>Rating</th>
  <th>Visit Times</th>
  <th>Arthur</th>
  <th>Created At</th>
  </tr></thead>
  <tbody>

  
  <?php 
  $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);

$uname=$_SESSION['uname'];
$result = mysql_query("SELECT * FROM recipe where recipeId in (
select recipeId from user_visited where uname = '$uname' ) order by rtime desc limit 10") ;
while($row = mysql_fetch_array($result))
  {
    echo "<tr>";
    
    echo "<td class=\"title\"><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></td>";
    $arthur = mysql_query("SELECT nickname FROM users where uname = '$row[uname]'" );

    $tags = mysql_query("SELECT rtag FROM tag where recipeId = '$row[recipeId]'" );
    $tag_td = "<td class=\"tag\" >";
    while ($tag_row = mysql_fetch_array($tags)) {
      $tag_td = $tag_td . $tag_row['rtag'] . "&nbsp";
    }
    $tag_td ."</td>";
    echo $tag_td;

    $nos = mysql_query("SELECT num_of_serving FROM recipe where recipeId = '$row[recipeId]'" );
    $n = mysql_fetch_array ($nos)[0];
    echo "<td>"  . $n . "</td>";

    $rating = mysql_query("SELECT avg(wrating) as avg FROM review where recipeId = '$row[recipeId]'" );
    $r = mysql_fetch_array ($rating)[0];
    echo "<td>"  . round($r ,2) . " / 5</td>";

    $visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
    echo "<td>"  .mysql_fetch_array($visits)[0] . "</td>";

    echo "<td class=\"arthur\">" . mysql_fetch_array($arthur)[0] . "</td>";
    echo "<td class=\"time\">" . $row['rtime'] . "</td>";
    //echo "</tr>";

    //echo "<tr>";
    

    

    
    echo "</tr>";

    /*$images = mysql_query("SELECT image FROM recipe_img where recipeId = '$row[recipeId]'" );
    echo "<tr>";
    echo "<ul class=\"thumbnails\">";
    echo "<td colspan=\"4\">";
    //echo "<li class=\"span4\">";
    while ($img = mysql_fetch_array($images)) {
      //echo "<td width = \"33%\">";
      //echo "<li class=\"span4\">";
      echo "<a  class=\"thumbnail\">";
      echo "<img src='../".end(mysql_fetch_array($images))['image']."' >";
      echo "</a>";
      //echo "</li>";
      //echo "</td>";
    }*/
    
  }


  ?>
  </tbody>
  </table>
  </div>
     </div>
     </div>

     <div class="container inline" >
     <div class="col-xs-12  col-center-block" style="float: left">
     <h3 class="form-signin-heading">My Recipes</h3>
     
   
  
  <div style="height:400px;overflow: auto;">
  <table class="table">
  <thead class="thead-inverse"><tr>
  <th width="350">Title</th>
  <th>Tags</th>
  <th>Servings</th>
  <th>Rating</th>
  <th>Visit Times</th>
  <th>Arthur</th>
  <th>Created At</th>
  </tr></thead>
  <tbody>

  
  <?php 
  $con = mysql_connect("127.0.0.1","root",""); 
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("cookzilla", $con);

$uname=$_SESSION['uname'];
$result = mysql_query("SELECT * FROM recipe where uname = '$uname' order by rtime desc");
while($row = mysql_fetch_array($result))
  {
    echo "<tr>";
    
    echo "<td class=\"title\"><a href=\"recipe_detail.php?rid=".urlencode($row['recipeId'])."\">" . $row['r_title'] . "</a></td>";
    $arthur = mysql_query("SELECT nickname FROM users where uname = '$row[uname]'" );

    $tags = mysql_query("SELECT rtag FROM tag where recipeId = '$row[recipeId]'" );
    $tag_td = "<td class=\"tag\" >";
    while ($tag_row = mysql_fetch_array($tags)) {
      $tag_td = $tag_td . $tag_row['rtag'] . "&nbsp";
    }
    $tag_td ."</td>";
    echo $tag_td;

    $nos = mysql_query("SELECT num_of_serving FROM recipe where recipeId = '$row[recipeId]'" );
    $n = mysql_fetch_array ($nos)[0];
    echo "<td>"  . $n . "</td>";

    $rating = mysql_query("SELECT avg(wrating) as avg FROM review where recipeId = '$row[recipeId]'" );
    $r = mysql_fetch_array ($rating)[0];
    echo "<td>"  . round($r ,2) . " / 5</td>";

    $visits = mysql_query("SELECT count(*) FROM user_visited where recipeId = $row[recipeId]" );
    echo "<td>"  .mysql_fetch_array($visits)[0] . "</td>";

    echo "<td class=\"arthur\">" . mysql_fetch_array($arthur)[0] . "</td>";
    echo "<td class=\"time\">" . $row['rtime'] . "</td>";
    //echo "</tr>";

    //echo "<tr>";
    

    

    
    echo "</tr>";

    /*$images = mysql_query("SELECT image FROM recipe_img where recipeId = '$row[recipeId]'" );
    echo "<tr>";
    echo "<ul class=\"thumbnails\">";
    echo "<td colspan=\"4\">";
    //echo "<li class=\"span4\">";
    while ($img = mysql_fetch_array($images)) {
      //echo "<td width = \"33%\">";
      //echo "<li class=\"span4\">";
      echo "<a  class=\"thumbnail\">";
      echo "<img src='../".end(mysql_fetch_array($images))['image']."' >";
      echo "</a>";
      //echo "</li>";
      //echo "</td>";
    }*/
    
  }


  ?>
  </tbody>
  </table>
  </div>
     </div>
     </div>


      </body>
      <script type="text/javascript">
      
        function kwfilter() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("kw");
  filter = input.value.toUpperCase();
  table = document.getElementById("recipe");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    console.log(td);
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function myTrim(x) {
    return x.replace(/\s+/g,"");
}
function trim(str) {
  return str.replace(/(^\s+)|(\s+$)/g, "");
}
function tagfilter() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("tag");
      
      filter = input.value.toUpperCase();
      var inputs = filter.toString().split(",");
      console.log(inputs);
      tags = document.getElementsByClassName("tag");
    table = document.getElementById("recipe");
    tr = table.getElementsByTagName("tr");
    

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      console.log(td);
      if (td) {
      var match = true;
      for (j = 0; j < inputs.length; j++) {
        if (td.innerHTML.toUpperCase().indexOf($.trim(inputs[j])) == -1) {
          match = false;
          break;
        }
      }
      if (match) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
    }
    
  }

  function changeInput(slt) {
    switch (slt) {
      case "1": sortTable(document.getElementById("recipe"), 6, 1);
      case "2": sortTable(document.getElementById("recipe"), 6, -1);
      case "3": sortTable(document.getElementById("recipe"), 3, 1);
      case "4": sortTable(document.getElementById("recipe"), 3, -1);
      case "5": sortTable(document.getElementById("recipe"), 4, 1);
      case "6": sortTable(document.getElementById("recipe"), 4, -1);
    }
  }

  function sortTable(table, col, reverse) {
    var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;
    
    //reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
            * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                .localeCompare(b.cells[col].textContent.trim())
               );
    });
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
}
      </script>
      </html>
