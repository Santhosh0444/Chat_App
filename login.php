<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/register.css">
    <link rel="stylesheet" href="stylesheet/login.css">
    <script src="jsfile/jquery.min.js"></script>
    <script src="jsfile/main.js" defer></script>
    <script src="ajax/login.js" defer></script>
</head>

<body>
    <?php include_once('errorDisplay.php')?>
    <div class="container abs">
        <h3>LOGIN HERE!!</h3>
        <form action="#">
            <div class="feildBox flexBox">
                <div class="feildSet">
                    <input type="text" name="email" required>
                    <span>Email</span>
                    <div class="userDb abs"></div>
                </div>
                <div class="feildSet">
                    <input type="password" name="password" required>
                    <span>password</span>
                </div>
                <label class="showPass flexBox">
                    <input type="checkbox">
                </label>
                <div class="links flexBox">
                    <label class="left">
                        <span>Don't have Account?</span> <a href="register.php">Register Here</a>
                    </label>
                    <label class="right">
                        <a href="#">Forget Password?</a>
                    </label>
                </div>
            </div>
            <div class="btn">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <script>
        let inputPasswords = document.querySelectorAll('input[type="password"]'),
            passCheck = document.querySelector('.showPass input');

        passCheck.onclick = () => {
            inputPasswords.forEach(element => {
                showPassword(passCheck, element);
            });
        };
    </script>
</body>

</html>