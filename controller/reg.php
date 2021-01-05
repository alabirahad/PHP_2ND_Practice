<?php

require_once '../Classes/database.php';
$database = new Database();
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $photo = $_FILES['photo']['name'];
    $target = "../image/" . basename($photo);
    $tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, $target);
    $division = $_POST['division'];
    $district = $_POST['district'];
    $thana = $_POST['thana'];
    $password = $_POST['password'];
    $password = md5($password);
    
    $table = "registration";
    $column = "(fname,lname,email,phone,photo,division,district,thana,password)";
    $values = "('$fname','$lname','$email','$phone','$photo','$division','$district','$thana','$password')";
    $database->insert($table,$column,$values);
    header('Location:../views/userinfo.php');
}
?>