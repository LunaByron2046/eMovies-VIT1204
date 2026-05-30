<?php
class RestServerDB {
    private $conn;

    public function __construct() {
        require_once BASE_PATH . '/config.php';
        try {
            $this->conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                )
            );
        } catch(PDOException $e) {
            die("数据库连接失败: " . $e->getMessage());
        }
    }

    
    public function getAllGames() {
        $stmt = $this->conn->prepare("SELECT * FROM games");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public function getGameById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    
    public function addGame($name, $platform, $monthly_subscription, $category, $filename) {
        $sql = "INSERT INTO games (name, platform, monthly_subscription, category, filename) 
                VALUES (:name, :platform, :monthly_subscription, :category, :filename)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':platform', $platform);
        $stmt->bindParam(':monthly_subscription', $monthly_subscription, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':filename', $filename);
        return $stmt->execute();
    }

    
    public function searchGames($keyword) {
        $sql = "SELECT * FROM games WHERE name LIKE :keyword OR category LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $likeKeyword = "%$keyword%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}