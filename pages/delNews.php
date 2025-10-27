<?php
    session_start();

    include "../config/Connection.php";
    include "../classes/News.class.php";

    if (isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['status']) && $_SESSION['status'] == 4) {
        if (isset($_GET['id'])) {
            $news_id = $_GET['id'];
            $news = new News($conn, "", "", "", "", "");
            $news->deleteNews($news_id, $_SESSION['status']);
        } else {
            echo "News ID not provided!";
        }
    } else {
        echo "You do not have permission to delete news!";
    }
?>