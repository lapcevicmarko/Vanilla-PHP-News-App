<?php
    if (isset($_POST['back'])) {
        header('Location: adminWelcome.php');
    }

    session_start();

    include "../config/Connection.php";
    include "../classes/News.class.php";

    $news = new News($conn, "", "", "", "", "");
    $categories = $news->getCategories();

    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;
    $newsArray = $news->selectNews($selectedCategory);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>News Titles</title>
        <link href="../assets/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h2>News Headlines</h2>
        <nav>
            <ul>
                <li><a href="selectNews.php">All News</a></li>
                <?php
                foreach ($categories as $category) {
                    echo "<li><a href='selectNews.php?category=" . urlencode($category) . "'>" . $category . "</a></li>";
                }
                ?>
            </ul><br>
        </nav>
        <?php
        if (!empty($newsArray)) {
            foreach ($newsArray as $newsItem) {
                echo "<div class='news-title'>";
                echo "<a href='viewNews.php?id=" . $newsItem['id'] . "'>" . $newsItem['title'] . "</a>";

                if (isset($_SESSION['status']) && $_SESSION['status'] == 4) {
                    echo " <a class='del' href='delNews.php?id=" . $newsItem['id'] . "'>Delete</a>";
                }

                echo "</div><br>";
            }
        } else {
            echo "<p>No news to display!</p>";
        }

        if (isset($_SESSION['status']) && $_SESSION['status'] == 4) {
            echo "
            <form action='selectNews.php' method='POST'>
                <br>
                <label for='back'>Back to Dashboard</label><br>
                <input type='submit' name='back' value='Back'><br><br>
            </form>";
        }
        ?>
    </body>
</html>