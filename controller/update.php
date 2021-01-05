<?php

require_once '../Classes/database.php';
$session = new Session();
$session->sessionStart();
$database = new Database();
$id = $_POST['user_id'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $photo = '';
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "../image/" . basename($photo);
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp, $target);
    } else {
        $photo = $_POST['prev_photo'];
    }

    $division = $_POST['division'];
    $district = $_POST['district'];
    $thana = $_POST['thana'];

    $table = "registration";
    $column = "fname='$fname',
            lname='$lname',
            email='$email',
            phone='$phone',
            photo='$photo',
            division='$division',
            district='$district',
            thana='$thana'";
    $database->update($table, $column, $id);
    header('Location:../views/userinfo.php');
}
?>