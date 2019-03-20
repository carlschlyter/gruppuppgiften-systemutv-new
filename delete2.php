<?php
include('PDO.php');
include('header.php');

if (isset($_POST['query'])){
    $id = $_POST['query'];
}else{
    $id = '';
}


//getting id of the data from url
$id = filter_input(INPUT_POST, 'query', FILTER_SANITIZE_STRING);
//deleting the row from table
$sql = "DELETE FROM classicmodels.products WHERE productCode=:productCode";
$query = $pdo->prepare($sql);
$query->bindValue(':productCode', $id);
$query->execute();

?>