<?php
require_once '../Classes/database.php';
$database = new Database();
if (isset($_POST['submit_album_name'])) {

    $album = $_POST['new_album'];
    $cover_photo = $_FILES['cover_photo']['name'];
    $target = "../image/" . basename($cover_photo);
    $tmp = $_FILES['cover_photo']['tmp_name'];
    move_uploaded_file($tmp, $target);
    
    $table = "album";
    $column = "(name,cover_photo)";
    $values = "('$album','$cover_photo')";
    $database->insert($table,$column,$values);
    header('Location:../views/createNewAlbum.php');
}
?>