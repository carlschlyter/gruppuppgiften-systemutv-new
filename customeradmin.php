<?php
$host = 'localhost';
$db = 'classicmodels';
$user = 'root';
$pass = 'Carlphp2019';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;
 dbname=$db;
 charset=$charset";

 try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Administrera kunder</h1>

<a href="newcustomer.php"><strong><i>Skapa ny kund</i></strong></a><br>
<a href="customers.php"><strong><i>Ta bort kund</i></strong></a><br> 
<a href="customers.php"><strong><i>Ändra kund</i></strong></a><br>
<a href="customersearch2.php"><strong><i>Sök kund</i></strong></a><br>
<a href="customers.php"><strong><i>Kunder startsida</i></strong></a>   

</body>
</html>