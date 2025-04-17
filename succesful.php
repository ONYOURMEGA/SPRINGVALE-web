<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
            font-family: 'Poppins', sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding-bottom: 50px;
        }

        .container {
            background: white;
            width: 100%; /* Jadi fleksibel, ngepasin layar */
            max-width: 400px; /* Biar lebih kecil */
            padding: 45px; /* Biar nggak terlalu luas */
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .success-icon {
            width: 60px; 
            height: 60px;
        }

        .order-details {
            margin-top: 10px;
            text-align: left;
            font-size: 12px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details td {
            padding: 5px;
            font-size: 14px; 
            border-bottom: 1px solid #ddd;
        }

        .back-btn {
            display: block;
            margin: 30px auto 0px;
            padding: 8px;
            font-size: 14px; 
            background-color: #c27b9b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            text-align: center;
            width: 150px; 
        }

        .back-btn:hover {
            background-color: #9e3c68;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="assets/icon-succes.png" alt="Success" class="success-icon">
        <h2>Payment Successful</h2>
        <div class="order-details">
            <table>
                <tr><td>ID Order</td><td id="order-id"></td></tr>
                <tr><td>Date</td><td id="order-date"></td></tr>
                <tr><td>Nama Pengirim</td><td id="sender-name"></td></tr>
                <tr><td>No. HP Pengirim</td><td id="sender-phone"></td></tr>
                <tr><td>Nama Penerima</td><td id="recipient-name"></td></tr>
                <tr><td>Alamat</td><td id="recipient-address"></td></tr>
                <tr><td>Items</td><td id="order-items"></td></tr>
                <tr><td>Type</td><td id="order-type"></td></tr>
                <tr><td>Total</td><td id="order-total"></td></tr>
                <tr><td>Delivery Fee</td><td id="delivery-fee"></td></tr>
                <tr><td>Request Message</td><td id="request-message"></td></tr>
                <tr><td>Total Payment</td><td id="total-payment"></td></tr>                
            </table>            
        </div>
        <a href="home.php" class="back-btn">Back to Home</a>
    </div>



    <!-- menampilkan data users-->

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // ✅ Ambil data order dari localStorage
                let orderData = JSON.parse(localStorage.getItem("order")) || {};
                let totalPayment = localStorage.getItem("totalPrice") || "0";
            
                // ✅ Ambil ID Order dengan backup kalau nggak ada
                let orderId = localStorage.getItem("currentOrderId") || orderData.id || "N/A";
            
                // ✅ Pastikan ID Order tersimpan dengan benar
                if (!localStorage.getItem("currentOrderId") && orderData.id) {
                    localStorage.setItem("currentOrderId", orderData.id);
                }
            
                function setText(id, value, fallback = "-") {
                    let el = document.getElementById(id);
                    if (el) {
                        el.innerText = value || fallback;
                    } else {
                        console.error(`❌ ERROR: Element '${id}' tidak ditemukan!`);
                    }
                }
            
                // ✅ Debugging biar kelihatan di Console
                console.log("✅ Order Data:", orderData);
                console.log("✅ Order ID:", orderId);
                console.log("✅ Total Payment:", totalPayment);
            
                // ✅ Tampilkan data di halaman
                setText("order-id", orderId);
                setText("order-date", new Date().toLocaleDateString("id-ID"));
                setText("sender-name", orderData.sender);
                setText("sender-phone", orderData.senderPhone);
                setText("recipient-name", orderData.recipient);
                setText("recipient-address", orderData.address);
                setText("order-items", Array.isArray(orderData.items) ? orderData.items.join(", ") : orderData.items);
                setText("order-type", orderData.type);
                setText("order-total", `Rp ${parseInt(orderData.total || 0).toLocaleString("id-ID")}`);
                setText("delivery-fee", `Rp ${parseInt(orderData.delivery || 0).toLocaleString("id-ID")}`);
                setText("request-message", orderData.message);
                setText("total-payment", `Rp ${parseInt(totalPayment || 0).toLocaleString("id-ID")}`);
            });
            </script>                                   
        
</body>
</html>