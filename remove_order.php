<?php
$host = 'localhost';
$db   = 'classicmodels';
$user = 'Amro1337';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



if(isset($_POST['Remove'])){
    $orderNumber = filter_input(INPUT_POST, 'orderNumber', FILTER_SANITIZE_STRING);
    $sql = "DELETE FROM classicmodels.orders WHERE orderNumber = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$orderNumber]);
}
?>

<!DOCTYPE html>
<head>
  <title>remove</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div id="container">
        <form action="remove_order.php" method="post">
            <label for="orderNumber">Order number</br>
            <input type="text" name="orderNumber"> </label></br>
        
      
            
            
            <br>
            <input type="submit" name="Remove" value="Remove">
            
            </form>




    </div>

</body>
</html>
