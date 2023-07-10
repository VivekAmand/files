<?php
session_start();
$con = mysqli_connect('localhost', 'root', 'root', 'customers');
if ($con) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register-bt'])) {
        if (isset($_POST['uname']) && isset($_POST['uemail']) && isset($_POST['pass'])) {
            $uname = $_POST['uname'];
            $uemail = $_POST['uemail'];
            $pass = $_POST['pass'];
            $result = mysqli_query($con, "SELECT * FROM users WHERE name='$uname' OR email='$uemail'");
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO users(name,email,password) VALUES ('$uname','$uemail','$pass')";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $msg = "Registration succesful!";
                    header("Location:index.php?message=" . urldecode($msg));
                } else {
                    $msg = "Unable to register, Retry!!";
                    header("Location:register.php?message=" . urldecode($msg));
                }
            } else {
                $msg = "Username or Email already exists!!!";
                header("Location:register.php?message=" . urldecode($msg));
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login-bt'])) {
        if (isset($_POST['uname']) && isset($_POST['pass'])) {
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $result = mysqli_query($con, "SELECT * FROM users WHERE name='$uname'");
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                if ($pass == $row['password']) {
                    $_SESSION['uname'] = $uname;
                    header("Location:website.php");
                } else {
                    $msg = "Enter valid credentials!!";
                    header("Location:index.php?message=" . urldecode($msg));
                }
            } else {
                $msg = "Account Dosent Exists!!!,please register";
                header("Location:index.php?message=" . urldecode($msg));
            }
        }
    }
} else {
    echo "unable to connect server";
}
