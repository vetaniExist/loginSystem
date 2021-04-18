<?php
include_once "../conf.php";

if (isset($_POST["unlock"])) {
    $boxes = $_POST['checkboxUnlock'];
    $status = "ACTIVE";
    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    foreach($boxes as $id) {
        $mysql->query("UPDATE `users` SET status = '$status' WHERE id = '$id'");
    }
    $mysql->close();
}
header('location:../../');
?>