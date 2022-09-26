<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "dashboard";

try{
    $conn = new PDO("mysql:host=$hostname; dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Uspjesno spojeno na Bazu  Podataka";
   }

catch(PDOException $e)
    {
    echo "konekcija neuspjela!!!" .$e->getMessage();
    }


?>