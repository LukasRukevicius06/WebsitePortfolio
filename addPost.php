<?php
session_start();

// Database config
$host = 'localhost';
$db = 'ecs417';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $timestamp = date("Y-m-d H:i:s");

        $stmt = $pdo->prepare("INSERT INTO blog_posts (title, content, created_at) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $timestamp]);

        header("Location: viewBlog.php");
        exit();
    } else {
        echo "Invalid request.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>