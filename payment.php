<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springvale Studio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/flower.png" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <style>
        body {
            background-color: white;
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
        }

        /* header & navbar */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 10%;
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 50px;
            width: 250px;
            outline: none;
        }

        #search-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .product-item {
            display: block;
        }

        .logo img {
            max-width: 190px;
            height: auto;
        }

        .navmenu {
            display: flex;
        }

        .navmenu a {
            color: black;
            font-size: 16px;
            text-transform: capitalize;
            padding: 10px 20px;
            font-weight: 400;
            transition: all .42s ease;
        }

        .navmenu a:hover {
            color: peru;
        }

        .nav-icon {
            display: flex;
            align-items: center;
        }

        .nav-icon i {
            margin-right: 20px;
            color: black;
            font-size: 25px;
            font-weight: 400;
            transition: all .42 ease;
        }

        .nav-icon i:hover {
            transform: scale(1.1);
            color: peru;
        }

        #menu-icon {
            font-size: 30px;
            color: #000000;
            z-index: 10001;
            cursor: pointer;
        }

        section {
            padding: 5% 10%;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2{
            margin-bottom: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .product img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
        }

        .product-info h3 {
            font-size: 20px;
            font-weight: bold;
            padding-bottom: 10px;
        }

        .product-info p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .order-summary {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .order-summary div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .order-summary div span {
            flex: 1;
            text-align: right;
        }

        .order-summary div span:first-child {
            text-align: left;
            font-weight: 500;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Tombol Order */
        .order-btn {
            width: 100%;
            background-color: #b5758c;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .order-btn:hover {
            background-color: #9e3c68;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            .navmenu {
                display: none;
            }

            .nav-icon {
                gap: 10px;
            }

            .product img {
                width: 70px;
                height: 70px;
            }

            .product-info h3 {
                font-size: 16px;
            }

            .product-info p {
                font-size: 13px;
            }
        }

    </style>
</head>
<body>
    <header>
        <a href="#home" class="logo"><img src="assets/springvale (2).png" alt=""></a>
        <ul class="navmenu">
            <li><a href="#home">Home</a></li>
            <li><a href="#artificial">Katalog</a></li>
            <li><a href="#review">Review</a></li>
            <li><a href="#blog">Article</a></li>
        </ul>

        <!-- Tambahkan input pencarian di navbar -->
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search products...">
            
        </div>

        <!-- Tambahkan ikon navigasi -->
        <div class="nav-icon"> 
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="favorite.php"><i class='fa-regular fa-heart' style="font-size: 22px;"></i></a>
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <a href="profile.php"><i class="fa-regular fa-user-circle" style="font-size: 22px;"></i></a>
        </div>
    </header>

    <div class="container">
        <h2>Order Summary</h2>
        <div class="product">
            <img id="product-image" src="" alt="Product Image">
            <div class="product-info">
                <h3 id="product-name">Product Name</h3>
                <p><strong id="product-price">Rp 0</strong></p>
            </div>
        </div>
    
        <div class="order-summary">
            <div><span>ID Order:</span> <span id="id-order">N/A</span></div>
            <div><span>Nama Pengirim:</span> <span id="sender-name">N/A</span></div>
            <div><span>No. HP Pengirim:</span> <span id="sender-phone">N/A</span></div>
            <div><span>Nama Penerima:</span> <span id="recipient-name">N/A</span></div>
            <!-- <div><span>No. HP Penerima:</span> <span id="recipient-phone">N/A</span></div> -->
            <div><span>Alamat:</span> <span id="recipient-address">N/A</span></div>
            <div><span>Items:</span> <span id="items">N/A</span></div>
            <div><span>Type:</span> <span id="type">N/A</span></div>
            <div><span>Total:</span> <span id="total">N/A</span></div>
            <div><span>Delivery Fee:</span> <span id="delivery-fee">N/A</span></div>
            <div class="total"><span>Total Payment:</span> <span id="total-payment">N/A</span></div>
            <div><span>Request Message:</span> <span id="request-message">N/A</span></div>      
        </div>
    
        <a href="qris.php">
            <button class="order-btn">Order</button>
        </a>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let orderData = JSON.parse(localStorage.getItem("order")) || {};
            let lastOrderId = localStorage.getItem("lastOrderId") || "000";

            // **Cek kalau order ID belum ada, buat baru**
            if (!orderData.id) { 
                let newOrderId = String(Number(lastOrderId) + 1).padStart(3, '0'); // ID bertambah +1
                orderData.id = newOrderId;

                // ✅ Simpan data order yang sudah diperbarui ke localStorage
                localStorage.setItem("order", JSON.stringify(orderData)); 
                localStorage.setItem("lastOrderId", newOrderId); 
                localStorage.setItem("currentOrderId", newOrderId);
            }

            function setElementText(id, value, defaultValue = "-") {
                let element = document.getElementById(id);
                if (element) {
                    element.innerText = value || defaultValue;
                } else {
                    console.error(`Element '${id}' not found!`);
                }
            }

            function setElementSrc(id, src, defaultSrc = "default-image.jpg") {
                let element = document.getElementById(id);
                if (element) {
                    element.src = src || defaultSrc;
                } else {
                    console.error(`Element '${id}' not found!`);
                }
            }

            // **Tampilkan Data Order**
            setElementText("id-order", orderData.id);
            setElementText("product-name", orderData.type, "Product Name");
            setElementText("product-price", "Rp " + (orderData.total || 0).toLocaleString("id-ID", { minimumFractionDigits: 0, maximumFractionDigits: 0 }));
            setElementText("sender-name", orderData.sender);
            setElementText("sender-phone", orderData.senderPhone);  
            setElementText("recipient-name", orderData.recipient);
            setElementText("recipient-phone", orderData.recipientPhone); 
            setElementText("recipient-address", orderData.address);
            setElementText("items", Array.isArray(orderData.items) ? orderData.items.join(", ") : orderData.items);
            setElementText("type", orderData.type);
            setElementText("total", "Rp " + (orderData.total || 0).toLocaleString("id-ID", { minimumFractionDigits: 0, maximumFractionDigits: 0 }));
            setElementText("delivery-fee", "Rp " + (orderData.delivery || 0).toLocaleString("id-ID", { minimumFractionDigits: 0, maximumFractionDigits: 0 }));
            setElementText("request-message", orderData.message);

            // **Tampilkan Foto Produk**
            setElementSrc("product-image", orderData.image, "default-image.jpg"); // ✅ Pastikan ada foto produk

            // **Hitung Total Payment**
            let totalPayment = (orderData.total || 0) + (orderData.delivery || 0);
            setElementText("total-payment", "Rp " + totalPayment.toLocaleString("id-ID", { minimumFractionDigits: 0, maximumFractionDigits: 0 }));

            // **Simpan total pembayaran sebelum pindah ke QRIS**
            let orderButton = document.querySelector(".order-btn");
            if (orderButton) {
                orderButton.addEventListener("click", function () {
                    localStorage.setItem("totalPrice", totalPayment);
                    localStorage.setItem("currentOrderId", orderData.id);
                    window.location.href = "qris.php";
                });
            } else {
                console.error("Element 'order-btn' not found!");
            }
        });
        </script>        

    <!-- buat menampilkan data yang ada di payment  ke succesful -->
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lastOrderId = localStorage.getItem("lastOrderId") || "000";
            let newOrderId = String(Number(lastOrderId) + 1).padStart(3, "0");
        
            let checkoutBtn = document.getElementById("checkout-btn");
            if (checkoutBtn) {
                checkoutBtn.addEventListener("click", function () {
                    // 🔹 Ambil elemen input
                    let senderInput = document.getElementById("sender-name");
                    let senderPhoneInput = document.getElementById("sender-phone");
                    let recipientInput = document.getElementById("recipient-name");
                    let recipientPhoneInput = document.getElementById("recipient-phone");
                    let addressInput = document.getElementById("recipient-address");
        
                    // 🔹 Pastikan elemen ditemukan
                    if (!senderInput || !senderPhoneInput || !recipientInput || !recipientPhoneInput || !addressInput) {
                        console.error("❌ ERROR: Ada elemen input yang tidak ditemukan!");
                        return;
                    }
        
                    let orderData = {
                        id: newOrderId,
                        sender: senderInput.value.trim() || "-",
                        senderPhone: senderPhoneInput.value.trim() || "-",
                        recipient: recipientInput.value.trim() || "-",
                        recipientPhone: recipientPhoneInput.value.trim() || "-",
                        address: addressInput.value.trim() || "-",
                        items: document.getElementById("items")?.innerText.trim() || "-",
                        type: document.getElementById("type")?.innerText.trim() || "-",
                        total: parseInt(document.getElementById("total")?.innerText.replace(/\D/g, "")) || 0,
                        delivery: parseInt(document.getElementById("delivery-fee")?.innerText.replace(/\D/g, "")) || 0,
                        message: document.getElementById("request-message")?.innerText.trim() || "-"
                        
                    };
        
                    // 🔹 Hitung total pembayaran
                    orderData.totalPayment = orderData.total + orderData.delivery;
        
                    // 🔹 Simpan ke localStorage
                    localStorage.setItem("order", JSON.stringify(orderData));
                    localStorage.setItem("lastOrderId", newOrderId);
        
                    // 🔹 Debugging: Cek di Console
                    console.log("✅ Order Data Tersimpan:", orderData);
        
                    // 🔹 Pindah ke halaman sukses
                    window.location.href = "succesful.php";
                });
            } else {
                console.error("❌ ERROR: Tombol checkout tidak ditemukan!");
            }
        });
        </script>
</body>
</html>