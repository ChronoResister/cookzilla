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


     <div class="container">
  <form class="form-signin" method="POST" action="/cookzilla/joinGroup2.php">
    <h3 class="form-signin-heading">Join Exsiting Groups</h3>
    <hr>
    <input type="hidden" name="csrfmiddlewaretoken" value="ATJpOoTKlFZIZKALOpdr6BvmjWuLNmECMKelyt0vqOt93EPBkPydgpa0nwoLg8uZ">
    <div  id = "profile"><input id="profile" name="gid" placeholder="GroupID" type="number" required="" class="form-control"></div>
    
    
    <br>    

    <button class="btn btn-primary" type="submit">Join</button>
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

