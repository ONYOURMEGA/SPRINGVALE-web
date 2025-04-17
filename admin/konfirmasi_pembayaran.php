<?php
include 'admin_db.php'; // Include koneksi database

// Ambil data pesanan yang membutuhkan konfirmasi dari database
$stmt_orders = $pdo->prepare("SELECT * FROM orders");
$stmt_orders->execute();
$orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);

// Proses verifikasi pembayaran
if (isset($_POST['verify_order'])) {
    $order_id = $_POST['order_id'];
    // Update status pesanan menjadi 'Selesai' jika sudah terverifikasi
    $stmt = $pdo->prepare("UPDATE orders SET status = 'Selesai' WHERE id = ?");
    $stmt->execute([$order_id]);
    header('Location: konfirmasi_pembayaran.php'); // Refresh halaman
    exit(); // pastikan halaman tidak mengeksekusi kode lebih lanjut setelah redirect
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Springvale</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <!-- <li><a href="admin_produk.php">Produk</a></li>
            <li><a href="konfirmasi_pembayaran.php">Pesanan</a></li> -->
        </ul>
    </div>

    <div class="content">
        <h1 style="text-align: center;">Konfirmasi Pembayaran</h1>
        <div class="card">
            <h2>Daftar Pesanan yang Menunggu Pembayaran</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <!-- <th>Pelanggan</th>
                        <th>Total Harga</th> -->
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['sender_name']; ?></td> <!-- Ganti customer dengan sender_name -->
                            <!-- <td>Rp. <?php echo number_format($order['total_price'], 0, ',', '.'); ?></td>  -->
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
</body>
</html>
