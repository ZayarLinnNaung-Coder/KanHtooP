<?php require_once ("utility/auth.php")?>
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
</head>
<body>
<style>
    .nav .brand h5{
        font-size: 15px;
    }
    .btn-primary{
        box-shadow: 0 0 5px 1px #333;
        margin-bottom: 10px;
    }
    .btn-primary:focus{
        border: 0;
    }
    .nav .links a{
        font-size: 13px;
        display: inline-block;
        height: 30px;
        /*background-color: red;*/
    }
    @media screen and (max-width: 780px){
        .container-fluid .row{
            /*background-color: red;*/
            width: 100% !important;
        }
    }
    @media screen and (max-width: 480px){
        .accordion-body input{
            margin-top: 10px;
            padding: 7px 0;
            width: 100% !important;
            border: 0;
            border-bottom: 1px solid gray;
        }
        .accordion-body input:focus{
            outline: 0;
        }
    }
</style>
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
            <a href="#" class="active" >ထီတိုက်ရန်</a>
            <a href="register.php">စာရင်းသွင်းမည်</a>
            <a href="customer_list.php">၀ယ်ယူသူစာရင်း</a>
            <a href="internal/checkFromList.php" disabled="">ကံထူးသူစာရင်း</a>
        </div>
    </div>
</header>
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-75">
        <div class="col-12">
            <a href="internal/checkFromList.php" class="btn btn-sm btn-primary py-2 w-100">၀ယ်ယူသူစာရင်း မှ တိုက်စစ်မည်</a>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            ကိန်းဂဏန်းတူ အက္ခရာကွဲ တိုက်မည် &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="internal/checkWinner.php" method="post">
                                <select name="fromAlphabatOne" id="fromAlphabat"></select> &nbsp;&nbsp; မှ &nbsp;&nbsp;
                                <select name="toAlphabatOne" id="toAlphabat"></select> &nbsp;&nbsp; အထိ &nbsp;&nbsp;
                                <input name="numberOne" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" type="number" class="px-2 w-25" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                <input type="submit" name="checkFormOne" value="ထီတိုက်မည်" class="btn btn-primary px-3">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            အက္ခရာတူ ကိန်းဂဏန်းကွဲ တိုက်မည်
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="internal/checkWinner.php" method="post">
                                <select name="alphabatTwo" id="alphabat"></select>
                                <input type="number" name="fromNumTwo" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;"> &nbsp; &nbsp; မှ &nbsp; &nbsp;

                                <input type="number" name="toNumTwo" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;"> &nbsp; &nbsp; အထိ &nbsp; &nbsp;
                                <input type="submit" name="checkFormTwo"  class="btn btn-primary" value="ထီတိုက်မည်" class="px-3">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            တစ်စောင်စီ တိုက်မည်
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" w-100 data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="internal/checkWinner.php" method="post">
                                <select name="alphabatThree" id="alphabat2"></select>
                                <input type="number" name="numThree" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                <input type="submit" name="checkFormThree" class="btn btn-primary" value="ထီတိုက်မည်" class="px-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script>
    let letterArr = ['က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','ဎ','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','ကဎ','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ'];
    let numberArr = ['၀','၁','၂','၃','၄','၅','၆','၇','၈','၉'];
    let fromAlphabet = document.getElementById("fromAlphabat");
    let toAlphabet = document.getElementById("toAlphabat");
    let alphabet = document.getElementById("alphabat");
    let alphabet2 = document.getElementById("alphabat2");
    function appendOption(arr,slt){
        var i = 0;
        arr.map(function (e) {
            slt.innerHTML += `<option value=${i++}>${e}</option>`;
        })
    }
    appendOption(letterArr,fromAlphabet);
    appendOption(letterArr,toAlphabet);
    appendOption(letterArr,alphabet);
    appendOption(letterArr,alphabet2);
</script>
</body>
</html>