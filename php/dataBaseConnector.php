<?php
include_once "conf.php";

function insertUserIntoDB($userName, $email, $pass)
{
    global $solt, $dbHost, $dhUser, $dbPass, $dbName;
    $status = "logged in";
    $pass = MD5($pass . $solt);

    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    $insertReult = $mysql->query("INSERT INTO `users` ( `mail`, `pass`, `name`, `status`) VALUES ('$email', '$pass', '$userName', '$status')");
    $mysql->close();

    if ($insertReult) {
        setcookie("email", $email, time() + 1200, "/");
        setcookie("pass", $pass, time() + 1200, "/");
        echo "succes";
    } else {
        header("location:javascript://history.go(-1)");
    }
}
