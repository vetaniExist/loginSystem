<?php
    include_once __DIR__.("../../../php/conf.php");
    function checkStatus($mail, $soltedPass) {
        global $dbHost, $dhUser, $dbPass, $dbName;

        $mysql = new mysqli($dbHost, $dhUser, $dbPass, $dbName);
        $selectResult=$mysql->query("SELECT * FROM `users` WHERE mail='$mail' AND pass='$soltedPass'");
        $mysql->close();

        if (mysqli_num_rows($selectResult) == 0) {
            return false;
        }

        $user=$selectResult->fetch_assoc();
        return $user["status"] == "ACTIVE";

    }
?>