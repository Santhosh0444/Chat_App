<?php
include 'database.php';
session_start();
$email = mysqli_escape_string($base, $_POST['email']);
$password = mysqli_escape_string($base, $_POST['password']);
if ($email == '' || $password == '') {
    echo 'Please Enter All Inputs';
} else {
    $addData = mysqli_query($base, "SELECT email FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($addData) > 0) {
        $_SESSION['email'] = $email;
        echo 'success';
    } else {
        echo 'invalid Email or password';
    }
}
?>