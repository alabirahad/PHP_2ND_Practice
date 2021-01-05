<?php
require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_POST['user_id'];
if (isset($_POST['submit'])) {
    $photo = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "image/" . basename($photo);
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp, $target);
    } else {
        $photo = $_POST['prev_photo'];
    }
    
    $table = "image";
    $column = "photo='$photo'";
    $database->update($table,$column,$id);
    header('Location:../views/gallery.php');
}
?>