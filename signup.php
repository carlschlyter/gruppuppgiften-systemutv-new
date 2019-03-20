<?php

?>
<!DOCTYPE html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div id="container">
        <form action="register.php" method="post">
            <label for="username">Username</br>
            <input type="text" name="username"> </label></br>
            <label for="password">Password</br>
            <input type="password" name="password"></label></br>
            
            <label for="email">Email</br>
            <input type="email" name="email"></label></br>
      
            <label for="country">Country</br>
            <input type="text" name="country"></label></br>
            <label for="city">City</br>
            <input type="text" name="city"></label></br>
            <br>
            <input type="submit" name="submit" value="Submit">
            
            </form>




    </div>

</body>
</html>