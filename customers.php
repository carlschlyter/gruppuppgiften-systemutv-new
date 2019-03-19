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

<?php include 'incl/header.php';?>

<h1>Kunder</h1>
<p><i>(De 20 senast inlagda)<br>Kundnamn - Kundnummer - Land</i></p>
<?php
$stmt = $pdo->query("SELECT * FROM customers order by customerNumber DESC LIMIT 20");
    
    while ($row = $stmt->fetch())
{
    echo $row['customerName'] . " - " .  $row['customerNumber'] . " - " . $row['country'] .  "<br>";
}    
?>
<?php include 'incl/customernavbar.php';?>
</body>
</html>

