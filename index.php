<?php
    include("session.php");


    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pw = $_POST['password'];
        if($user == "aaa" && $pw == "aaa"){
            session_start();
            $_SESSION['user']=$user;
            header("Location: main.php");
        }
        else{
            echo "<script>alert('Érvénytelen felhasználónév vagy jelszó!')</script>";
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vida Zoltán János A9PXI3 Int Alk II.</title>
    </head>
    <body>
        <form method="post">
            <table align="center">
                <tr>
                    <td>Felhasználó:</td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Jelszó:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Belépés"></td>
                </tr>
            </table>
        </form>
    </body>
</html>