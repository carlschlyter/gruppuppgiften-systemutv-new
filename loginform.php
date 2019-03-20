<?php
?>
<!DOCTYPE html>
<head>
  <title>Login page</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<div id="container"> 
  <form action="login.php" method="post">
  <label for="email">Email:&nbsp &nbsp  &nbsp   &nbsp
  <input type="text" name="email" placeholder="e.g. mail@mail.com"></label> </br></br>
  <label for="password">Password:&nbsp 
  <input type="password"  name="password" placeholder="Enter your password!" value="<?php
echo $_COOKIE['password']; ?>"></label> </br></br></br>
  <div class="lower">
  <div class="inline-field"><label for="checkbox"> <input type="checkbox" name="remember"
  <?php if(isset($_COOKIE['user'])) {
		echo 'checked="checked"';
	}
	else {
		echo '';
	}
	?>>Keep me logged in</label>
  <input type="submit" name="login" value="Login">
</div>
  </br></br>
  <hr>
  <p>No account? <a href="signup.php">Create one!</a></p></br></br></br>
  <div id="rights">All rights reserved Medieinstitutet 2019&copy;</p></div>

</div><!--/ lower-->
  </form>
  
  </div>
  </body>
  </html>
