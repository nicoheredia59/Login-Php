<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "login_php";

    try {
        $conn = new PDO("mysql:host=$server; dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error:" .$e->getMessage();
    }
