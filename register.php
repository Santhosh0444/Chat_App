<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/register.css">
    <script src="jsfile/register.js" defer></script>
    <script src="jsfile/jquery.min.js"></script>
    <script src="jsfile/main.js" defer></script>
    <script src="ajax/register.js" defer></script>
</head>
<body>
    <?php include('errorDisplay.php')?>
    <div class="container abs">
        <h3>REGISTER HERE!!</h3>
        <form action="<?=$_SERVER['PHP_SELF']?>">
            <div class="feildBox flexBox">
                <div class="feildSet">
                    <input type="text" name="Fname" required>
                    <span>First Name</span>
                </div>
                <div class="feildSet">
                    <input type="text" name="Lname" required>
                    <span>Last Name</span>
                </div>
                <div class="feildSet">
                    <input type="text" name="email" required>
                    <span>Email</span>
                </div>
                <div class="feildSet">
                    <input type="password" name="Fpassword" required>
                    <span>password</span>
                </div>
                <div class="feildSet">
                    <input type="password" name="Cpassword" required>
                    <span>Re-Password</span>
                </div>
                <label class="showPass flexBox">
                    <input type="checkbox">
                </label>
                <label class="dbImage flexBox">
                    <img src="Asserts/Images/user.png">
                    <input type="file" class="abs" required name="dbImg">
                    <span>Upload Image</span>
                </label>
                <label class="links">
                    <span>Already have Account?</span> <a href="login.php">Login Here</a>
                </label>
            </div>
            <div class="btn">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>