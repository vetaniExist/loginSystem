<?php
    include "../../php/dataBaseConnector.php";

    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    tryLogin($mail, $pass);
?>