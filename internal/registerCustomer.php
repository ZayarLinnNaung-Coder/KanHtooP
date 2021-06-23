<?php
    require_once ("../utility/pdo_user.php");

$letterArr = array('က','ခ','ဂ‌','ဃ','င','စ','ဆ','ဇ','ဈ','ည','ဋ','ဌ','ဍ','ဎ','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','၀','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ‌','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဋ','ကဌ','ကဍ','ကဎ','ကဏ','ကတ','ကထ','ကဒ','ကဓ','ကန','ကပ','ကဖ','ကဗ','ကဘ','ကမ','ကယ','ကရ','ကလ','က၀','ကသ','ကဟ','ကဠ','ကအ');

if(isset($_POST['submitOne'])){
        $name = json_encode($_POST['submitNameOne']);
        $phNo = json_encode($_POST['phNoOne']);
        $cost = $_POST['costOne'];
        $address = json_encode($_POST['addressOne']);
        $date = $_POST['dateOne'];
        $total = 0;

        $alphabat = str_replace("\u200c","",json_encode($letterArr[$_POST['alphabatOne']])) ;
        if($_POST['fromNumberOne'] < $_POST['toNumberOne']){
            $fromNum = $_POST['fromNumberOne'];
            $toNum = $_POST['toNumberOne'];
        }else{
            $toNum = $_POST['fromNumberOne'];
            $fromNum = $_POST['toNumberOne'];
        }

        $from = json_encode($letterArr[$_POST['alphabatOne']]." ".$fromNum);
        $to = json_encode($letterArr[$_POST['alphabatOne']]." ".$toNum);



        // *************************************************
        // Database
        // *************************************************
        $sql = "INSERT INTO current(name, lotteryNum_from, lotteryNum_to, phone, address, cpo, total, date) VALUES (?,?,?,?,?,?,?,?)";
        $sql2 = "INSERT INTO realdata(name, phone, address, alphabat, lotteryNumber, cpo, date) VALUES (?,?,?,?,?,?,?)";
        $result2 = $pdo_user->prepare($sql2);

        for($i = $fromNum; $i<=$toNum; $i++){
            $total += $cost;
            $result2->execute([$name, $phNo, $address, $alphabat, $i, $cost, $date]);
        }

        $result = $pdo_user->prepare($sql);
        $result->execute([$name,$from,$to,$phNo,$address,$cost,$total,$date]);

        echo "<pre>";
        print_r($_POST);
    }

if(isset($_POST['submitTwo'])){
    echo "<pre>";
    print_r($_POST);
    $name = json_encode($_POST['submitNameTwo']);
    $phNo = json_encode($_POST['phNoTwo']);
    $cost = $_POST['costTwo'];
    $address = json_encode($_POST['addressTwo']);
    $date = $_POST['dateTwo'];
    $total = 0;

    $fromAlphabat = str_replace("\u200c","",json_encode($letterArr[$_POST['fromAlphabatTwo']])) ;
    $toAlphabat = str_replace("\u200c","",json_encode($letterArr[$_POST['toAlphabatTwo']])) ;

    if($_POST['fromAlphabatTwo'] < $_POST['toAlphabatTwo']){
        $fromAl = $_POST['fromAlphabatTwo'];
        $toAl = $_POST['toAlphabatTwo'];
    }else{
        $toAl = $_POST['fromAlphabatTwo'];
        $fromAl = $_POST['toAlphabatTwo'];
    }
    $number = $_POST['numberTwo'];

    $from = json_encode($letterArr[$_POST['fromAlphabatTwo']]." ".$number);
    $to = json_encode($letterArr[$_POST['toAlphabatTwo']]." ".$number);


    // *************************************************
    // Database
    // *************************************************
    $sql = "INSERT INTO current(name, lotteryNum_from, lotteryNum_to, phone, address, cpo, total, date) VALUES (?,?,?,?,?,?,?,?)";
    $sql2 = "INSERT INTO realdata(name, phone, address, alphabat, lotteryNumber, cpo, date) VALUES (?,?,?,?,?,?,?)";
    $result2 = $pdo_user->prepare($sql2);


    for ($i=$fromAl; $i<=$toAl; $i++){
        $total += $cost;
        $x = str_replace("\u200c","",json_encode($letterArr[$i]));
        $result2->execute([$name, $phNo, $address, $x, $number, $cost, $date]);
    }
//
    $result = $pdo_user->prepare($sql);
    $result->execute([$name,$from,$to,$phNo,$address,$cost,$total,$date]);

}
if(isset($_POST['submitThree'])){
    echo "<pre>";
    print_r($_POST);
    $name = json_encode($_POST['submitNameThree']);
    $phNo = json_encode($_POST['phNoThree']);
    $cost = $_POST['costThree'];
    $address = json_encode($_POST['addressThree']);
    $date = $_POST['dateThree'];
    $total = $cost;

    $alphabat = str_replace("\u200c","",json_encode($letterArr[$_POST['alphabatThree']])) ;
    $number = $_POST['numberThree'];

    $lotteryNum = json_encode($letterArr[$_POST['alphabatThree']]." ".$number);
    echo json_decode($lotteryNum);

    // *************************************************
    // Database
    // *************************************************
    $sql = "INSERT INTO current(name, lotteryNum_from, phone, address, cpo, total, date) VALUES (?,?,?,?,?,?,?)";
    $sql2 = "INSERT INTO realdata(name, phone, address, alphabat, lotteryNumber, cpo, date) VALUES (?,?,?,?,?,?,?)";
    $result2 = $pdo_user->prepare($sql2);
    $result2->execute([$name, $phNo, $address, $alphabat, $number, $cost, $date]);

    $result = $pdo_user->prepare($sql)->execute([$name,$lotteryNum,$phNo,$address,$cost,$total,$date]);
}

header('Location: ../register.php');
?>