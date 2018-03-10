<?php
$db = mysqli_connect('localhost', 'root', '');
mysqli_select_db($db, 'WMI TEst');
mysqli_query($db, "SET NAMES utf8");

$password = md5($_POST['password']);
$name = trim($_POST['name']);
$email = $_POST['email'];
$reg_exp_email = "/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/";
$reg_exp_name = "/^[а-яА-ЯёЁa-zA-Z0-9]+$/";

$sample = "SELECT * FROM reg WHERE email = \"$email\"";
$request_to_mysql = mysqli_query($db, $sample);
$answer = mysqli_fetch_all($request_to_mysql, MYSQL_ASSOC);
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
}elseif(preg_match_all($reg_exp_email,$email) && preg_match_all($reg_exp_name,$name)){
    mysqli_query($db, "INSERT INTO reg (`name`, `password`, `email`) VALUES (\"$name\",\"$password\",\"$email\")");
    header("Location: http://autoriz/index.php");
    exit;
}
else{
    echo"Ведите коректно данные";

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration Page</title>
</head>
<body>
<div class="box">
    <form method="POST">
        <label for="name">Ваше Имя</label><br>
        <input type="text" id="name"  required name="name" value="<?php echo $_POST['name']?>"><br>
        <label for="password">Ваше Пароль</label><br>
        <input type="password" required id="password" name="password"><br>
        <label for="email">Ваше Email</label><br>
        <input type="text" id="email" required name="email" value="<?php echo $_POST['password']?>"><br>
        <input id="btn_submit" type="submit" value="Зарегистрироваться">


    </form>

</div>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>