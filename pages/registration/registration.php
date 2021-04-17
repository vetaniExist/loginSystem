<?php
    include "../../php/dataBaseConnector.php";

    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];
    
    insertUserIntoDB($name,$mail,$pass);

?>