<?php
    if (isset($_POST['back'])) {
        header('Location: selectNews.php');
    }

    session_start();

    include "../config/Connection.php";
    include "../classes/News.class.php";
    include "../classes/Comment.class.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $newsObj = new News($conn, "", "", "", "", "");
        $news = $newsObj->getNewsById($id);
    } else {
        echo "News ID not provided!";
        exit;
    }

    if (isset($_POST['addComment'])) {
        $content = $_POST['content'];
        $comment = new Comment($conn, "", $content, "", $_SESSION['id'], $id);
        $comment->addComment();
    }

    if (isset($_POST['delComment']) && isset($_POST['comment_id'])) {
        $comment_id = $_POST['comment_id'];
        $comment = new Comment($conn, "", "", "", "", $id);
        $comment->deleteComment($comment_id, $_SESSION['id'], $_SESSION['status']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $news['title']; ?></title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h2><?php echo $news['title']; ?></h2>
        <p><?php echo $news['content']; ?></p>
        <small>Category: <?php echo $news['category']; ?></small><br>
        <small>Author ID: <?php echo $news['author_id']; ?></small><br>
        <small>Date: <?php echo $news['date']; ?></small>
        <br><br>
        <h3>Comments</h3>
        <?php
            $sql = "SELECT * FROM comment WHERE news_id = ? ORDER BY date DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p>" . $row['content'] . "</p>";
                    echo "<small>User ID: " . $row['user_id'] . "</small><br>";
                    echo "<small>Date: " . $row['date'] . "</small><br>";

                    if (isset($_SESSION['status']) && ($_SESSION['status'] == 4 || $_SESSION['id'] == $row['user_id'])) {
                        echo "
                        <form method='post'>
                            <input type='hidden' name='comment_id' value='" . $row['id'] . "'>
                            <input type='submit' name='delComment' value='Delete Comment'>
                        </form>";
                    }
                    echo "</div><br>";
                }
            } else {
                echo "<p>No comments to display!</p>";
            }

            if (isset($_SESSION['status'])) {
                echo "
                <h3>Add a Comment</h3>
                <form method='post'>
                    <textarea name='content' rows='5' cols='140' required></textarea><br>
                    <input type='submit' name='addComment' value='Add Comment'>
                </form>";
            }
        ?>
        <br>
        <form action="viewNews.php" method="POST"><br>
            <label for="back">Back to News List</label><br>
            <input type="submit" name="back" value="Back"><br><br>
        </form>
    </body>
</html>