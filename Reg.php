<?php
session_start();
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
    <form action="RegController.php" method="POST">
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