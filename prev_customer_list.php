<?php
require_once ("utility/pdo_user.php");

$sql = "SELECT * FROM PREV WHERE 1 ORDER BY ID DESC";
$sqlTwo = "SELECT SUM(total) as tt from PREV";

$result = $pdo_user->prepare($sql);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

$result2 = $pdo_user->prepare($sqlTwo);
$result2->execute();
$dataTwo = $result2->fetch();
$tt = $dataTwo['tt'];
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
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>ကံထူးပြီ</title>
    <style>
        @media screen and (max-width: 780px){
            .tb-heading,.data{
                width: 150% !important;
            }
        }@media screen and (max-width: 450px){
            .tb-heading,.data{
                width: 265% !important;
            }
        }@media screen and (max-width: 450px){
            .tb-heading,.data{
                width: 300% !important;
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
        .row{
            margin-top: 60px;
        }
        .tb{
            height: 80vh;
            overflow: scroll;
            width: 100%;
        }
        .tb-heading{
            width: 100%;
            border-bottom: 1px solid gray;
        }
        .tb-heading div{
            padding: 5px;
        }
        .data:nth-child(even){
            background-color: #f3f3f3;
        }
        .data div{
            padding: 5px;
        }
        .tb .one{
            width: 4%;
        }
        .tb .two{
            width: 12%;
        }
        .tb .three,.tb .four, .tb .five, .tb .nine{
            width: 10%;
        }
        .tb .six{
            width: 23%;
            /*70*/
        }
        .tb .seven{
            width: 10%;
        }
        .tb .eight{
            width: 8%;
        }
        .month{
            width: 35px;
            height: 35px;
            text-decoration: none;
            background-color: red;
            border-radius: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: fixed;
            bottom: 20px;
            right: 20px;
            box-shadow: 0 0 5px 2px #000;
            font-size: 25px;
        }
    </style>
</head>
<body>
<a href="customer_list.php" class="month"><i class="fas fa-caret-right"></i></a>
<header>
    <div class="nav">
        <div class="brand">
            <img src="img/logo.svg" alt="">
            <h5><b>ကံထူးပြီ</b></h5>
        </div>
        <div class="responsive-icon show-icon" id="show-icon">
            <img src="img/menu.svg" alt="">
        </div>
        <div class="responsive-icon hide-icon" id="hide-icon">
            <img src="img/cancel.svg" alt="">
        </div>
        <div class="links" id="links">
            <a href="admin.php">ထီတိုက်ရန်</a>
            <a href="register.php">စာရင်းသွင်းမည်</a>
            <a href="#" class="active">၀ယ်ယူသူစာရင်း</a>
            <a href="internal/checkFromList.php" disabled="">ကံထူးသူစာရင်း</a>
        </div>
    </div>
</header>
<div class="container">
    <div class="row w-100">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                    <?php
                    // Date Calculation
                    date_default_timezone_set("Asia/Yangon");
                    $currentMonth = date("M-Y");
                    $previousMonth = date("M-Y",strtotime("-1 months",strtotime($currentMonth)));
                    ?>
                    <div><h4><?php echo $previousMonth?></h4></div>
                    <div class="btn btn-sm bg-primary text-light py-2 px-1">ရောင်းရငွေ <?php
                        if($tt)
                            echo $tt;
                        else
                            echo 0;
                        ?> ကျပ်</div>
                </div>
            </div>
            <div class="tb">
                <div class="tb-heading d-flex">
                    <div class="one">စဉ်</div>
                    <div class="two">အမည်</div>
                    <div class="three">ဖုန်းနံပါတ်</div>
                    <div class="four">ထီလက်မှတ် (မှ)</div>
                    <div class="five">ထီလက်မှတ် (အထိ)</div>
                    <div class="six">လိပ်စာ</div>
                    <div class="seven">တစ်စောင်နှုန်း</div>
                    <div class="eight">စုစုပေါင်း</div>
                    <div class="nine">ရက်စွဲ</div>
                </div>
                <div class="tb-data">

                    <?php
                    $i = 1;
                    foreach ($data as $d){
                        ?>

                        <div class="data d-flex">
                            <div class="one"><?php echo $i++ ?></div>
                            <div class="two"><?php echo json_decode($d['name']) ?></div>
                            <div class="three"><?php echo json_decode($d['phone']) ?></div>
                            <div class="four"><?php echo json_decode($d['lotteryNum_from']) ?></div>
                            <div class="five"><?php echo json_decode($d['lotteryNum_to']) ?></div>
                            <div class="six"><?php echo json_decode($d['address']) ?></div>
                            <div class="seven"><?php echo $d['cpo'] ?></div>
                            <div class="eight"><?php echo $d['total'] ?></div>
                            <div class="nine"><?php echo $d['date'] ?></div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
</body>
</html>
