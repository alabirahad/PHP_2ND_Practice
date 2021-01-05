<?php

require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_GET['user_id'];
$table = 'registration';
$condition = "id";
$database->delete($id, $table,$condition);
header ("location:../views/userinfo.php");
?>