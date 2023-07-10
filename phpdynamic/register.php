<?php
if (isset($_GET['message'])) {
    $msg = urldecode($_GET['message']);
    echo "<p class='message'>" . $msg . "</p>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>register_page</title>
</head>

<body style="background-color: lightslategray;">
    <fieldset>
        <legend>REGISTER</legend>
        <form action="addinfo.php" method="POST" style="background-color:transparent;" onsubmit="return rvalidate()" autocomplete="off">
            <label for="uname">NAME : </label>
            <input type="text" id="uname" name="uname"><br><br>
            <label for="uemail">EMAIL:</label>
            <input type="text" id="uemail" name="uemail"><br><br>
            <label for="pass">PASSWORD:</label>
            <input type="password" name="pass" id="pass"><br><br>
            <label for="cpass">CONFIRM PASSWORD:</label>
            <input type="password" name="cpass" id="cpass"><br><br>
            <input type="submit" id="register-bt" name="register-bt" value="register">
        </form>
    </fieldset>
    <script>
        function rvalidate() {
            var uname = document.getElementById("uname").value;
            var uemail = document.getElementById("uemail").value;
            var pass = document.getElementById("pass").value;
            var cpass = document.getElementById("cpass").value;
            if (cpass != pass) {
                alert("enter same passwords");
                return false;
            }
            if (uname == "" || uemail == "" || pass == "" || cpass == "") {
                alert("enter all details");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>