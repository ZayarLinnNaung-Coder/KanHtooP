
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
    <a href="databaseExchanger.php">Exchange database</a>
    <a href="addTables.php" class="active">Add table</a>
</div><br>
<form action="#" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit'])){
$tableName = $_POST['name'];
$dbName = "mysql:host=localhost;dbname=".$tableName;
$pdo_user = new PDO($dbName,"root","");

$sql = "CREATE TABLE checker (
        id int(11) NOT NULL AUTO_INCREMENT,
        name text,
        phone text,
        address text,
        alphabat text,
        lotteryNumber int(11),
        cpo int(11),
        date varchar(255),
        PRIMARY KEY (id)
    );";

$result = $pdo_user->prepare($sql)->execute();

$sql = "CREATE TABLE current (
            id int(11),
            name text,
            lotteryNum_from text,
            lotteryNum_to text,
            phone text,
            address text,   
            cpo int(11),
            total int(11),
            date varchar(255)
        );";
$result = $pdo_user->prepare($sql)->execute();

$sql = "CREATE TABLE prev (
                id int(11),
                name text,
                lotteryNum_from text,
                lotteryNum_to text,
                phone text,
                address text,   
                cpo int(11),
                total int(11),
                date varchar(255)
            );";
$result = $pdo_user->prepare($sql)->execute();

$sql = "CREATE TABLE realdata (
            id int(11),
            name text,
            phone text,
            address text,
            alphabat text,
            lotteryNumber int(11),
            cpo int(11),
            date varchar(255)
        );";
$result = $pdo_user->prepare($sql)->execute();

$sql = "CREATE TABLE winner (
                id int(11),
                name text,
                phone text,
                luckyNum text,
                prize text,
                address text,
                date varchar(50)
            );";
$result = $pdo_user->prepare($sql)->execute();


}

?>
