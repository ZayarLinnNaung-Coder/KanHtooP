<?php
    require_once ("../utility/pdo.php");
    $sql = "SELECT * FROM lottery_list";
    $res = $pdo->prepare($sql);
    $res->execute();
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
//    echo "<pre>";
//    print_r($data);
    $alphabatArr = array("က","ခ","ဂ‌","ဃ","င","စ","ဆ","ဇ","ဈ","ည","ဋ","ဌ","ဍ","ဎ","ဏ","တ","ထ","ဒ","ဓ","န","ပ","ဖ","ဗ","ဘ","မ","ယ","ရ","လ","၀","သ","ဟ","ဠ","အ","ကက","ကခ","ကဂ‌","ကဃ","ကင","ကစ","ကဆ","ကဇ","ကဈ","ကည","ကဋ","ကဌ","ကဍ","ကဎ","ကဏ","ကတ","ကထ","ကဒ","ကဓ","ကန","ကပ","ကဖ","ကဗ","ကဘ","ကမ","ကယ","ကရ","ကလ","က၀","ကသ","ကဟ","ကဠ","ကအ");
//    echo json_encode('က');
    function checkMe($x, $y){
        $myNum = str_replace("\u200c","",json_encode($x));
        $luckyNum = $y;
        return (strcmp($myNum,$luckyNum)==0 )? true:false;
    }
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
        .card{
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
<div class="container">
    <div class="row w-100">
        <div class="col-12">
            <a href="../admin.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-caret-left"></i> &nbsp;နောက်သို့</a>
            <div class="card">
                <div class="card-header bg-dark text-light">ကံထူးသူစာရင်း</div>
                <div class="card-body">
                    <table class="table table-responsive table-striped text-center">
                        <tr>
                            <th>စဉ်</th>
                            <th class="coupon-td">ထီလက်မှတ်</th>
                            <th class="sm-td">ဆုငွေ</th>
                        </tr>
                        <?php
                            function createTr($i,$luckyLottery, $prize){
                                ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td class="coupon-td"><?php echo $luckyLottery ?></td>
                                    <td class="sm-td"><?php echo json_decode($prize) ?></td>
                                </tr>
                        <?php
                            }
                            if(isset($_POST['checkFormOne'])){
                                $fromAlphabat = $_POST["fromAlphabatOne"];
                                $toAlphabat = $_POST["toAlphabatOne"];
                                $number = $_POST["numberOne"];
                                $j = 1;
                                for ($i=$fromAlphabat; $i<=$toAlphabat; $i++){
                                    $luckyLottery = $alphabatArr[$i]." ".$number;
                                    foreach ($data as $d){
                                        if($d['prize']=="နှစ်သိန်း"){
                                            $twoNum = substr($number,0,4);
                                            if(checkMe($alphabatArr[$i],$d['alphabat']) && $twoNum==$d['number']){
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }else if($d['prize']=="တစ်သိန်း") {
                                            $twoNum = substr($number, 0, 3);
                                            if (checkMe($alphabatArr[$i], $d['alphabat']) && $twoNum == $d['number']) {
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }else if($d['prize']=="ငါးသောင်း") {
                                            $twoNum = substr($number, 0, 2);
                                            if (checkMe($alphabatArr[$i], $d['alphabat']) && $twoNum == $d['number']) {
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }
                                        else if(checkMe($alphabatArr[$i],$d['alphabat']) && $number==$d['number']){
                                            createTr($j++,$luckyLottery, $d['prize']);
                                        }else{
                                        }

                                    }
                                }
                            }
                            if(isset($_POST['checkFormTwo'])){
                                $alphabatTwo = $_POST["alphabatTwo"];
                                if($_POST["fromNumTwo"] > $_POST["toNumTwo"]){
                                    $toNumTwo = $_POST["fromNumTwo"];
                                    $fromNumTwo = $_POST["toNumTwo"];
                                }else{
                                    $fromNumTwo = $_POST["fromNumTwo"];
                                    $toNumTwo = $_POST["toNumTwo"];
                                }
                                $j = 1;
                                for ($i=$fromNumTwo; $i<=$toNumTwo; $i++){

                                    $luckyLottery = $alphabatArr[$alphabatTwo]." ".$i;
                                    foreach ($data as $d){
                                        if($d['prize']=="နှစ်သိန်း"){
                                            $twoNum = substr($i,0,4);
                                            if(checkMe($alphabatArr[$alphabatTwo],$d['alphabat']) && $twoNum==$d['number']){
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }else if($d['prize']=="တစ်သိန်း") {
                                            $twoNum = substr($i, 0, 3);
                                            if(checkMe($alphabatArr[$alphabatTwo],$d['alphabat']) && $twoNum==$d['number']){
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }else if($d['prize']=="ငါးသောင်း") {
                                            $twoNum = substr($i, 0, 2);
                                            if(checkMe($alphabatArr[$alphabatTwo],$d['alphabat']) && $twoNum==$d['number']){
                                                createTr($j++,$luckyLottery, $d['prize']);
                                            }
                                        }
                                        else if(checkMe($alphabatArr[$alphabatTwo],$d['alphabat']) && $i==$d['number']){
                                            createTr($j++,$luckyLottery, $d['prize']);
                                        }else{

                                        }

                                    }
                                }
                            }
                            if(isset($_POST['checkFormThree'])){
                                $alphabatThree = $_POST["alphabatThree"];
                                $numThree = $_POST['numThree'];

                                $luckyLottery = $alphabatArr[$alphabatThree]." ".$numThree;
                                $i = 1;
                                foreach ($data as $d){
                                    if($d['prize']=="နှစ်သိန်း"){
                                        $threeNum = substr($numThree,0,4);
                                        if(checkMe($alphabatArr[$alphabatThree],$d['alphabat']) && $threeNum==$d['number']){
                                            createTr($i++,$luckyLottery, $d['prize']);
                                        }
                                    }else if($d['prize']=="တစ်သိန်း") {
                                        $threeNum = substr($numThree,0,3);
                                        if(checkMe($alphabatArr[$alphabatThree],$d['alphabat']) && $threeNum==$d['number']){
                                            createTr($i++,$luckyLottery, $d['prize']);
                                        }
                                    }else if($d['prize']=="ငါးသောင်း") {
                                        $threeNum = substr($numThree,0,2);
                                        if(checkMe($alphabatArr[$alphabatThree],$d['alphabat']) && $threeNum==$d['number']){
                                            createTr($i++,$luckyLottery, $d['prize']);
                                        }
                                    }
                                    else if(checkMe($alphabatArr[$alphabatThree],$d['alphabat']) && $numThree==$d['number']){
                                        createTr($i++,$luckyLottery, $d['prize']);
                                    }else{

                                    }

                                }

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
