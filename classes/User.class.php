<?php
    include __DIR__ . "/../config/Connection.php";

    class User {
        public $id;
        public $first_name;
        public $last_name;
        public $email;
        public $password;
        public $birthday;
        public $status;
        private $conn;

        public function __construct($conn, $id, $first_name, $last_name, $email, $password, $birthday, $status) {
            $this->conn = $conn;
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = $password;
            $this->birthday = $birthday;
            $this->status = $status;
        }

        public function register() {
            $stmt = $this->conn->prepare("INSERT INTO user (first_name, last_name, email, password, birthday, status) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $this->first_name, $this->last_name, $this->email, $this->password, $this->birthday, $this->status);
            if ($stmt->execute()) {
                header('Location: ../Vanilla-PHP-News-App/pages/login.php');
            } else {
                echo "Registration failed! <br>";
            }
            $stmt->close();
        }

        public function login($email, $password) {
            $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $results = $stmt->get_result();

            if ($results->num_rows > 0) {
                $row = $results->fetch_assoc();
                $emailDB = $row['email'];
                $passwordDB = $row['password'];
                $statusDB = $row['status'];
                $idDB = $row['id'];
            } else {
                echo "No results found! <br>";
                return;
            }

            if ($email === $emailDB && $password === $passwordDB) {
                session_start();
                date_default_timezone_set('Europe/Belgrade');
                $_SESSION["id"] = $idDB;
                $_SESSION["email"] = $emailDB;
                $_SESSION["status"] = $statusDB;
                $_SESSION["logged"] = date("d.m.Y H:i:s");

                if ($statusDB == 3) {
                    header("Location: ../pages/userWelcome.php");
                } elseif ($statusDB == 4) {
                    header("Location: ../pages/adminWelcome.php");
                }
            } else {
                echo "Login failed. Invalid email or password!";
            }
        }
    }
?>