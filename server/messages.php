<?php
include_once ('session.php');
$receiver = $_POST['rec'];
$allMessage = null;

$mess = mysqli_query($base, "SELECT sender,message,id,messStatus FROM message WHERE (sender = '{$email}' AND receiver = '{$receiver}') OR (sender = '{$receiver}' AND receiver = '{$email}')");

if (mysqli_num_rows($mess) > 0) {
    while ($message = mysqli_fetch_assoc($mess)) {
        $mesid = $message['id'];
        $mesFunction = 'onclick = delMessage(this)';
        $mestatus = $message['messStatus'] == 'delBoth' ? '' : "<button data-mess='{$mesid}' class='mask-style' {$mesFunction}></button>";
        if ($message['sender'] == $email) {
            $data = img($email, $base);
            $allMessage .= "<div class='userMess'>
            {$mestatus}
            <p>{$message['message']}</p>
            <img src='Asserts/dbImages/{$data['img']}' alt='{$data['fname']}'>
        </div>";
        } else {
            $data = img($receiver, $base);
            $allMessage .= "<div class='othersMess'>
            <p>{$message['message']}</p>
            <img src='Asserts/dbImages/{$data['img']}' alt='{$data['fname']}'>
        </div>";
        }
    }
} else {
    $allMessage = '<span class="abs">No message yet...</span>';
}

echo $allMessage;

function img($person, $sql)
{
    $img = mysqli_fetch_assoc(mysqli_query($sql, "SELECT img,fname FROM users WHERE email = '{$person}'"));
    return $img;
}
?>