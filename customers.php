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

<h1>Kunder</h1>
<?php
$stmt = $pdo->query("SELECT * FROM customers order by customerName limit 20");
    
    while ($row = $stmt->fetch())
{
    echo $row['customerNumber'] . " - " . $row['customerName'] . " - " .  $row['country'] .  "<br>";
}    
?>
<br>
<a href="customersearch.php"><strong><i>Sök kunder</i></strong></a>

<!-- <form action="customersearch.php" method="get">
        <input type="text" name="customer">
        <input type="submit" value="Search">   
</form> -->

</body>
</html>

