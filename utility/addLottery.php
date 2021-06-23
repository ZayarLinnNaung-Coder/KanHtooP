<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<style>
    a{
        text-decoration: none;
        display: inline-block;
        width: 130px;
        padding: 15px 0;
        background-color: blue;
        color: white;
        text-align: center;
    }
    .active{
        background-color: #555;
    }
</style>
<body>
<div>
    <a href="addLottery.php" class="active">Add lottery</a>
    <a href="updateLottery.php">Update lottery</a>
    <a href="databaseExchanger.php">Exchange database</a>
    <a href="addTables.php">Add table</a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="addLottery.php" method="post">
                    <select name="mmChar" id="mmChar"></select>
                    <input name="number" type="number">
                    <input name="prize" type="text" placeholder="ဆုကြေးငွေ">
                    <input type="submit" name="addLottery" class="vtn btn-primary btn-sm px-2" value="ထည့်ရန်">
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once ("../utility/pdo.php");
    $sql = "INSERT INTO lottery_list (alphabat, number, prize,comment) VALUES (?,?,?,?)";
    $result = $pdo->prepare($sql);
     $letterArr = array('က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ');

        if(isset($_POST['addLottery'])) {
//            print_r($_POST);
            $mmCharVar = str_replace("\u200c","",json_encode($letterArr[$_POST['mmChar']]));
            $numVar = $_POST["number"];
            $prizeVar = str_replace("\u200c","",json_encode($_POST["prize"]));
            $result->execute([$mmCharVar, $numVar, $prizeVar,$letterArr[$_POST['mmChar']]." ".$_POST["prize"]]);
        }
    ?>
    <script>
        let letterArr = ['က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ'];
        let mmChar = document.getElementById("mmChar");
        function appendOption(arr,slt){
            var i = 0;
            arr.map(function (e) {
                mmChar.innerHTML += `<option value=${i++}>${e}</option>`;
            })
        }
        appendOption(letterArr,mmChar);
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
