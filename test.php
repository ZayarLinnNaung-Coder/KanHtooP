<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .content{
        width: 100%;
        height: 100vh;
        overflow: hidden;
        background-color: #fafafa;
    }
    .head{
        width: 100%;
        padding: 20px 0;
        background-color: #222277;
        color: #fafafa;
        padding-left: 100px;
    }
    .loader{
        width: 100%;
        height: 100vh;
        background-color: #fff;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }


</style>
<body>
    <div class="loader">
        <img src="img/preloader.gif" alt="">
    </div>
    <div class="content">
        <div class="head"><h3>HELLO</h3></div>
        <img src="https://static.wikia.nocookie.net/naruto/images/0/09/Naruto_newshot.png/revision/latest/scale-to-width-down/340?cb=20170621101134" alt="">
        <img src="https://variety.com/wp-content/uploads/2015/07/naruto_movie-lionsgate.jpg?w=681&h=383&crop=1" alt="">
        <img src="https://i.ytimg.com/vi/PPNMBYcjYXE/maxresdefault.jpg" alt="">
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).on("load",function () {
            $(".loader").fadeOut(500);
        })
    </script>
</body>
</html>