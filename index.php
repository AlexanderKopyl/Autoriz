<?php
    session_start();

    if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
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
    <form  action="contact.php" method="post">
        <label for="name">Ваше Имя</label><br>
        <input type="text" id="name" required name="name" placeholder="Введите ваше Имя" value="<?php echo $_POST['name']?>"><br>
        <label for="password">Ваше Пароль</label><br>
        <input type="password" required id="password" name="password"><br>

        <input id="btn_submit" type="submit" value="Вход">
        <a href="http://autoriz/Reg.php">Регистрация</a>
    </form>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>