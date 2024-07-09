<?php

$base = mysqli_connect('localhost', 'root', '', 'whatsapp');

if(!$base) {
    $base = mysqli_error($base);
}

?>