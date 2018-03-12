<?php
/**
 * User: PC-Maus
 * Date: 09.03.2018
 * Time: 11:19
 */
session_start();
include_once ('function.php');
$db = db_connect();
$name = $_POST['name'];
$_SESSION['name'] = $name;
$_SESSION['password'] = $_POST['password'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM reg WHERE name = \"$name\"";

$request = $db->query($sql);
$fetch = $request->FetchAll(PDO::FETCH_ASSOC);

if (count($_POST) > 0) {

    if(false == $fetch){
        echo "<h1>Веддите данные</h1>";

    }
    foreach ($fetch as $key => $value) {

        $user_name = $fetch[$key]['name'];
        $user_password = $fetch[$key]["password"];

    }
    // PDO

    if($user_name == 'admin' && $user_password == $password){

        $_SESSION['admin'] = true;

        header('Location: http://autoriz/admin.php');
        exit;

    }
    if($user_name == $name && $user_password == $password){
        $_SESSION['user'] = true;
        header('Location: http://autoriz/user.php');
        exit;


    }
    if ($user_name == $name) {
        echo "<h1>Имя паравильно введите пароль</h1>";

    }else{
        echo "<h1>Имя введено не правильно</h1>";
    }
    if ($user_password == $password) {
        echo "<h1>Пароль ввели верно</h1>";
    }else{
        echo"<h1>Возможно не верно ввели пароль</h1>";
    }


}
else {

    echo "<h1>Проверьте правильность введеных данных</h1>";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
