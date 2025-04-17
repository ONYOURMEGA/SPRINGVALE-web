<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$host = 'localhost';
$dbname = 'springvale';
$dbUsername = 'root';
$dbPassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $loggedInUsername = $_SESSION['username'];

    // Ambil data user saat ini
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $loggedInUsername]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "User tidak ditemukan.";
        exit();
    }

    // Jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newUsername = trim($_POST['username']);
        $newEmail = trim($_POST['email']);

        // Validasi sederhana
        if (empty($newUsername) || empty($newEmail)) {
            $error = "Semua field harus diisi!";
        } else {
            // Update data di database
            $updateStmt = $pdo->prepare("UPDATE users SET username = :newUsername, email = :email WHERE username = :currentUsername");
            $updateStmt->execute([
                'newUsername' => $newUsername,
                'email' => $newEmail,
                'currentUsername' => $loggedInUsername
            ]);

            // Update session username jika diganti
            $_SESSION['username'] = $newUsername;

            // Redirect ke profile
            header("Location: profile.php");
            exit();
        }
    }

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .edit-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .btn-container {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .save-btn {
            background-color: #BA7291;
            color: white;
        }

        .cancel-btn {
            background-color: #ccc;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>Edit Profile</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>

        <div class="btn-container">
            <button type="submit" class="save-btn">Simpan</button>
            <button type="button" onclick="window.location.href='profile.php'" class="cancel-btn">Batal</button>
        </div>
    </form>
</div>

</body>
</html>