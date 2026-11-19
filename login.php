<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    $_SESSION["login_error"] = "Please enter both username and password.";
    header("Location: index.php");
    exit();
}

// Prepared statements help protect the application from SQL injection.
$stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE username = :username LIMIT 1");
$stmt->execute(["username" => $username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user["password_hash"])) {
    session_regenerate_id(true);
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    header("Location: dashboard.php");
    exit();
}

$_SESSION["login_error"] = "Invalid username or password. Please try again.";
header("Location: index.php");
exit();
