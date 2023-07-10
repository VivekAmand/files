<?php
if (isset($_GET['message'])) {
    $msg = urldecode($_GET['message']);
    echo "<p class='message'>" . $msg . "</p>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>INFO</title>
</head>

<body style="background-color:lightyellow;">
    <fieldset>
        <form action="addinfo.php" method="POST" style="background-color:transparent;" onsubmit="return lvalid()">
            <label for="uname">NAME : </label>
            <input type="text" id="uname" name="uname"><br><br>

            <label for="pass">PASSWORD:</label>
            <input type="password" name="pass" id="pass"><br><br>
            <input type="submit" id="login-bt" name="login-bt" value="login"><br><br>
            <a href="./register.php">register</a>
            <p id="res" style="color: red;"></p>
        </form>
    </fieldset>
    <script>
        function lvalid() {
            var uname = document.getElementById("uname").value;
            var pass = document.getElementById("pass").value;
            if (uname == "" || pass == "") {
                alert("enter all details");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>