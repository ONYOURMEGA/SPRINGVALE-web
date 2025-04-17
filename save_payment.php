<?php
// Konfigurasi Database
$host = "localhost";  // Ganti dengan host database Anda
$dbname = "springvale"; // Ganti dengan nama database Anda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda

try {
    // Membuat koneksi PDO ke database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Memproses form jika data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $orderId = $_POST['order_id'];
    $senderName = $_POST['sender_name'];
    $senderPhone = $_POST['sender_phone'];
    $recipientName = $_POST['recipient_name'];
    $recipientAddress = $_POST['recipient_address'];
    $productName = $_POST['product_name'];
    $productPrice = floatval($_POST['product_price']);  // Konversi harga menjadi float
    $quantity = intval($_POST['quantity']);  // Konversi jumlah menjadi integer
    $deliveryFee = floatval($_POST['delivery_fee']);  // Konversi biaya pengiriman menjadi float
    $message = $_POST['request_message'];

    // Menghitung total harga
    $totalPrice = $productPrice * $quantity; // Hitung total harga produk

    // Proses upload bukti pembayaran
    if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['payment_proof']['name']);

        if (move_uploaded_file($_FILES['payment_proof']['tmp_name'], $uploadFile)) {
            // Berhasil meng-upload file
            $paymentProof = $uploadFile;
        } else {
            echo "Gagal mengunggah bukti pembayaran.";
            exit();
        }
    } else {
        echo "Bukti pembayaran tidak diunggah.";
        exit();
    }

    // Menyimpan data ke database
    try {
        $stmt = $pdo->prepare("INSERT INTO orders 
            (id, sender_name, sender_phone, recipient_name, recipient_address, message, product_name, product_price, quantity, total_price, delivery_fee, payment_proof)
            VALUES (:order_id, :sender_name, :sender_phone, :recipient_name, :recipient_address, :message, :product_name, :product_price, :quantity, :total_price, :delivery_fee, :payment_proof)");

        $stmt->bindParam(':order_id', $orderId);
        $stmt->bindParam(':sender_name', $senderName);
        $stmt->bindParam(':sender_phone', $senderPhone);
        $stmt->bindParam(':recipient_name', $recipientName);
        $stmt->bindParam(':recipient_address', $recipientAddress);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':product_price', $productPrice);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $totalPrice); // Gunakan totalPrice
        $stmt->bindParam(':delivery_fee', $deliveryFee);
        $stmt->bindParam(':payment_proof', $paymentProof);

        // Eksekusi query
        if ($stmt->execute()) {
            // Data berhasil disimpan
            header('Location: succesful.php'); // Redirect ke halaman sukses pembayaran
            exit();
        } else {
            echo "Terjadi kesalahan saat menyimpan pesanan.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>