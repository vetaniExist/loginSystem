<?php
include_once "conf.php";

function insertUserIntoDB($userName, $email, $pass)
{
    global $solt, $dbHost, $dhUser, $dbPass, $dbName;
    $status = "ACTIVE";
    $pass = MD5($pass . $solt);

    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    $insertReult = $mysql->query("INSERT INTO `users` ( `mail`, `pass`, `name`, `status`) VALUES ('$email', '$pass', '$userName', '$status')");
    $mysql->close();

    if ($insertReult) {
        setcookie("email", $email, time() + 1200, "/");
        setcookie("pass", $pass, time() + 1200, "/");
        header('location:../../');
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

    $id = $user["id"];
    $mysql->query("UPDATE `users` SET last_login_date = NOW() WHERE id = '$id'");

    $mysql->close();

    if (mysqli_num_rows($result) == 0) {
        header("location:javascript://history.go(-1)");
        exit;
    }
    setcookie("email", $user['mail'], time() + 1200, "/");
    setcookie("pass", $user['pass'], time() + 1200, "/");

    header('location:../../');
}

function getUsersList() {
    global $dbHost, $dhUser, $dbPass, $dbName;

    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    $selectResult=$mysql->query("SELECT * FROM `users`");

    $mysql->close();
    while ($row = mysqli_fetch_assoc($selectResult)) {
        $rowID = $row["id"];
        echo "<tr>";

        echo "<td><input type='checkbox' class='checkbox' form = 'checkboxBlockForm' name='checkbox[]' value='$rowID'>";
        echo "<input type='checkbox' class ='checkbox_unlock' form = 'checkboxUnlockForm' name='checkboxUnlock[]' value='$rowID'>";
        echo "<input type='checkbox' class ='checkbox_del' form = 'checkboxDelForm' name='checkboxDel[]' value='$rowID'></td>";

        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["mail"]."</td>";
        echo "<td>".$row["registration_date"]."</td>";
        echo "<td>".$row["last_login_date"]."</td>";
        echo "<td>".$row["status"]."</td></tr>";
    }
}