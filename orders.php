<?php
include_once('dbconn.php');


class Order {

    public $orderNumber;
    public $pdo;


    function __construct() {
        
        
        $this->pdo = $GLOBALS['pdo'];

    }
}
    
    

$order_details = new Order;


if(isset($_GET['orderNumber'])){
$orderNumber = filter_input(INPUT_GET, 'orderNumber', FILTER_SANITIZE_STRING);
$sql = ("SELECT orderDate, requiredDate, shippedDate, status, comments FROM classicmodels.orders WHERE orderNumber =?");
$stmt = $pdo->prepare($sql);
$stmt->execute([$orderNumber]);

$orders = $stmt->fetch(PDO::FETCH_NUM);
if($orders){
    $orderDate = $orders[0];
    $requiredDate = $orders[1];
    $shippedDate = $orders[2];
    $status = $orders[3];
    $comments = $orders[4];}
    if(!$comments){
        $comments = 'No comments on that order.';
    }
}
if(isset($_GET['clean'])){
    header("Location: orders.php");
}

?>









<!DOCTYPE html>
<head>
  <title>Order history</title>
  <link rel="stylesheet" href="orders.css">
</head>
<body>
<div id="container"> 
<div id="orderhistory"><h2>Orders history</h2></div><br>
  <form action="orders.php" method="get">
  
  <label for="orderNumber"><?php echo "<span style='font-weight:bold;font-size:15px;color:rgb(53, 86, 148);'>Enter a product ID: </span>";?>
  <input type="text" name="orderNumber"></label>
  <input type="submit" name="search" value="Search"><br><br>
  <input type="submit" name="clean" value="Clear result"><br><br>

  <div>
  <?php if(isset($orderNumber)) {
      echo "<h2 style='color:#2f52a3'>" ."Detailed Information</h2>";
      echo "<hr>";
    echo "<h4>Order date:" . "&nbsp&nbsp" . " $orderDate</h4>";
    echo "<h4>Requeired date: " . "&nbsp&nbsp" . " $requiredDate</h4>";
    echo "<h4>Shipped date: " . "&nbsp&nbsp" . " $shippedDate </h4>";
    echo "<h4> Status:";
     if($status == 'Cancelled'){
    echo "<span style='color:red'>" . "&nbsp&nbsp" . "$status </span> </h4>";}
    else{ echo " <span style='color:green'>" . "&nbsp&nbsp". "$status </h4>";}
     echo "<h4>Comments: $comments </h4></br>";
  }
    ?>
   </div>
  </form>
  
  </div>
  </body>
  </html>
