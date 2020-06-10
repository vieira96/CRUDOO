<?php
$dbName = 'test';
$dbHost = 'localhost';
$dbuser = 'root';
$dbPass = 'newpassword';

try{
    $pdo = new PDO("mysql:dbname=".$dbName.";host=".$dbHost, $dbuser, $dbPass);
} catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
}