<?php
// Database connection settings for XAMPP.
$host = "localhost";
$dbname = "user_validation";
$dbuser = "root";
$dbpass = ""; // Default XAMPP MySQL password is empty.

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $dbuser,
        $dbpass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed. Please run setup.php first and check that MySQL is running.");
}
