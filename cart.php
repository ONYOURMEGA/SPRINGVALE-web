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
                *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: 'Jost', sans-serif;
            list-style: none;
            text-decoration: none;
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
        .cart-container {
            max-width: 1000px;
            margin: auto;
            margin-top: 50px;
            padding: 40px 20px;
        }
        .cart-container h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            background-color: #fff;
        }
        .cart-item img {
            width: 125px;
            height: 150px;
            border-radius: 5px;
        }
        .cart-details {
            flex-grow: 1;
            margin-left: 15px;
        }
        .cart-details h4 {
            font-size: 20px;
            font-weight: 600;
        }
        .cart-details p {
            font-size: 15px;
            font-weight: 400;
            margin-top: 10px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
            width: 80px;
        }
        .quantity-controls button {
            background-color: #b35c88;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
        }

        .buy-now {
            background-color: #b35c88; /* Warna tombol utama */
            color: white;
            border: none;
            /* padding: 12px 24px; */
            border-radius: 5px;
            font-size: 13px;
            width: 80px;
            height: 30px;
            text-align: center;
            cursor: pointer;
            margin-top: 85px;
        }

        .buy-now:hover {
            background-color: #9e3c68;
            /* transform: scale(1.05); */
        }
        
        
    </style>
</head>
<body>
    <!-- navbar -->
    <header>
        <a href="#home" class="logo"><img src="assets/springvale (2).png" alt=""></a>
        <ul class="navmenu">
            <li><a href="home.php">home</a></li>
            <li><a href="home.php">katalog</a></li>
            <li><a href="home.php">review</a></li>
            <li><a href="home.php">article</a></li>
        </ul>

        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search products...">
            
        </div>

        <div class="nav-icon"> 
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="favorite.php"><i class='fa-regular fa-heart' style="font-size: 22px;"></i></a>
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <a href="profile.php"><i class="fa-regular fa-user-circle" style="font-size: 22px;"></i></a>
        </div>

        <script>
        document.getElementById('search-input').addEventListener('keyup', searchProducts);

        function searchProducts() {
            let input = document.getElementById('search-input').value.toLowerCase();
            let products = document.querySelectorAll('.row'); // Menggunakan .row karena tidak ada .product-item
            let found = false;

            products.forEach(product => {
                let productName = product.querySelector('.price h4');
                if (productName && productName.innerText.toLowerCase().includes(input)) {
                    product.style.display = "block";
                    found = true;
                } else {
                    product.style.display = "none";
                }
            });

            // Menangani pesan "Produk tidak ditemukan"
            let noResult = document.getElementById('no-result');
            if (!found) {
                if (!noResult) {
                    noResult = document.createElement('p');
                    noResult.id = 'no-result';
                    noResult.innerText = "Produk tidak ditemukan";
                    noResult.style.textAlign = "center";
                    noResult.style.color = "red";
                    document.querySelector('.products').appendChild(noResult);
                }
            } else {
                if (noResult) noResult.remove();
            }
        }
        </script>

    </header>
    <section class="cart-container">
        <div id="cart-items"></div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cartContainer = document.getElementById("cart-items");
            let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    
            function cleanPrice(price) {
                let cleaned = price.toString().replace(/[^\d]/g, ""); // Hapus karakter non-angka
                return parseFloat(cleaned) || 0;
            }
    
            function updateLocalStorage() {
                localStorage.setItem("cart", JSON.stringify(cartItems));
            }
    
            function renderCart() {
                cartContainer.innerHTML = "";
    
                if (cartItems.length === 0) {
                    cartContainer.innerHTML = `
                        <h2 style="margin-top: 30px;">Your <span style="color: rgb(191, 89, 123)">Cart</span> Finds</h2>
                        <p style="text-align: center">Belum ada produk yang ditambahkan.</p>`;
                    return;
                }
    
                cartItems.forEach((product, index) => {
                    if (!product.quantity) product.quantity = 1;
    
                    const price = cleanPrice(product.price);
                    const totalPrice = price * product.quantity;
                    const productElement = document.createElement("div");
                    productElement.classList.add("cart-item");
    
                    productElement.innerHTML = `
                        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding: 10px; border-bottom: 1px solid #ddd;">
                            <!-- Gambar Produk -->
                            <img src="${product.image}" alt="${product.name}" style="width: 100px; height: auto; border-radius: 8px; margin-right: 10px;">
                            
                            <!-- Detail Produk -->
                            <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                <div>
                                    <h4 style="margin: 0; font-size: 16px;">${product.name}</h4>
                                    <p style="margin: 5px 0; color: #555;">Rp <span>${price.toLocaleString("id-ID")}</span></p>
                                    
                                    <!-- Kontrol Jumlah -->
                                    <div style="display: flex; align-items: center; margin-top: 30px;">
                                        <button onclick="updateQuantity(${index}, -1)" style="background: rgb(191, 89, 123); color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">-</button>
                                        <span id="quantity-${index}" style="margin: 0 10px; font-size: 16px;">${product.quantity}</span>
                                        <button onclick="updateQuantity(${index}, 1)" style="background: rgb(191, 89, 123); color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Harga + Tombol -->
                            <div style="display: flex; flex-direction: column; align-items: flex-end;">
                                <p style="margin: 0 0 12px 0; gap: 100px;">Total: Rp <span id="total-price-${index}">${totalPrice.toLocaleString("id-ID")}</span></p>
                                <div style="display: flex; margin-top: 30px;">
                                    <button onclick="removeFromCart(${index})" style="color: black; padding: 6px 12px; border-radius: 5px; cursor: pointer;">🗑 Delete</button>
                                    <button onclick="buyNow(${index})" style="background: rgb(191, 89, 123); color: white; border: none; padding: 6px 12px; border-radius: 5px; cursor: pointer;">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    `;

    
                    window.buyNow = function (index) {
                        let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
                        const product = cartItems[index];
    
                        if (!product || !product.id) {
                            console.error("Produk tidak valid!");
                            alert("Produk tidak valid! Cek kembali.");
                            return;
                        }
    
                        // Simpan produk yang dipilih ke localStorage untuk diambil di detailpage
                        localStorage.setItem("selectedProduct", JSON.stringify(product));
    
                        // Kirim ID & Quantity ke detailpage lewat URL
                        window.location.href = `detailpage.php?id=${product.id}&quantity=${product.quantity}`;
                    };
    
                    cartContainer.appendChild(productElement);
                });
    
                updateLocalStorage(); // Simpan perubahan ke localStorage
            }
    
            window.updateQuantity = function (index, change) {
                if (cartItems[index].quantity + change > 0) {
                    cartItems[index].quantity += change;
                }
                renderCart();
            };
    
            window.removeFromCart = function (index) {
                cartItems.splice(index, 1);
                renderCart();
            };
    
            window.buyNow = function (productId) {
                if (!productId) {
                    console.error("ID produk tidak ditemukan!");
                    alert("Produk tidak memiliki ID! Cek kembali.");
                    return;
                }
                window.location.href = `detailpage.php?id=${productId}`;
            };
    
            renderCart(); // Jalankan pertama kali saat halaman dimuat
        });
    </script>
    
</body>
</html>