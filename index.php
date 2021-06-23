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

    <title>ကံထူးပြီ</title>

</head>
<body>
<div class="container">
    <div class="form">
        <div class="left">
            <img src="img/undraw_time_management_30iu.svg" width="80%" alt="">
        </div>
        <div class="right">
            <div class="frm-wrapper">
                <div class="one">
                    <h3>"ကံထူးပြီ" မှ ကြိုဆိုပါတယ်...</h3>
                </div>
                <div class="two">
                    <p>မိတ်ဆွေရဲ့ လုံခြုံမှုအတွက် အချက်အလက်များဖြည့်သွင်းပေးပါ...</p>
                </div>
                <div class="three">
                    <form action="internal/login_control.php" method="post">
                        <div class="username">
                            <i class="fas fa-envelope"></i>
                            <input name="name" type="text" required>
                        </div>
                        <div class="password">
                            <i class="fas fa-key"></i>
                            <input name="password" type="password" required>
                        </div>
                        <div class="addition">
                            <a href="#">လျို့၀ှက်နံပါတ် မေ့နေပါသလား</a>
                        </div>
                        <div class="btn">
                            <input type="submit" value="၀င်ရောက်မည်" class="ok">
                            <input type="button" value="ပယ်ဖျက်မည်" class="cancel">
                        </div>
                    </form>
                </div>
                <div class="four"></div>
            </div>
        </div>
    </div>
</div>
<?php
    if($_GET['stage']=="fail"){
        echo '<script>alert("အချက်အလက်များမှားယွင်းနေပါသည်")</script>';
    }
?>
<script src="js/nav.js"></script>
</body>
</html>