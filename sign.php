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
              <a class="btn btn-primary" href="/cookzilla/sign.php">Sign up</a>
              <a class="btn btn-default" href="/cookzilla/sign.php">Sign in</a>
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
  <form class="form-signin" method="POST" action="/accounts/signup/">
    <h3 class="form-signin-heading">Sign Up</h3>
    <hr>
    <input type="hidden" name="csrfmiddlewaretoken" value="ATJpOoTKlFZIZKALOpdr6BvmjWuLNmECMKelyt0vqOt93EPBkPydgpa0nwoLg8uZ">
    <div class="form-group"><input autofocus="autofocus" id="id_username" maxlength="150" minlength="1" name="username" placeholder="Email address" type="text" required="" class="form-control"></div>
    <div class="form-group"><input id="id_email" name="email" placeholder="Nickname" type="email" required="" class="form-control"></div>
    <div class="form-group"><input id="id_password1" name="password1" placeholder="Password" type="password" required="" class="form-control"></div>
    
    
    
    
    <button class="btn btn-primary" type="submit">Sign Up</button>
    
     <form class="form-signin" method="POST" action="/accounts/login/">
    <h3 class="form-signin-heading">Sign In</h3>
    <hr>
    <input type="hidden" name="csrfmiddlewaretoken" value="rXFdSRXruxzUciyOFoXUWPdYKK2VjNKZDOa9CW4czG3lgcNEbOiG6DSCOkWVMzAm">
    <div class="form-group"><input autofocus="autofocus" id="id_login" name="login" placeholder="Email address" type="text" required="" class="form-control"></div>
    <div class="form-group"><input id="id_password" name="password" placeholder="Password" type="password" required="" class="form-control"></div>
    <label class="form-group"><input id="id_remember" name="remember" type="checkbox">Remember Me</label>
    <div class="form-group">
      
      <button class="btn btn-primary" type="submit">Sign In</button>
      
    </div>
    
      <hr>
      
    
  </form>
          



        </ul>
      </div>
    
  </form>
</div>
     </body>
