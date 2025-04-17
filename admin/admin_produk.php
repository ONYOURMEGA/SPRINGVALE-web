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

// Ambil data produk dari database
$stmt = $pdo->prepare("SELECT * FROM artificial_products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Simpan produk baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];  // URL gambar produk

    $stmt = $pdo->prepare("INSERT INTO artificial_products (name, price, stock, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $price, $stock, $image]);

    header("Location: admin_produk.php"); // Redirect setelah menambahkan produk
    exit();
}

// Hapus produk
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM artificial_products WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: admin_produk.php"); // Redirect setelah menghapus produk
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Admin Springvale</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 260px;
            background: palevioletred;
            color: white;
            padding: 20px;
            height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 5px;
        }
        .sidebar ul li:hover {
            background: #edaeae;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .content {
            flex: 1;
            padding: 30px;
        }
        .card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: palevioletred;
            color: white;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
        .add-product-form {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .add-product-form input, .add-product-form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Springvale</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="admin_produk.php">Produk</a></li>
            <li><a href="konfirmasi_pembayaran.php">Pesanan</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h1 style="text-align: center;">Manajemen Produk</h1>

        <!-- Form untuk menambah produk -->
        <div class="card">
            <h2>Tambah Produk</h2>
            <form method="POST" class="add-product-form">
                <input type="text" name="name" placeholder="Nama Produk" required>
                <input type="number" name="price" placeholder="Harga" required>
                <input type="number" name="stock" placeholder="Stok" required>
                <input type="text" name="image" placeholder="URL Gambar" required>
                <button type="submit" name="add_product">Tambah Produk</button>
            </form>
        </div>

        <!-- Daftar produk -->
        <div class="card">
            <h2>Daftar Produk</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td>Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td><img src="../<?php echo $product['image']; ?>" alt="Product Image" width="50"></td>
                            <td>
                                <a href="?delete=<?php echo $product['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    <button>Hapus</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
