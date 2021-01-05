<?php

require_once '../Classes/login.php';
if (isset($_POST['login'])) {
    $database = new Database();
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $password = md5($password);
    $login = new Login();
    $login->login($username, $password);
}
?>