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

<body>
    <form action="" id="checkboxForm"></form>
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
<script src="./selectAll.js"></script>
</html>