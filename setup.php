<?php
// Run this file once in your browser to create the database and demo account.
$host = "localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;charset=utf8mb4",
        $dbuser,
        $dbpass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $pdo->exec("CREATE DATABASE IF NOT EXISTS user_validation CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE user_validation");
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL
        )
    ");

    $check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $check->execute(["student"]);

    if (!$check->fetch()) {
        $hash = password_hash("Student@123", PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $insert->execute(["student", $hash]);
    }

    echo "<h2>Setup completed successfully!</h2>";
    echo "<p>Database: <strong>user_validation</strong></p>";
    echo "<p>Demo username: <strong>student</strong></p>";
    echo "<p>Demo password: <strong>Student@123</strong></p>";
    echo "<p><a href='index.php'>Open the login page</a></p>";
    echo "<p>For safety, delete setup.php after setup is complete.</p>";
} catch (PDOException $e) {
    die("Setup failed. Make sure MySQL is running in XAMPP. Error: " . htmlspecialchars($e->getMessage()));
}
