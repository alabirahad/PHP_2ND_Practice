<?php

require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_POST['user_id'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $photo = '';
    if (!empty($_FILES['cover_photo']['name'])) {
        $photo = $_FILES['cover_photo']['name'];
        $target = "../image/" . basename($photo);
        $tmp = $_FILES['cover_photo']['tmp_name'];
        move_uploaded_file($tmp, $target);
    } else {
        $photo = $_POST['prev_cover_photo'];
    }
    $table = "album";
    $column = "name='$name', cover_photo='$photo'";
    $database->update($table,$column,$id);
    header('Location:../views/albumList.php');
}
?>