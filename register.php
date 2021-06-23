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
        form input{
            padding: 7px 0;
            margin-top: 5px ;
        }
        form select{
            margin-top: 25px;
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
    </style>
</head>
<body>
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
            <a href="#"  class="active">စာရင်းသွင်းမည်</a>
            <a href="customer_list.php">၀ယ်ယူသူစာရင်း</a>
            <a href="internal/checkFromList.php">ကံထူးသူစာရင်း</a>
        </div>
    </div>
</header>
<div class="container">
    <div class="row w-100">
        <div class="col-sm-12 col-lg-6 offset-lg-3">
            <form action="register.php" method="post">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">အမည်</label>
                    <input type="text" class="form-control" id="name" placeholder="Eg: မောင်မောင်">
                </div>
                <div class="mb-3" style="display: inline-block; width: 49%">
                    <label for="formGroupExampleInput2" class="form-label">ဖုန်းနံပါတ်</label>
                    <input type="text"class="form-control" id="phNo" placeholder="Eg: 09777777777">
                </div>
                <div class="mb-3" style="display: inline-block; width: 49%">
                    <label for="formGroupExampleInput2" class="form-label">ထီတစ်စောင်ကျသင့်ငွေ </label>
                    <input type="number" class="form-control" id="cost" placeholder="Eg: 1300">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">နေရပ်လိပ်စာ</label>
                    <input type="text" class="form-control" id="address" placeholder="Eg: အမှတ် (၃၀၀), ပတ္တမြားလမ်း, ဌ ရပ်ကွက်">
                </div>

<!--                <input type="submit">-->

            </form>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            ဂဏန်းတူ
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            အက္ခရာတူ
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                            (၁)စောင်စီ
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="internal/registerCustomer.php" onsubmit="dataTranscate()" method="post">
                            <input type="hidden" id="submitNameOne" name="submitNameOne">
                            <input type="hidden" id="phNoOne" name="phNoOne">
                            <input type="hidden" id="costOne" name="costOne">
                            <input type="hidden" id="addressOne" name="addressOne">
                            <input type="hidden" id="dateOne" name="dateOne">
                            <select name="alphabatOne" id="alphabatOne"></select><br>
                            <input type="number" name="fromNumberOne" id="fromNumberOne" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2 w-75" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;"> &nbsp; &nbsp; မှ &nbsp; &nbsp;

                            <input type="number" name="toNumberOne" id="toNumberOne" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2 w-75 " onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;"> &nbsp; &nbsp; အထိ &nbsp; &nbsp;
                            <br>
                            <input type="submit" name="submitOne" class="btn btn-primary btn-sm mt-3 p-2" value="စာရင်းသွင်းမည်">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="internal/registerCustomer.php" onsubmit="dataTranscateTwo()" method="post">
                            <input type="hidden" id="submitNameTwo" name="submitNameTwo">
                            <input type="hidden" id="phNoTwo" name="phNoTwo">
                            <input type="hidden" id="costTwo" name="costTwo">
                            <input type="hidden" id="addressTwo" name="addressTwo">
                            <input type="hidden" id="dateTwo" name="dateTwo">
                            <select name="fromAlphabatTwo" id="fromAlphabatTwo"></select> မှ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="toAlphabatTwo" id="toAlphabatTwo"></select> အထိ<br>
                            <input type="number" name="numberTwo" id="numberTwo" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2 w-75" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">  &nbsp;
                            <br>
                            <input type="submit" name="submitTwo" class="btn btn-primary btn-sm mt-3 p-2" value="စာရင်းသွင်းမည်">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="internal/registerCustomer.php" onsubmit="dataTranscateThree()" method="post">
                            <input type="hidden" id="submitNameThree" name="submitNameThree">
                            <input type="hidden" id="phNoThree" name="phNoThree">
                            <input type="hidden" id="costThree" name="costThree">
                            <input type="hidden" id="addressThree" name="addressThree">
                            <input type="hidden" id="dateThree" name="dateThree">
                            <select name="alphabatThree" id="alphabatThree"></select><br>
                            <input type="number" name="numberThree" id="numberThree" placeholder="ဂဏန်းခြောက်လုံးရိုက်ပါ" class="px-2 w-75" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">  &nbsp;
                            <br>
                            <input type="submit" id="submitThree" name="submitThree" class="btn btn-primary btn-sm mt-3 p-2" value="စာရင်းသွင်းမည်">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>
    let letterArr = ['က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','ဎ','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','ကဎ','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ'];
    let numberArr = ['၀','၁','၂','၃','၄','၅','၆','၇','၈','၉'];

    let alphabetOne = document.getElementById("alphabatOne");
    let alphabetThree = document.getElementById("alphabatThree");
    let fromAlphabet = document.getElementById("fromAlphabatTwo");
    let toAlphabet = document.getElementById("toAlphabatTwo");
    function appendOption(arr,slt){
        var i = 0;
        arr.map(function (e) {
            slt.innerHTML += `<option value=${i++}>${e}</option>`;
        })
    }

    function dataTranscate() {
        var date = new Date();
        var today = date.getDate().toString() + "-" + (date.getMonth()+1) + "-" + date.getFullYear().toString();

        document.getElementById("submitNameOne").value = document.getElementById("name").value;
        document.getElementById("phNoOne").value = document.getElementById("phNo").value;
        document.getElementById("costOne").value = document.getElementById("cost").value;
        document.getElementById("addressOne").value = document.getElementById("address").value;
        document.getElementById("dateOne").value = today;
    }
    function dataTranscateTwo() {
        var date = new Date();
        var today = date.getDate().toString() + "-" + date.getMonth().toString() + "-" + date.getFullYear().toString();

        document.getElementById("submitNameTwo").value = document.getElementById("name").value;
        document.getElementById("phNoTwo").value = document.getElementById("phNo").value;
        document.getElementById("costTwo").value = document.getElementById("cost").value;
        document.getElementById("addressTwo").value = document.getElementById("address").value;
        document.getElementById("dateTwo").value = today;
    }
    function dataTranscateThree() {
        var date = new Date();
        var today = date.getDate().toString() + "-" + date.getMonth().toString() + "-" + date.getFullYear().toString();

        document.getElementById("submitNameThree").value = document.getElementById("name").value;
        document.getElementById("phNoThree").value = document.getElementById("phNo").value;
        document.getElementById("costThree").value = document.getElementById("cost").value;
        document.getElementById("addressThree").value = document.getElementById("address").value;
        document.getElementById("dateThree").value = today;
    }

    appendOption(letterArr,alphabetOne);
    appendOption(letterArr,fromAlphabet);
    appendOption(letterArr,toAlphabet);
    appendOption(letterArr,alphabetThree);
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
</body>
</html>