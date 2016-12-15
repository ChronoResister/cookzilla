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


     <div class="container">
  <form class="form-signin" method="POST" action="createGroup2.php">
    <h3 class="form-signin-heading">Create New Group</h3>
    <hr>
    <input type="hidden" name="csrfmiddlewaretoken" value="ATJpOoTKlFZIZKALOpdr6BvmjWuLNmECMKelyt0vqOt93EPBkPydgpa0nwoLg8uZ">
    <div  id = "profile"><input id="profile" name="gname" placeholder="GroupName" type="text" required="" class="form-control"></div>
    
    
    <br>    

    <button class="btn btn-primary" type="submit">Create</button>
 <!--   
     <form class="form-signin" method="POST" action="/accounts/login/">
    <h3 class="form-signin-heading">Sign In</h3>
    <hr>
    <input type="hidden" name="csrfmiddlewaretoken" value="rXFdSRXruxzUciyOFoXUWPdYKK2VjNKZDOa9CW4czG3lgcNEbOiG6DSCOkWVMzAm">
    <div class="form-group"><input autofocus="autofocus" id="id_login" name="login" placeholder="User Id" type="text" required="" class="form-control"></div>
    <div class="form-group"><input id="id_password" name="password" placeholder="Password" type="password" required="" class="form-control"></div>
    <label class="form-group"><input id="id_remember" name="remember" type="checkbox">Remember Me</label>
    <div class="form-group">
      
      <button class="btn btn-primary" type="submit">Sign In</button>
      
    </div>
    
      <hr>
      
    
  </form>
  -->



        </ul>
      </div>
    
  </form>
</div>
     </body>

