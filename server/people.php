<?php 
include 'session.php';
$list = null;
$last = null;
$people = mysqli_query($base, "SELECT * FROM users WHERE status = 'Online' AND email != '{$email}'");

if (mysqli_num_rows($people) > 0) {
    while ($row = mysqli_fetch_assoc($people)) {
        $lastMess = mysqli_query($base, "SELECT * FROM message WHERE (sender = '{$row['email']}' AND receiver = '{$email}') OR (sender = '{$email}' AND receiver = '{$row['email']}') ORDER BY id DESC LIMIT 1");
        $mesData = mysqli_fetch_assoc($lastMess);
        if(mysqli_num_rows($lastMess) > 0) {
            $mess = strlen($mesData['message']) <= 35? $mesData['message'] : substr($mesData['message'],0,30).'...';
            $last = $mesData['sender'] == $email ? 'You: '. $mess : $mess;
        }
        else {
            $last = 'No Message Yet...';
        }
        $online = $row['status'] == 'Online' ? '<span class="status flexBox"></span>' : '';
        $list.= "
        <div class='person'>
            <a href='?img={$row['email']}' class='Profile'><img src='Asserts/dbImages/{$row['img']}' alt='{$row['fname']}'>{$online}</a>
            <a href='?person={$row['email']}' class='details'>
                <span class='personName'>{$row['fname']} {$row['lname']}</span>
                <span class='lastmess'>{$last}</span>
            </a>
        </div>
        ";
    }
}
else {
    $list = '<span class="abs">No Users Found</span>';
}

echo $list;

?>
