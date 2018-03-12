<?php
/**
 * Created by PhpStorm.
 * User: PC-Maus
 * Date: 12.03.2018
 * Time: 12:39
 */
include_once ('function.php');
$db = db_connect();

$password = md5($_POST['password']);
$name = trim($_POST['name']);
$email = $_POST['email'];
$reg_exp_email = "/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/";
$reg_exp_name = "/^[а-яА-ЯёЁa-zA-Z0-9]+$/";

$sample = "SELECT * FROM reg WHERE email = \"$email\"";
$request_to_mysql = $db->query($sample);
$answer = $request_to_mysql->fetchAll(PDO::FETCH_ASSOC);
foreach ($answer as $ans => $value) {
    $user_data_base = $answer[$ans]['email'];
    $user_data_base_name = $answer[$ans]['name'];
}
if ($user_data_base == $email && $user_data_base_name == $name ) {
    echo "Такой пользователь существует";

}elseif($user_data_base_name == $name){
    echo "Такое имя уже существует";

}elseif($user_data_base == $email)
{
    echo "Эмейл  уже существует";
}elseif(preg_match_all($reg_exp_email,$email) && preg_match_all($reg_exp_name,$name) && $user_data_base_name !=$name){
    $db->query( "INSERT INTO reg (name, password, email) VALUES (\"$name\",\"$password\",\"$email\")");
    header("Location: http://autoriz/index.php");
    exit;
}
else{
    echo"Ведите коректно данные";

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
