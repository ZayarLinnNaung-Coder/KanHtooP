
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

<div>
    <a href="addLottery.php">Add lottery</a>
    <a href="updateLottery.php">Update lottery</a>
    <a href="databaseExchanger.php" class="active">Exchange database</a>
    <a href="addTables.php">Add table</a>
</div><br>
<form action="" method="post">
    <input type="text" name="db_name" placeholder="db_name">
    <input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit'])) {
echo "hello";
    $x = $_POST['db_name'];
    require_once ("pdo_user.php");
//********************************************
// Delete All FROM PREV TABLE
//********************************************
    $sqlOne = "DELETE FROM PREV WHERE 1";
    $result = $pdo_user->prepare($sqlOne);
    $result->execute();

//********************************************
// Delete All FROM CHECKER TABLE
//********************************************
    $sqlC = "DELETE FROM CHECKER WHERE 1";
    $result = $pdo_user->prepare($sqlC);
    $result->execute();

//********************************************
// MOVE All FROM REAL_DATA TO CHECKER
//********************************************
    $sqlA = "SELECT * FROM realdata WHERE 1";
    $result = $pdo_user->prepare($sqlA);
    $result->execute();
    $dataA = $result->fetchAll(PDO::FETCH_ASSOC);

//INSERT TO PREV
    $sqlB = "INSERT INTO CHECKER (id,name,phone,address,alphabat,lotteryNumber,cpo,date) VALUES (?,?,?,?,?,?,?,?)";
    $result = $pdo_user->prepare($sqlB);
    foreach ($dataA as $d) {
        $id = $d['id'];
        $name = $d['name'];
        $phone = $d['phone'];
        $address = $d['address'];
        $alphabat = $d['alphabat'];
        $lotteryNumber = $d['lotteryNumber'];
        $cpo = $d['cpo'];
        $date = $d['date'];

        $result->execute([$id, $name, $phone, $address, $alphabat, $lotteryNumber, $cpo, $date]);
    }
//********************************************
// Delete All FROM REAL_DATA TABLE
//********************************************
    $sql = "DELETE FROM realdata WHERE 1";
    $result = $pdo_user->prepare($sql);
    $result->execute();


//********************************************
// MOVE All FROM CURRENT TO PREV
//********************************************
    $sqlTwo = "SELECT * FROM CURRENT WHERE 1";
    $result = $pdo_user->prepare($sqlTwo);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    //INSERT TO PREV
    $sqlThree = "INSERT INTO PREV (id,name,lotteryNum_from,lotteryNum_to,phone,address,cpo,total,date) VALUES (?,?,?,?,?,?,?,?,?)";
    $result = $pdo_user->prepare($sqlThree);
    foreach ($data as $d) {
        $id = $d['id'];
        $name = $d['name'];
        $lotteryNum_from = $d['lotteryNum_from'];
        $lotteryNum_to = $d['lotteryNum_to'];
        $phone = $d['phone'];
        $address = $d['address'];
        $cpo = $d['cpo'];
        $total = $d['total'];
        $date = $d['date'];

        $result->execute([$id, $name, $lotteryNum_from, $lotteryNum_to, $phone, $address, $cpo, $total, $date]);
    }
//********************************************
//Delete All FROM CURRENT TABLE
//********************************************
    $sqlFour = "DELETE FROM CURRENT WHERE 1";
    $result = $pdo_user->prepare($sqlFour);
    $result->execute();
}
?>
