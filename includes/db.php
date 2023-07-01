<?php 
try{
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'cms');
    
    $pdo = new PDO("mysql:host=" .  DB_HOST .";dbname=" . DB_NAME,  DB_USER , DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
   echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}

?>