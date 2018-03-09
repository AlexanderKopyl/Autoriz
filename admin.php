<?php
    session_start();
    if(!(isset($_SESSION['admin']) && $_SESSION['admin'])){
    header('Location: index.php');
    exit;

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Panel</title>
</head>
<body>
<div class="box">
    <ul>
        <li>Имя пользователя:<?php echo $_SESSION['name'];?></li>
        <li>Данный Пароль:<?php echo $_SESSION['password'];?> виден  только вам </li>
    </ul>
    <a href="index.php">Exit</a>
</div>
</body>
</html>
