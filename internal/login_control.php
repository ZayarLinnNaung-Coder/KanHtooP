<?php
    require_once ("../utility/pdo.php");
    session_start();
    $username = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE 1";
    $result = $pdo->prepare($sql);
    $result->execute();
    $cred = $result->fetchAll(PDO::FETCH_ASSOC);

    $i = 0;
    $db_name = "";
    foreach($cred as $d){
        if(strcmp($username,$d['username'])==0 and strcmp($password,$d['password'])==0){
            $i++;
            $db_name = $d['db_name'];
        }
    }
    if($i==1){
        setcookie("db_name",$db_name,time()+60*60*24*30,"/");
        echo $_COOKIE['db_name'];
//        print_r($_SESSION);
        header("location: ../admin.php");
    }else{
        header("location: ../index.php?stage=fail");
    }
?>
