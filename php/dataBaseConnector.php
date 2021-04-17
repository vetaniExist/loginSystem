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

function tryLogin($mail, $pass) {
    global $solt, $dbHost, $dhUser, $dbPass, $dbName;
    $pass = MD5($pass . $solt);

    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);

    $result=$mysql->query("SELECT * FROM `users` WHERE mail='$mail' AND pass='$pass'");
    $user=$result->fetch_assoc();

    $mysql->close();

    if (mysqli_num_rows($result) == 0) {
        header("location:javascript://history.go(-1)");
        exit;
    }
    setcookie("email", $user['mail'], time() + 1200, "/");
    setcookie("pass", $user['pass'], time() + 1200, "/");

    header('location:../../');
}
