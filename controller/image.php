<?php

//require_once 'Classes/database.php';
$database = new Database();
if (isset($_POST['submit_photo'])) {

    $album = $_POST['album'];
    $photo = $_FILES['photo']['name'];
    $target = "../image/" . basename($photo);
    $tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, $target);

    $table = "image";
    $column = "(photo,album_id)";
    $values = "('$photo','$album')";
    $database->insert($table, $column, $values);
    header('Location: ../views/uploadPhoto.php');
}
?>