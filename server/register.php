<?php
include "database.php";
session_start();
$fname = mysqli_escape_string($base, $_POST['Fname']);
$lname = mysqli_escape_string($base, $_POST['Lname']);
$email = mysqli_escape_string($base, $_POST['email']);
$fpassword = mysqli_escape_string($base, $_POST['Fpassword']);
$cpassword = mysqli_escape_string($base, $_POST['Cpassword']);
$file = $_FILES['dbImg'];
if ($fname == '' || $lname == '' || $email == '' || $fpassword == '' || $cpassword == '') {
    echo 'Enter all Inputs';
} else {
    if ($file['name'] == '') {
        echo 'Upload image File';
    } else {
        if ($fpassword == $cpassword) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $exe = ['png', 'jpg', 'jpeg', 'svg'];
                $fileExe = pathinfo($file['name'], PATHINFO_EXTENSION);
                if (in_array($fileExe, $exe)) {
                    if (0 < $file['error']) {
                        echo "some error on upload";
                    } else {
                        $chk = mysqli_query($base, "SELECT email FROM users WHERE email = '{$email}'");
                        if (mysqli_num_rows($chk) > 0) {
                            echo "Already User Found";
                        } else {
                            $fileName = $email . '.' . $fileExe;
                            if (move_uploaded_file($file['tmp_name'], '../Asserts/dbImages/' . $fileName)) {
                                $addData = mysqli_query($base, "INSERT INTO users (fname, lname, email, password, img, status) VALUES ('{$fname}', '{$lname}', '{$email}', '{$fpassword}', '{$fileName}', 'Online')");
                                if ($addData) {
                                    $_SESSION['email'] = $email;
                                    echo 'success';
                                } else {
                                    echo 'some error';
                                }
                            } else {
                                echo 'something went wrong!!';
                            }
                        }
                    }
                } else {
                    echo 'Please upload image files';
                }

            } else {
                echo 'Enter Valid Email';
            }
        } else {
            echo 'password not matched';
        }
    }
}
?>