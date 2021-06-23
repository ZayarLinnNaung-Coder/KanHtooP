<?php
    require_once ("pdo.php");
    $sql = "SELECT * FROM lottery_list where 1";
    $result = $pdo->prepare($sql);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
//    echo "<pre>";
//    print_r($data);
?>
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
    <a href="addLottery.php">Add lottery</a>
    <a href="updateLottery.php" class="active">Update lottery</a>
    <a href="databaseExchanger.php">Exchange database</a>
    <a href="addTables.php">Add table</a>
</div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-light">ပြင်ဆင်ရန်</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>id</td>
                                <td>Alphabat</td>
                                <td>Number</td>
                                <td>Prize</td>
                                <td>Comment</td>
                                <td></td>
                            </tr>
                            <?php
                                foreach ($data as $d){
                            ?>
                                <tr class="align-middle">
                                    <form action="" method="post">
                                        <td><input type="text" name="id" class="form-control" value="<?php echo $d['id']?>"></td>
                                        <td><input type="text" name="alphabat" class="form-control" value="<?php echo json_decode($d['alphabat']) ?>"></td>
                                        <td><input type="text" name="number" class="form-control" value="<?php echo $d['number']?>"></td>
                                        <td><input type="text" name="prize" class="form-control" value="<?php echo json_decode($d['prize'])?>"></td>
                                        <td><input type="text" name="comment" class="form-control" value="<?php echo json_decode($d['comment'])?>"></td>
                                        <td>
                                            <input type="submit" name="submit" class="btn btn-sm btn-primary" value="ပြင်ဆင်ရန်">
                                        </td>
                                    </form>
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
    <?php
        if(isset($_POST["submit"])){
            $id = $_POST['id'];
            $alphabat = json_encode($_POST['alphabat']) ;
            $number = $_POST['number'];
            $prize = json_encode($_POST['prize']);
            $comment = json_encode($_POST['comment']);

            $sql = "UPDATE lottery_list SET alphabat=?, number=?, prize=?, comment=? WHERE ID=?";
            $result = $pdo->prepare($sql);
            $result->execute([$alphabat, $number, $prize, $comment, $id]);
            echo("<meta http-equiv='refresh' content='0'>");
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>