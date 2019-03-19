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

// Trying to apply form insert

if (isset($_POST['Skicka'])) {
    //echo 'Skickat med formulär!';
    $customerNumber = filter_input(INPUT_POST, 'customerNumber', FILTER_SANITIZE_NUMBER_INT);
    $customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);
    $contactLastName = filter_input(INPUT_POST, 'contactLastName', FILTER_SANITIZE_STRING);
    $contactFirstName = filter_input(INPUT_POST, 'contactFirstName', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $addressLine1 = filter_input(INPUT_POST, 'addressLine1', FILTER_SANITIZE_STRING);
    $addressLine2 = filter_input(INPUT_POST, 'addressLine2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $salesRepEmployeeNumber = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_NUMBER_INT);
    $creditLimit = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_NUMBER_INT);

   
    $sql = "INSERT INTO customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES('$customerNumber', '$customerName', '$contactLastName', '$contactFirstName', '$phone', '$addressLine1', '$addressLine2', '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')";
    //echo $sql . '<br>'; (Mickes grej för att kolla varför inte formuläret fungerade)
    $stmt =$pdo->prepare($sql); 
    $stmt->execute();
}

//SELECT MAX(customerNumber) + 1 AS newCustomernumber FROM classicmodels.customers; (Mickes lösning till att fixa nytt customernumber)
/*
$customerNumber = 509;
$customerName = 'Paul McCartney Inc.';
$contactLastName = 'McCartney';
$contactFirstName = 'Paul';
$phone = '345345';
$addressLine1 = 'Paul Street';
$addressLine2 = 'McCartney House';
$city = 'London';
$state =
$postalCode = '33333';
$country = 'England';
$salesRepEmployeeNumber = NULL;
$creditLimit = NULL;

$sql = 'INSERT INTO customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES(:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['customerNumber' => $customerNumber, 'customerName' => $customerName, 'contactLastName' => $contactLastName, 'contactFirstName' => $contactFirstName, 'phone' => $phone, 'addressLine1' => $addressLine1, 'addressLine2' => $addressLine2, 'city' => $city, 'state' => $state, 'postalCode' => $postalCode, 'country' => $country, 'salesRepEmployeeNumber' => $salesRepEmployeeNumber, 'creditLimit' => $creditLimit]);
echo 'customer added';
*/

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

<h1>Skapa ny kund</h1>
<p><i>Fyll i fälten för att skapa ny kund</i></p>
<form method="POST" action="newcustomer.php">
        <input type="text" name="customerNumber"><caption><i> Kundnummer</i></caption><br>
        <input type="text" name="customerName"><caption><i> Namn på kund</i></caption><br>
        <input type="text" name="contactLastName"><caption><i> Kundkontakt efternamn</i></caption><br>
        <input type="text" name="contactFirstName"><caption><i> Kundkontakt förnamn</i></caption><br>
        <input type="text" name="phone"><caption><i> Mobil</i></caption><br>
        <input type="text" name="addressLine1"><caption><i> Adress 1</i></caption><br>
        <input type="text" name="addressLine2"><caption><i> Adress 2</i></caption><br>
        <input type="text" name="city"><caption><i> Stad</i></caption><br>
        <input type="text" name="state"><caption><i> Stat</i></caption><br>
        <input type="text" name="postalCode"><caption><i> Postnummer</i></caption><br>
        <input type="text" name="country"><caption><i> Land</i></caption><br>
        <input type="text" name="salesRepEmployeeNumber"><caption><i> Anst. nr. försäljningsrepresentant</i></caption><br>
        <input type="text" name="creditLimit"><caption><i> Kundkredit</i></caption><br><br>
        <input type="submit" name="Skicka" value="Skapa kund">   
</form>
<?php include 'custincl/customernavbar.php';?>
</body>
</html>