<?php
    require_once "../classes/User.class.php";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User($conn, "", "", "", $email, $password, "", "");
            $user->login($email, $password);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h2>User Login Form</h2>
        <form action="login.php" method="POST">
            <fieldset>
                <label for="email">Email: </label><br>
                <input type="text" name="email"><br>
                <label for="password">Password: </label><br>
                <input type="password" name="password"><br>
                <input type="submit" name="submit" value="Login">
            </fieldset>
        </form>
    </body>
</html>