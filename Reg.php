<?php

$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, 'WMI TEst');
mysqli_query($db, "SET NAMES utf8");

$password = md5($_POST['password']);
$name = trim($_POST['name']);
$email = $_POST['email'];

if (count($_POST) > 0) {
    mysqli_query($db, "INSERT INTO reg (`name`, `password`, `email`) VALUES (\"$name\",\"$password\",\"$email\")");
    header("Location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Main Page</title>
</head>
<body>
<div class="box">
    <form method="POST">
        <label for="name">Ваше Имя</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="password">Ваше Пароль</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Ваше Email</label><br>
        <input type="text" id="email" name="email"><br>
        <input id="btn_submit" type="submit" value="Вход">


    </form>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>