<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="login-card dashboard">
        <div class="brand-icon">✓</div>
        <p class="eyebrow">AUTHENTICATION COMPLETE</p>
        <h1>Login successful!</h1>
        <p class="subtitle">
            Welcome, <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong>.
            Your username and password matched the database.
        </p>
        <div class="status">
            <span class="status-dot"></span>
            You are securely logged in.
        </div>
        <a class="button-link" href="logout.php">Log out</a>
    </main>
</body>
</html>
