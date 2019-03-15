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

<h1>Sök kunder</h1>
<p><i>Sök hela eller delar av namnet på kund</i></p>
<form action="customersearch2.php" method="GET">
        <input type="text" name="customer">
        <input type="submit" value="Search">   
</form>
<p><i>Kundnamn - Kundnummer - Land</i></p>
<?php
if(isset($_GET['customer'])){
    $search = filter_input(INPUT_GET, 'customer', FILTER_SANITIZE_STRING);
    //echo $_GET['customer'];

    $search = '%' . $_GET['customer'] . '%';
    $sql = 'SELECT * FROM customers WHERE customerName LIKE ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$search]);

    if($posts = $stmt->fetchAll()){

        foreach($posts as $post){
            echo $post->customerName . ' - ' . $post->customerNumber . ' - ' . $post->country . '<br>';
        }

    } else {
        echo 'Det finns ingen kund med det namnet.' . '<br>';
    }
       
    } else {
        echo 'Ingen kund vald.' . '<br>';
   }

?>
<br>
<a href="customers.php"><strong><i>Kunder Startsida</i></strong></a>
</body>
</html>

