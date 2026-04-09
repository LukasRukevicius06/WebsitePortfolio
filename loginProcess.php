<?php
session_start();

// Database connection settings
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecs417";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['user_email'] = $user['email'];
            header("Location: viewBlog.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect email or password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Incorrect email or password.";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>