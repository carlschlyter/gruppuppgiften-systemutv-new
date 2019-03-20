<?php
ob_start();
include_once('config.php');
include_once('dbconf.php');
include_once('functions.php');

session_start();

class User {
    public $pdo;
    public $email;
    public $password;
    public $remember;



    function __construct() {
        $this->pdo = $GLOBALS['pdo'];		
        $this->email =  $_POST['email'] ?? '';
        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $this->password = $_POST['password'] ?? '';
        $this->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            }	
    public function login($email, $password) {

            $stmt = $this->pdo->prepare("SELECT username FROM classicmodels.users WHERE email = ? AND pwd = ? ;");
            $stmt->execute(array($email, $password));
            $rowcount = $stmt->rowCount();
            $userLoggedIn = ($rowcount = 1);
                if ($userLoggedIn) {
                 $data = $stmt->fetchColumn();
                
                if($data){
                    $_SESSION['username'] = $data;
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['last_login'] = time();
                    return TRUE;
                    }
                }
            }
            
    
}

$new_user = new User;


if(request_is_post() && isset($_POST['login'])){

if($new_user->login($new_user->email, $new_user->password)){
    after_successful_login();
}


if(is_logged_in()){
    confirm_user_logged_in();
}

if(is_session_valid()){

        confirm_session_is_valid();
        echo "Du är inloggad som: $_SESSION[username] <br>";
        echo "<form action='logout.php' method='post'> </br>";
        echo "<input type='submit' style='background-color:rgb(53, 86, 148); color:white' name='logout' value='Logout'>";
        echo "</form>";

}else{
        confirm_user_logged_in();
        
}
}

?>