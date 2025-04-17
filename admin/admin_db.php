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
?>
