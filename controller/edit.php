<?php

require_once '../Classes/database.php';
$database = new Database();
$id = $_GET['user_id'];
$table = "registration";
$column = "*";
$condition = "where id='$id'";
$result = $database->select($column, $table, $condition);
$userInfo = $result->fetch_object();
?>