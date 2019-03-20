<?php
include('PDO.php');
include('header.php');

if(isset($_POST['update'])){
    $id =  filter_input(INPUT_POST, 'query', FILTER_SANITIZE_STRING);
    $productCode = filter_input(INPUT_POST, 'productname', FILTER_SANITIZE_STRING);
    $sql = "UPDATE classicmodels.products SET productName = ? WHERE productCode=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productCode, $id]);
}
if($stmt){
    echo 'ok';
}else{
    echo 'fel';
}