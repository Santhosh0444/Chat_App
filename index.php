<?php
include_once 'server/database.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
} else {
    $email = $_SESSION['email'];
    $user = mysqli_query($base, "SELECT fname,lname,img,status FROM users WHERE email = '{$email}'");
    $userData = mysqli_fetch_assoc($user);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/chats.css">
    <script src="jsfile/jquery.min.js"></script>
    <script src="jsfile/main.js" defer></script>
</head>

<body>

<?php include_once ('errorDisplay.php'); ?>
<?php include_once('nav.php')?>
    <aside class="people">
        <header class="userSection flexBox">
            <div class="userDetails flexBox">
                <a href="#" class="Profile"><img src="Asserts/dbImages/<?= $userData['img'] ?>" alt="user"></a>
                <a href="#" class="details">
                    <span class="name"><?= $userData['fname'] ?> <?= $userData['lname'] ?></span>
                    <span class="status"><?= $userData['status'] ?></span>
                </a>
            </div>
            <div class="headerBtn">
                <button class="darkBtn"></button>
            </div>
        </header>

        <section class="allPeople"></section>
    </aside>

    <?php if(isset($_GET['person'])):
    $reciver = mysqli_query($base, "SELECT fname, lname, img, status FROM users WHERE email = '{$_GET['person']}'");     
    $recData = mysqli_fetch_assoc($reciver);
    $online = $recData['status'] == 'Online' ? '<span class="status flexBox"></span>' : '';
    ?>
        <main class="mainSection">
        <section class="persondetails">
            <div class="person flexBox">
                <a href="#" class="Profile"><img src="Asserts/dbImages/<?=$recData['img']?>" alt="<?=$recData['fname']?>"><?=$online?></a>
                <a href="#" class="details">
                    <span class="personName"><?=$recData['fname']?> <?=$recData['lname']?></span>
                </a>
            </div>
            <div class="moreBtn">
                <button class="flexBox"><span></span></button>
            </div>
        </section>
        <section class="messageBody"></section>

        <section class="postSection flexBox">
            <div class="messageInput">
                <textarea type="text" name="message" data-reciver = <?=$_GET['person']?>></textarea>
            </div>
            <button class="mesPost flexBox"></button>
        </section>
    </main>

    <?php endif;?>

    <script>
        setInterval(loadUsers, 500);
        function loadUsers() {
            $.ajax({
                url: 'server/people.php',
                method: 'post',
                dataType: 'html',
                success: function (e) {
                    $('.allPeople').html(e);
                }
            });
        }
    </script>

    <script src="ajax/sendmessages.js"></script>
    <script src="ajax/messages.js"></script>

    <script>
        function delMessage(element) {
            data = element.dataset.mess;
            del = 'delBoth';
            if(confirm('Are You delete message?')) {
                $.ajax({
                url: "server/delmess.php",
                dataType: 'html',
                method: 'post',
                data: {id: data, commend: del},
                success: function(e) {
                    if(e = 'success') {
                        popAlerts('Deleted Successfully');
                    }
                    else {
                        popAlerts('some error', 'error');
                    }
                }
            });
            }
        }
    </script>
</body>

</html>