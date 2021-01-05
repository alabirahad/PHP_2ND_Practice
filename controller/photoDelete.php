<?php

require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_GET['user_id'];
$table = 'image';
$condition = "id";
$database->delete($id, $table,$condition);
header ("location:../views/gallery.php");
?>