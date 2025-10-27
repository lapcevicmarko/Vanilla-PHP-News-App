<?php
    include __DIR__ . "/../config/Connection.php";

    class News {
        public $id;
        public $title;
        public $content;
        public $category;
        public $author_id;
        private $conn;

        public function __construct($conn, $id, $title, $content, $category, $author_id) {
            $this->conn = $conn;
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->category = $category;
            $this->author_id = $author_id;
        }

        public function addNews() {
            $stmt = $this->conn->prepare("INSERT INTO news(title, content, category, author_id) 
                    VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $this->title, $this->content, $this->category, $this->author_id);
        
            if ($stmt->execute()) {
                echo "News added successfully!";
                header('Location: ../pages/selectNews.php');
            } else {
                echo "Error while adding news: " . $this->conn->error;
            }
        
            $stmt->close();
            $this->conn->close();
        }

        public function selectNews($category = null) {
            if ($category) {
                $sql = "SELECT * FROM news WHERE category = ? ORDER BY date DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s", $category);
            } else {
                $sql = "SELECT * FROM news ORDER BY date DESC";
                $stmt = $this->conn->prepare($sql);
            }
            $stmt->execute();
            $results = $stmt->get_result();
        
            $newsArray = array();
        
            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    $newsArray[] = $row;
                }
            } else {
                echo "No news available!";
            }
        
            $stmt->close();
            return $newsArray;
        }

        public function getNewsById($id) {
            $sql = "SELECT * FROM news WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                echo "News not found!";
                return null;
            }
        
            $stmt->close();
        }

        public function getCategories() {
            $sql = "SELECT DISTINCT category FROM news ORDER BY category ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->get_result();
        
            $categories = array();
        
            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    $categories[] = $row['category'];
                }
            }
        
            $stmt->close();
            return $categories;
        }

        public function deleteNews($news_id, $user_status) {
            if ($user_status == 4) {
                $sql = "DELETE FROM news WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $news_id);
                if ($stmt->execute()) {
                    echo "News deleted successfully!";
                    header('Location: ../pages/selectNews.php');
                } else {
                    echo "Error while deleting news: " . $this->conn->error;
                }
                $stmt->close();
            } else {
                echo "You do not have permission to delete news!";
            }
        }
    }
?>