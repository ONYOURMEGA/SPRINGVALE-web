<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRIS Payment</title>
    
        <!-- google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <!-- boxicons -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: white;
            width: 450px;
            text-align: center;
            margin: auto;
            padding-bottom: 30px;
            border-style: ridge;
        }
        .header {
            background: #c27b9b;
            color: white;
            padding: 20px;
            font-size: 16px;
            text-align: left;
            font-weight: bold;
            border-bottom-right-radius: 50px;
            border-bottom-left-radius: 50px;
        }
        .qris-img {
            margin: 20px 0;
            width: 80%;
        }
        .payment-methods {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .payment-methods img {
            margin-top: 20px;
            width: 300px;
            height: auto;
        }
        .upload-container {
            margin-top: 20px;
            padding: 15px;
            border: 1px dashed #c27b9b;
            border-radius: 10px;
            text-align: center;
        }
        input[type="file"] {
            display: none;
        }
        .upload-label {
            display: inline-block;
            padding: 10px 20px;
            background-color: #c27b9b;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        canvas {
            margin-top: 10px;
            max-width: 100%;
            border: 1px solid #ccc;
        }
        .submit-btn {
            margin-top: 10px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <p style="font-size: 25px; padding-left: 20px;"><span id="total-price"></span></p>
            <p style="font-size: 15px; padding-left: 20px;">Segera lengkapi pembayaran yaa!</p>
        </div>
        <img src="assets/qris-img.png" alt="QRIS Code" class="qris-img">
        <p style="font-size: 15px; color: black;">Satu QRIS untuk semua<br>Scan terlebih dahulu untuk membayar</p>
        <div class="payment-methods">
            <img src="assets/e-wallet.png" alt="Metode Pembayaran">
        </div>

        <!-- Form Upload Bukti Pembayaran -->
      <!-- qris.php -->
      <form action="save_payment.php" method="POST" enctype="multipart/form-data">
        <!-- Hidden fields untuk menyimpan data yang sudah diisi di detailpage.php -->
        <input type="hidden" name="order_id" id="order-id">
        <input type="hidden" name="sender_name" id="sender-name">
        <input type="hidden" name="recipient_name" id="recipient-name">
        <input type="hidden" name="total_price" id="total-price">
        <input type="hidden" name="product_name" id="product-name">
        <input type="hidden" name="quantity" id="quantity">
        <input type="hidden" name="delivery_fee" id="delivery-fee">
        <input type="hidden" name="sender_phone" id="sender-phone">
        <input type="hidden" name="recipient_address" id="recipient-address">
        <input type="hidden" name="request_message" id="request-message">

        <!-- Upload Bukti Pembayaran -->
        <div class="upload-container">
            <label for="bukti-bayar" class="upload-label">Upload Bukti Pembayaran</label>
            <input type="file" id="bukti-bayar" name="payment_proof" accept="image/*">
            <canvas id="preview-canvas"></canvas>
            <button class="submit-btn" id="submit-btn" type="submit">Kirim</button>
        </div>
    </form>



    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let orderData = JSON.parse(localStorage.getItem("order")) || {};
            let totalPrice = localStorage.getItem("totalPrice") || "0";

            if (orderData) {
                document.getElementById('order-id').value = orderData.id;
                document.getElementById('sender-name').value = orderData.sender;
                document.getElementById('recipient-name').value = orderData.recipient;
                document.getElementById('total-price').value = orderData.total;
                document.getElementById('product-name').value = orderData.type;
                document.getElementById('quantity').value = orderData.items;
                document.getElementById('delivery-fee').value = orderData.delivery;
                document.getElementById('sender-phone').value = orderData.senderPhone;
                document.getElementById('recipient-address').value = orderData.address;
                document.getElementById('request-message').value = orderData.message;
            } else {
                console.error("Data order tidak ditemukan di localStorage.");
            }

            // Update elemen total harga jika ada
            let totalPriceElement = document.getElementById("total-price");
            if (totalPriceElement) {
                totalPriceElement.innerText = `Rp ${parseInt(totalPrice).toLocaleString("id-ID")}`;
            }

            // Simpan ID pesanan berurutan dari "001"
            let lastOrderId = localStorage.getItem("lastOrderId") || "000";
            let newOrderId = String(Number(lastOrderId) + 1).padStart(3, '0');
            localStorage.setItem("lastOrderId", newOrderId);
            orderData.id = newOrderId;

            // Simpan kembali data order ke localStorage
            localStorage.setItem("order", JSON.stringify(orderData));

            // Fungsi untuk mengatur teks elemen HTML
            function setText(id, value, fallback = "-") {
                let element = document.getElementById(id);
                if (element) element.innerText = value || fallback;
            }

            setText("id-order", orderData.id);
            setText("nama-pengirim", orderData.senderName);
            setText("no-hp-pengirim", orderData.senderPhone);
            setText("nama-penerima", orderData.recipientName);
            setText("alamat", orderData.address);
            setText("items", Array.isArray(orderData.items) ? orderData.items.join(", ") : orderData.items);
            setText("type", orderData.type);
            setText("total", `Rp ${parseInt(orderData.totalPrice || 0).toLocaleString("id-ID")}`);
            setText("delivery-fee", `Rp ${parseInt(orderData.deliveryFee || 0).toLocaleString("id-ID")}`);
            setText("request-message", orderData.requestMessage);

            // Upload Bukti Bayar
            let inputFile = document.getElementById("bukti-bayar");
            let submitBtn = document.getElementById("submit-btn");
            let previewCanvas = document.getElementById("preview-canvas");

            if (inputFile && previewCanvas && submitBtn) {
                inputFile.addEventListener("change", function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const ctx = previewCanvas.getContext("2d");
                            const img = new Image();
                            img.onload = function() {
                                previewCanvas.width = img.width / 2;  // Menyesuaikan ukuran gambar
                                previewCanvas.height = img.height / 2;
                                ctx.clearRect(0, 0, previewCanvas.width, previewCanvas.height);
                                ctx.drawImage(img, 0, 0, previewCanvas.width, previewCanvas.height);
                                submitBtn.style.display = "block";
                            };
                            img.onerror = function() {
                                console.error("Gagal memuat gambar.");
                                alert("Gagal menampilkan gambar. Coba unggah ulang.");
                            };
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Tombol Submit Bukti Bayar
                submitBtn.addEventListener("click", function() {
                    alert("Bukti pembayaran berhasil diunggah! Tunggu verifikasi admin.");
                    window.location.href = "succesful.php";
                });
            } else {
                console.error("Elemen input file, tombol submit, atau canvas tidak ditemukan!");
            }
        });
    </script>         
</body>
</html>