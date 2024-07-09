<?php
include_once ('session.php');
$mess = $_POST['id'];
$cmd = $_POST['commend'];
$qry = mysqli_query($base, "UPDATE message SET message = 'Message Was Deleted...', messStatus = '{$cmd}' WHERE id ='{$mess}'");
echo $qry ? 'success' : 'error';
?>