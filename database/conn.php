<?php
    //Development Connection
    //$host = '127.0.0.1';
    //$db = 'schoolpage_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    //Remote Database Connection
    $host = 'btoweyyxg5dkobaxmvo3-mysql.services.clever-cloud.com';
    $db = 'btoweyyxg5dkobaxmvo3';
    $user = 'uofhmymwfq9fetiu';
    $pass = 'r24sH3WII772ZJx1QhSZ';
    $charset = 'utf8mb4';



    $dsn = "mysql:host=$host; dbname=$db;charset=$charset";

    try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);


?>

