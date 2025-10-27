<?php
    include __DIR__ . "/../config/Connection.php";
    
    class Comment {
        public $id;
        public $content;
        public $date;
        public $user_id;
        public $news_id;
        private $conn;

        public function __construct($conn, $id, $content, $date, $user_id, $news_id) {
            $this->conn = $conn;
            $this->id = $id;
            $this->content = $content;
            $this->date = $date;
            $this->user_id = $user_id;
            $this->news_id = $news_id;
        }

        public function addComment() {
            $stmt = $this->conn->prepare("INSERT INTO comment (content, date, user_id, news_id) VALUES (?, NOW(), ?, ?)");
            $stmt->bind_param("sii", $this->content, $this->user_id, $this->news_id);
            
            if ($stmt->execute()) {
                echo "Comment added successfully!";
                header('Location: ../pages/viewNews.php?id=' . $this->news_id);
            } else {
                echo "Error while adding comment: " . $this->conn->error;
            }

            $stmt->close();
        }

        public function deleteComment($comment_id, $user_id, $user_status) {
            if ($user_status == 4 || ($user_status == 3 && $this->isOwner($comment_id, $user_id))) {
                $sql = "DELETE FROM comment WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $comment_id);

                if ($stmt->execute()) {
                    echo "Comment deleted successfully!";
                    header('Location: ../pages/viewNews.php?id=' . $this->news_id);
                } else {
                    echo "Error while deleting comment: " . $this->conn->error;
                }

                $stmt->close();
            } else {
                echo "You do not have permission to delete this comment!";
            }
        }

        private function isOwner($comment_id, $user_id) {
            $sql = "SELECT user_id FROM comment WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $comment_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['user_id'] == $user_id;
            }

            $stmt->close();
            return false;
        }
    }
?>