<?php

require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_GET['user_id'];
$table = 'album';
$condition = "id";
$table2 = 'image';
$condition2 = "album_id";
$database->delete($id, $table,$condition);
$database->delete($id, $table2,$condition2);
header("location:../views/albumList.php");
?>