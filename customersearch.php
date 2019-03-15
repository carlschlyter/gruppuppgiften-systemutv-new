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
//    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // from 2
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

<h1>Sökresultat kunder</h1>
<form action="customersearch.php" method="get">
        <input type="text" name="customer">
        <input type="submit" value="Search">   
</form>
<br>
<?php
if (isset($_GET['customer'])) {
    $search = filter_input(INPUT_GET, 'customer', FILTER_SANITIZE_STRING);    

//    $search = '%' . $_GET['customer'] . '%';
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE customerNumber = $search");
    $stmt->execute([$search]);

    if ($row = $stmt->fetch()) {
//        print_r($row);
        echo "<br>" . "<br>" . $row['customerNumber'] . " - " . $row['customerName'] . " - " .  $row['country'] .  "<br>";
    } else {
        echo 'Det finns ingen kund med det numret.' . '<br>';
    }
 } else {
     echo 'Ingen kund vald.' . '<br>';
}

//$customerNumber = '242';  

?>
<br>
<a href="customers.php"><strong><i>Kunder Startsida</i></strong></a>

<?php


?>
</body>
</html>