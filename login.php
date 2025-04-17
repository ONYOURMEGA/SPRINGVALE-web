<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Springvale</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>
    <!-- Back button ke index.html -->
    <a href="index.php" class="back-button">&#x2190;</a> 

    <div class="container">
        <div class="login-box">
            <h1>Springvale</h1>
            <p>Welcome back!</p>

            <!-- Menampilkan alert jika ada error login -->
            <?php if (isset($_GET['error'])): ?>
                <div style="color: red; padding: 10px; background-color: #f8d7da; border-radius: 5px; margin-bottom: 10px;">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php endif; ?>

            <form action="process/proses-login.php" method="POST">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                <div class="checkbox">
                    <input type="checkbox" name="terms" required>
                    <label for="terms">I agree to the Terms & Privacy</label>
                </div>
                <button type="submit">Login</button>
            </form>
            <p class="register">Don't have an account? <a href="register.php">Register</a></p>
        </div>
        <div class="image-placeholder"></div>
    </div>
</body>
</html>
