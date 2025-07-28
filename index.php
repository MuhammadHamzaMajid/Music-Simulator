<?php
session_start();

$valid_username = "user";
$valid_password = "password123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
        header("Location: mood-playlist.html");  
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password. Please try again.";
        header("Location: index.php");
        exit();
    }
}
?>

<!-- adding html here for dynamic handling if the username or password entered is not correct-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mood-Based Playlist Generator</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <p>Enter your credentials to access the Playlist Generator</p>
        
        <!-- Display error message if it exists -->
        <?php 
        if (isset($_SESSION['error'])): ?>
        <p style="color: red; font-size: 0.9em; margin-top: 10px; text-align: center;">
            <?php echo $_SESSION['error']; ?>
        </p>
            <?php unset($_SESSION['error']); // Clear the error after displaying it ?>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="signup-link">
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
</body>
</html>
