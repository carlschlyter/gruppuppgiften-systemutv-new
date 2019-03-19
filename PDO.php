
<?php

$host = 'localhost';
$db   = 'classicmodels';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
     $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
 /*class Database {
     private static $pdo = NULL;
     private static function connect() {
        $host = 'localhost';
        $db   = 'classicmodels';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
         $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
         try {
            static::$pdo = new PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
     }
     public static function pdo() {
         if(static::$pdo == NULL) {
            static::connect();
        }
         return static::$pdo;
     }

 }
 
 
 }*/
 ?>