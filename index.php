<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}

$error = $_SESSION["login_error"] ?? "";
unset($_SESSION["login_error"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | User Validation</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="login-card">
        <div class="brand-icon">✓</div>
        <p class="eyebrow">USER VALIDATION</p>
        <h1>Welcome back</h1>
        <p class="subtitle">Enter your login details to continue.</p>

        <?php if ($error !== ""): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($_GET["logged_out"])): ?>
            <div class="alert success">You have logged out successfully.</div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"
                   placeholder="Enter your username" required autocomplete="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Enter your password" required autocomplete="current-password">

            <button type="submit">Log in</button>
        </form>
        <p class="hint">Demo login: <strong>student</strong> / <strong>Student@123</strong></p>
    </main>
</body>
</html>
