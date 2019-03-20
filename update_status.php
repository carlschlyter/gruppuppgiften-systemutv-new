<?php
require_once('dbconf.php');




if(isset($_POST['Change'])){
    $status =  filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $orderNumber = filter_input(INPUT_POST, 'orderNumber', FILTER_SANITIZE_STRING);
    $sql = "UPDATE classicmodels.orders SET status = ? WHERE orderNumber=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$status, $orderNumber]);
}
if($stmt){
    echo 'ok';
}else{
    echo 'fel';
}

?>
<!DOCTYPE html>
<head>
  <title>change</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div id="container">
        <form action="php.php" method="post">
            <label for="orderNumber">Order number</br>
            <input type="text" name="orderNumber"> </label></br>
        
      
            <label for="status">Status</br>
            <input type="text" name="status"></label></br>
            
            <br>
            <input type="submit" name="Change" value="Change">
            
            </form>




    </div>

</body>
</html>
