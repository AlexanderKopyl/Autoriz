<?php
    session_start();

$db = mysqli_connect('localhost','root','');
mysqli_select_db($db,'WMI TEst');
mysqli_query($db,"SET NAMES utf8");

echo "<p>Hello</p>";
?>
