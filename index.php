<?php
session_start();
$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, 'WMI TEst');
mysqli_query($db, "SET NAMES utf8");

$name = $_POST['name'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM reg WHERE `name` = '$name'";

$request = mysqli_query($db, $sql);
$fetch = mysqli_fetch_all($request, MYSQLI_ASSOC);

if (count($_POST) > 0) {

    if(false == $fetch){
        echo "Веддите данные";

    }
    foreach ($fetch as $key => $value) {

        $user_name = $fetch[$key]['name'];
        $user_password = $fetch[$key]["password"];
//            var_dump($fetch);
        if($user_name == 'admin' && $user_password == $password){
            header('Location: http://autoriz/admin.php');
            exit;

        }
        if($user_name == $name && $user_password == $password){
            header('Location: http://autoriz/user.php');
            exit;


        }
        if ($user_name == $name) {
            echo "Имя паравильно введите пароль";

        }else{
            echo "Имя введено не правильно";
        }
        if ($user_password == $password) {
            echo "Пароль ввели верно";
        }else{
            echo"Возможно не верно ввели пароль";
        }



    }
}
else {
    $user_name = "";
    $user_password = "";
    echo "Введите данные";
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
        <input type="text" id="name" name="name" placeholder="Введите ваше Имя"><br>
        <label for="password">Ваше Пароль</label><br>
        <input type="password" id="password" name="password"><br>

        <input id="btn_submit" type="submit" value="Вход">
        <a href="http://autoriz/Reg.php">Регистрация</a>


    </form>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>