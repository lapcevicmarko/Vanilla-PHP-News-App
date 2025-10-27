<?php
    if (isset($_POST['back'])) {
        header('Location: adminWelcome.php');
    }

    session_start();

    include "../config/Connection.php";
    require_once "../classes/News.class.php";

    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_SESSION['id'])) {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category']) && !empty($_SESSION['id'])) {
            date_default_timezone_set('Europe/Belgrade');
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $author_id = $_SESSION['id'];

            $news = new News($conn, null, $title, $content, $category, $author_id);
            $news->addNews();
        } else {
            echo "All fields are required!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add News</title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h2>News Submission Form</h2>
        <form action="addNews.php" method="POST">
            <fieldset>
                <label for="title">Title: </label><br>
                <input type="text" name="title" required><br>
                <label for="content">Content: </label><br>
                <textarea name="content" rows="10" cols="100" required></textarea><br>
                <label for="category">Category: </label><br>
                <input type="text" name="category" required><br>
                <input type="hidden" name="author_id" value="<?php echo $_SESSION['id']; ?>">
                <br>
                <input type="submit" name="submit" value="Add News">
                <br><br>
            </fieldset>
        </form>
        <form action="addNews.php" method="POST"> 
            <br>
            <label for="back">Back to Dashboard</label>
            <input type="submit" name="back" value="Back">
        </form>
    </body>
</html>