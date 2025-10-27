<?php
    if (isset($_POST['select'])) {
        header('Location: selectNews.php');
    }

    session_start();

    if (count($_SESSION) > 0) {
        echo "Email: " . $_SESSION['email'];
        echo "<br>";
        echo "Logged in: " . $_SESSION['logged'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Dashboard</title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>User Panel</h1>
        <form action="userWelcome.php" method="POST">
            <label for="select">View News</label><br>
            <input type="submit" name="select" value="Select"><br><br>
        </form>
    </body>
</html>