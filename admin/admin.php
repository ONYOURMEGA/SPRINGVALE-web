<?php
include 'admin_db.php'; // Include koneksi database

// Ambil data produk dari database
$stmt_products = $pdo->prepare("SELECT * FROM artificial_products");
$stmt_products->execute();
$products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);

// Ambil data pesanan dari database
$stmt_orders = $pdo->prepare("SELECT * FROM orders");
$stmt_orders->execute();
$orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);

// Proses tambah produk
if (isset($_POST['add_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $stock = $_POST['product_stock'];
    
    // Insert produk baru
    $stmt = $pdo->prepare("INSERT INTO artificial_products (name, price, stock) VALUES (?, ?, ?)");
    $stmt->execute([$name, $price, $stock]);
    header('Location: admin.php'); // Refresh halaman
}

// Proses edit produk
if (isset($_POST['edit_product'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $stock = $_POST['product_stock'];
    
    // Update produk
    $stmt = $pdo->prepare("UPDATE artificial_products SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt->execute([$name, $price, $stock, $id]);
    header('Location: admin.php'); // Refresh halaman
}

// Proses hapus produk
if (isset($_POST['delete_product'])) {
    $id = $_POST['product_id'];
    $stmt = $pdo->prepare("DELETE FROM artificial_products WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: admin.php'); // Refresh halaman
}

// Proses verifikasi pesanan
if (isset($_POST['verify_order'])) {
    $order_id = $_POST['order_id'];
    $stmt = $pdo->prepare("UPDATE orders SET status = 'Selesai' WHERE id = ?");
    $stmt->execute([$order_id]);
    header('Location: admin.php'); // Refresh halaman
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            margin: 0;
            background-color: #f8f9fa;
            color: #2c3e50;
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
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background: palevioletred;
            color: white;
        }
        button {
            background: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }
        button:hover {
            background: #2980b9;
        }
        .hidden { display: none; }
        .add-product-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .add-product-form input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Springvale</h2>
        <ul>
            <li><a onclick="showPage('dashboard')">Dashboard</a></li>
            <li><a onclick="showPage('produk')">Produk</a></li>
            <li><a onclick="showPage('pesanan')">Pesanan</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="dashboard" class="page">
            <h1 style="text-align: center;">Dashboard Admin</h1>
            <div class="card">
                <h2>Selamat datang di dashboard admin Springvale</h2>
            </div>
        </div>
        <div id="produk" class="page hidden">
            <h1 style="text-align: center;">Manajemen Produk</h1>
            <div class="card">
                <h2>Daftar Produk</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                                <td><?php echo $product['stock']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" name="edit_product">Edit</button>
                                        <button type="submit" name="delete_product" style="background:#dc3545">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="add-product-form">
                    <input type="text" name="product_name" placeholder="Nama Produk">
                    <input type="number" name="product_price" placeholder="Harga">
                    <input type="number" name="product_stock" placeholder="Stok">
                    <button type="submit" name="add_product">Tambah</button>
                </div>
            </div>
        </div>
        <div id="pesanan" class="page hidden">
            <h1 style="text-align: center;">Konfirmasi Pembayaran</h1>
            <div class="card">
                <h2>Daftar Pesanan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['customer']; ?></td>
                                <td><?php echo number_format($order['total'], 0, ',', '.'); ?></td>
                                <td><?php echo $order['status']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <button type="submit" name="verify_order">Verifikasi</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
