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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="admin_produk.php">Produk</a></li>
        <li><a href="konfirmasi_pembayaran.php">Pesanan</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="dashboard" class="page">
            <h1 style="text-align: center;">Dashboard Admin</h1>
            <div class="card">
                <h2>Selamat datang di dashboard admin Springvale</h2>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>