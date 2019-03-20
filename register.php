<?php
include_once('dbconf.php');
class Registerations {

    public $username;
    public $email;
    public $password;
    public $country;
    public $city;

    function __construct() {		
        $this->email =  $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';
        $this->username = $_POST['username'] ?? '';
        $this->country = $_POST['country'] ?? '';
        $this->city = $_POST['city'] ?? '';

        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $this->username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $this->country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING); 
        $this->city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
            }	

    
}

$new_register = new Registerations;
if(isset($_POST['submit'])){
$sql = "INSERT INTO classicmodels.users (username, email, pwd) values (?,?,?);";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($new_register->username, $new_register->email, $new_register->password));
 if($stmt) {

    echo "Succsess";
 } else {
     echo 'err';
 }
}
