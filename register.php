<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'springvale';
$username = 'root'; // ganti dengan username MySQL Anda
$password = ''; // ganti dengan password MySQL Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($email) || empty($username) || empty($password)) {
        $error_message = "Semua field harus diisi!";
    } else {
        // Cek apakah username sudah terdaftar
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            $error_message = "Username atau email sudah terdaftar!";
        } else {
            // Simpan pengguna baru ke database tanpa enkripsi password
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);

            // Redirect setelah registrasi berhasil
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Springvale</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            margin: 0;
        }
        .container {
            display: flex;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .back-button {
            position: absolute;
            padding: 20px;
            top: 60px;
            left: 80px;
            font-size: 24px;
            text-decoration: none;
            color: black;
            width: 10px;
            height: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }
        .back-button:hover {
            background: rgba(0, 0, 0, 0.1);
        }
        .register-box {
            width: 300px;
            margin-right: 40px;
        }
        .register-box h1 {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
        }
        input:focus {
            border-color: #c69;
            outline: none;
        }
        .checkbox {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-top: 5px;
        }
        .checkbox input {
            margin-right: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #BA7291;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
        }
        button:hover {
            background-color: #9e3c68;
        }
        .login {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
        .login a {
            color: #c69;
            font-weight: bold;
            text-decoration: none;
        }
        .login a:hover {
            text-decoration: underline;
        }
        .image-placeholder {
            width: 300px;
            height: 400px;
            border-radius: 10px;
            background: url('assets/38.jpeg') no-repeat center center/cover;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-button">&#x2190;</a>

    <div class="container">
        <div class="register-box">
            <h1>Springvale</h1>
            <p>Get Started</p>
            <form method="POST">
                <label>Email address</label>
                <input type="email" name="email" id="email" placeholder="name@gmail.com" required>
                <label>Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <div class="checkbox">
                    <input type="checkbox" id="terms" required> 
                    <label for="terms">I agree to the Terms & Privacy</label>
                </div>
                <button type="submit">Register</button>
            </form>
            <p class="login">Have an account? <a href="login.php">Login</a></p>
            <?php if (isset($error_message)): ?>
                <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
        <div class="image-placeholder"></div>
    </div>
</body>
</html>