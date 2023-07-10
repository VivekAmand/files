<?php
session_start();
$uname = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>website</title>
    <style>
        .logout-bt {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <form action="website.php" method="POST">
        <input type="submit" name="logout-bt" class="logout-bt" value="Logout">
    </form>
    <h1>WELCOME,<?php echo $uname; ?></h1>

</body>

</html>
<?php
if (isset($_POST['logout-bt'])) {
    session_destroy();
    header('location:index.php');
}
?>