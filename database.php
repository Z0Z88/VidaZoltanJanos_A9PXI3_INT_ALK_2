<?php
    $myslqusername="root";
    $mysqlpw="";
    $mysqlhost="localhost";
    $dbname="ownedcars";
    $connect=mysqli_connect($mysqlhost,$myslqusername,$mysqlpw,$dbname) OR die('Csatlakozás az adatbázishoz sikertelen!');
?>