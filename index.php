<?php
    include "config/Connection.php";
    require_once "classes/User.class.php";

    if (isset($_POST['submit'])) {
        if (
            isset($_POST['first_name']) &&
            isset($_POST['last_name']) &&
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['birthday']) &&
            isset($_POST['status'])
        ) {
            $id = null;
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $birthday = $_POST['birthday'];
            $status = $_POST['status'];

            $user = new User($conn, $id, $first_name, $last_name, $email, $password, $birthday, $status);
            $user->register();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Registration</title>
        <link href="assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h2>User Registration Form</h2>
        <form action="index.php" method="POST">
            <fieldset>
                <label for="first_name">First Name: </label><br>
                <input type="text" name="first_name"><br>
                <label for="last_name">Last Name: </label><br>
                <input type="text" name="last_name"><br>
                <label for="email">Email: </label><br>
                <input type="text" name="email"><br>
                <label for="password">Password: </label><br>
                <input type="password" name="password"><br>
                <label for="birthday">Date of Birth: </label><br>
                <input type="text" name="birthday"><br><br>
                <label for="status">User Type: </label><br>
                <select name="status" id="status">
                    <option value="" disabled selected>Select</option>
                    <option value="3">Regular User</option>
                    <option value="4">Administrator</option>
                </select>
                <br><br>
                <input type="submit" name="submit" value="Register">
                <p class="ptext">Already have an account? <a href="pages/login.php">Log in!</a></p>
            </fieldset>
        </form>
    </body>
</html>