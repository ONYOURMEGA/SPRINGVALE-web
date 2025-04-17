<?php
session_start();

// Konfigurasi database
$host = 'localhost';
$dbname = 'springvale';
$username = 'root'; // ganti dengan username MySQL Anda
$password = ''; // ganti dengan password MySQL Anda

// Koneksi ke database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Cek apakah username dan password tidak kosong
    if (empty($user) || empty($pass)) {
        header("Location: ../login.php?error=Username dan password harus diisi!");
        exit();
    } else {
        // Query untuk memeriksa apakah username ada di database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$user]);

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Jika username ditemukan, periksa passwordnya
        if ($userData && $pass === $userData['password']) {
            $_SESSION['username'] = $user;
            header("Location: ../home.php");
            exit();
        } else {
            header("Location: ../login.php?error=Username atau password salah!");
            exit();
        }
    }
}
?>
