<?php
    if (isset($_POST['insert'])) {
        header('Location: addNews.php');
    }

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
        <title>Admin Dashboard</title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Admin Panel</h1>
        <form action="adminWelcome.php" method="POST">
            <label for="insert">Add News</label><br>
            <input type="submit" name="insert" value="Insert"><br><br>
            <label for="select">View News</label><br>
            <input type="submit" name="select" value="Select"><br><br>
        </form>
    </body>
</html>