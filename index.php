<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorization page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="vh-100">
    <?php
    if (!isset($_COOKIE["email"]) || !isset($_COOKIE["pass"])):
    ?>
    <div class="mb-3 d-flex justify-content-center vh-100">
        <div class="mw-500 d-flex flex-column justify-content-center">
            <form class="d-flex flex-column justify-content-center align-content-center " action="pages/auth/auth.php" method="POST">
                <input type="email" class="form-control" name="mail" id="mail" placeholder="email" required><br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="possword" required><br>
                <input type="submit" class="btn btn-primary mb-3" value = "LOGIN">
            </form>
            <a href="pages/registration/registration.html" class="btn btn-primary mb-3 mw-500">REGISTER</a>
        </div>
    </div>
    <?php else: ?>
        <p>You have mail and pass</p>
        <a href="pages/logout/">EXIT</a>
    <?php endif; ?>
</body>

</html>