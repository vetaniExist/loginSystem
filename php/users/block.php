<?php
include_once "../conf.php";

if (isset($_POST["block"])) {
    $boxes = $_POST['checkbox'];
    $status = "BLOCKED";
    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    foreach($boxes as $id) {
        echo $id . "<br>";
        $mysql->query("UPDATE `users` SET status = '$status' WHERE id = '$id'");
    }
    $mysql->close();
}
header('location:../../');
?>