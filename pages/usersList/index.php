<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<?php
    include_once ("../auth/checkAuthStatus.php");
    if (isset($_COOKIE["email"]) || isset($_COOKIE["pass"]) || checkStatus($_COOKIE["email"], $_COOKIE["pass"])) :
?>
<body>
    <div class="d-flex">
        <form action="../../php/users/block.php" id="checkboxBlockForm" method="POST">
            <button class="btn btn-secondary mb-1 mw-80" type="submit" name="block">Block</button>
        </form>

        <form action="../../php/users/unlock.php" id="checkboxUnlockForm" method="POST">
            <button class="btn btn-light" type="submit" name="unlock"><img src="./images/lock.svg" alt=""></button>
        </form>
        
        <form action="../../php/users/delete.php" id="checkboxDelForm" method="POST">
            <button class="btn btn-light"type="submit" name="delete"><img src="./images/trash.svg" alt=""></button>
        </form>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th><input type="checkbox" id="selectAllChecbox"></th>
                <th>id</th>
                <th>name</th>
                <th>mail</th>
                <th>registration date</th>
                <th>last login</th>
                <th>status</th>
            </tr>
        </thead>
        <?php
        include "../../php/dataBaseConnector.php";
        getUsersList();
        ?>
    </table>
    <a href="../logout/" class="btn btn-primary">EXIT</a>
</body>
<?php
else:
    header('location: ../../');
endif;
?>
<script src="./selectAll.js"></script>
</html>