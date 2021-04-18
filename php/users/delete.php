<?php
include_once "../conf.php";

if (isset($_POST["delete"])) {
    $boxes = $_POST['checkboxDel'];
    $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
    foreach($boxes as $id) {
        $mysql->query("DELETE FROM `users` WHERE id = '$id'");
    }
    $mysql->close();
}
header('location:../../');
?>