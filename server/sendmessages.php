<?php
include 'session.php';
$receiver = $_POST['receiver'];
$massage = $_POST['massage'];
if ($massage != '') {
    $messages = mysqli_query($base, "INSERT INTO message (sender, receiver, message, messStatus) VALUES ('{$email}','{$receiver}','{$massage}', 'showAll')");
    echo $messages ? 'send' : 'notSend';
}
?>