<?php include_once "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>驚奇投票所</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
       
         body {
        margin: 0;
        padding: 0;
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWkaf9_BmYc9mpwv-87DTkHuwzL-3s7tjGananGk_8t_A7iEE&s);
        
        }
    

    header {
        background-color: lightblue;
        padding: 10px;
        color: #fff;
    }

    header a {
        color: #fff;
        text-decoration: none;
        margin-right: 10px;
    }

    main {
        padding: 20px;
        background-color: pink; /* 粉紅色底層 */
    }

  

    footer a {
        color: #fff;
        text-decoration: none;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<header>
    <a href="index.php">首頁</a>
    <a href="index.php?do=result_list">結果</a>
    <?php
    if(!isset($_SESSION['login'])){
    ?>
        <a href="index.php?do=login">登入</a>
        <a href="index.php?do=reg">註冊</a>
    <?php
    }else{
    ?>
        <a href="./api/logout.php">登出</a>
    <?php
        switch($_SESSION['pr']){
            case "super":
                echo "<a href='backend.php?do=super'>系統管理</a>";
            break; 
            case "member":
                echo "<a href='backend.php?do=member'>會員中心</a>";
            break;
            case "admin":
                echo "<a href='backend.php?do=admin'>管理</a>";
            break;
        }
    }
    ?>
</header>
<main>

<?php

/* if(isset($_SESSION['login']) && $_SESSION['pr']){
    echo $_SESSION['login'];
    echo "-";
    echo $_SESSION['pr'];
}
 */
$do=$_GET['do']??'list';

$file="./front/".$do.".php";

if(file_exists($file)){
    include $file;
}else{
    include "./front/list.php";
}
?>

</main>
<footer></footer>

</body>
</html>