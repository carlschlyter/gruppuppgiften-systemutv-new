<?php
include('PDO.php');
include('header.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <link type="text/css" href="CssBasic.css" rel="stylesheet" />

    <title>DreamTeam Update products</title>

</head>
<body>
 
<form action="delete2.php" method="POST">
    <input type="text" name="query">
    <input type="text" name="productname">
    <input type="submit" value="update" name="update">
</form>
</body>
</html>