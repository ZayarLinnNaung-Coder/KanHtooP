<?php
    $x = $_COOKIE['db_name'];
    $dbName = "mysql:host=localhost;dbname=".$x;

    $pdo_user = new PDO($dbName,"root","");
?>