<?php 
   //$host = '127.0.0.1';
    //$db = 'fanclub_db';
   //$user = 'root';
   // $pass = '';
   //$charset = 'utf8mb4';


    $host = 'bl9yovwrxq4r0tx52rca-mysql.services.clever-cloud.com';
    $db = 'bl9yovwrxq4r0tx52rca';
    $user = 'uit2ipj3ihijcpjq';
   $pass = 'nILF8jlauUQ6UCeZyYwy';
    $charset = 'utf8mb4';



    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOexception $e) {
        throw new PDOexception($e->getmessage());
    }

    require_once'crud.php';
    require_once'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);
    $user->insertUser(" admin","password");

?>