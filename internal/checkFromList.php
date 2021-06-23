<?php

require_once ("../utility/pdo.php");
require_once ("../utility/pdo_user.php");

//*********************************************
//DRAW OUT CUSTOMER LIST
//*********************************************
$sqlOne = "SELECT * FROM checker WHERE 1";
$result = $pdo_user->prepare($sqlOne);
$result->execute();
$userData = $result->fetchAll();

//*********************************************
//DRAW OUT LOTTERY LIST
//*********************************************
$sqlTwo = "SELECT * FROM lottery_list WHERE 1";
$result = $pdo->prepare($sqlTwo);
$result->execute();
$lotteryList = $result->fetchAll();

//echo "<pre>";
//print_r($lotteryList);

//****************************************
// INSERT TO WINNER TABLE
//****************************************
$sqlThree = "DELETE FROM WINNER WHERE 1";
$result = $pdo_user->prepare($sqlThree)->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/login.css">
    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>ကံထူးပြီ</title>
    <style>
        @media screen and (max-width: 450px){
            table{
                width: 180% !important;
            }
        }
        .nav .brand h5{
            font-size: 15px;
        }
        .nav .links a{
            font-size: 13px;
            display: inline-block;
            height: 30px;
            /*background-color: red;*/
        }
        .card{
            margin-top: 60px;
            height: 90vh;
            /*overflow: auto;*/
        }
        .card .card-body{
            overflow-y: scroll;
            /*background-color: red;*/
        }

    </style>
</head>
<body>
<body>

<header>
    <div class="nav">
        <div class="brand">
            <img src="../img/logo.svg" alt="">
            <h5><b>ကံထူးပြီ</b></h5>
        </div>
        <div class="responsive-icon show-icon" id="show-icon">
            <img src="../img/menu.svg" alt="">
        </div>
        <div class="responsive-icon hide-icon" id="hide-icon">
            <img src="../img/cancel.svg" alt="">
        </div>
        <div class="links" id="links">
            <a href="../admin.php" >ထီတိုက်ရန်</a>
            <a href="../register.php">စာရင်းသွင်းမည်</a>
            <a href="../customer_list.php">၀ယ်ယူသူစာရင်း</a>
            <a href="#" class="active">ကံထူးသူစာရင်း</a>
        </div>
    </div>
</header>
<div class="container">
    <div class="row w-100">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-light">ကံထူးသူစာရင်း</div>
                <div class="card-body">
                    <table class="table table-responsive table-striped text-center">
                        <tr>
                            <th>စဉ်</th>
                            <th>နာမည်</th>
                            <th>ဖုန်း</th>
                            <th class="coupon-td">ထီလက်မှတ်</th>
                            <th class="sm-td">ဆုငွေ</th>
                            <th>လိပ်စာ</th>
                            <th>ရက်စွဲ</th>
                        </tr>
            <?php
            $i=1;
            foreach ($userData as $UD){
                $d = json_decode($UD['alphabat'])." ".$UD['lotteryNumber'];
                foreach ($lotteryList as $lottery){
                    $l = json_decode($lottery['alphabat'])." ".$lottery['number'];

                    if(strcmp($d,$l) == 0){
                            $name = json_decode($UD['name']);
                            $phone = json_decode($UD['phone']);
                            $luckyNum = $l;
                            $prize = json_decode($lottery['prize']);
                            $address = json_decode($UD['address']);
                            $date = $UD['date'];
            ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $name?></td>
                            <td><?php echo $phone?></td>
                            <td><?php echo $luckyNum?></td>
                            <td><?php echo $prize ?></td>
                            <td><?php echo $address ?></td>
                            <td><?php echo $date ?></td>
                        </tr>
            <?php
                            $sqlFour = "INSERT INTO winner (name, phone, luckyNum, prize, address, date) VALUES (?,?,?,?,?,?)";

                            $result = $pdo_user->prepare($sqlFour);
                            $result->execute([$UD['name'],$UD['phone'],$l,$lottery['prize'],$UD['address'],$UD['date']]);

                        }
                    }
                }
            $sqlFive = "SELECT * FROM WINNER WHERE 1";
            $x = $pdo_user->prepare($sqlFive);
            $x->execute();
            $y = $x->fetchAll();
            if($y){
            }else{?>
                    <tr>
                        <td colspan="7"><?php echo "<h3>ကံထူးသူမရှိပါ</h3>"?></td>
                    </tr>
                <?php
            }
            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
</body>
</html>

