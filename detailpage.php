<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springvale Studio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/flower.png" type="image/x-icon">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
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
            max-width: 1200px;
            margin: 100px auto;
            display: flex;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            padding: 40px;
            align-items: flex-start;
        }

        .product-image img {
            width: 550px;
            height: 800px;
            border-radius: 10px;
        }

        .product-details {
            flex: 1;
        }

        .product-details h1 {
            font-size: 35px;
            font-weight: 700;
        }

        .rating {
            color: gold;
            margin-top: 10px;
            display: flex;
            align-items: start;
            margin-bottom: 10px;
            gap: 5px;
        }

        .review-count {
            font-size: 14px;
            color: gray;
        }

        .quantity-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 300px;
        }

        .price {
            font-size: 30px;
            font-weight: bold;
            margin-top: 25px;
            margin-right: 5px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
            width: 100px;
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

        .quantity-controls input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
        }

        /* .address-message{
            margin-top: 20px;
            font-size: 15px;
            font-weight: 500;
        } */

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            margin-top: 20px;
        }

        .form-group label {
            /* font-weight: bold; */
            margin-bottom: 5px;
        }

        .message-box {
            width: 100%;
            max-width: 400px;
            height: 45px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .message-box#request-message {
            height: 100px;
            resize: vertical; 
        }

        .button-container {
            display: flex;
            align-items: center;
            gap: 10px; 
            margin-bottom: 10px;
        }

        .buy-now {
            background-color: #b5758c; 
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 16px;
            width: 400px;
            text-align: center;
            cursor: pointer;
            margin-top: 20px;
        }

        .buy-now:hover {
            background-color: #9e3c68;
            /* transform: scale(1.05); */
        }

        .wishlist {
            background-color: #f6e9ed; 
            border: none;
            padding: 12px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .wishlist i {
            color: palevioletred; 
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        .wishlist:hover i {
            color: palevioletred;
            content: "\f004"; /* icon heart full warna*/
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
        }

        .product-description-section {
            width: auto; 
            text-align: justify;
            padding-left: 200px;
            padding-right: 250px;
            border-top: none; 
            margin-top: -80px;
            line-height: 1.6;
            padding-bottom: 50px;
        }

        .product-description-section h2 {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
        }

        .product-description-section h2 span {
            color: #cfa3a3;
        }

        .product-description {
            color: #666;
            line-height: 1.6;
            font-size: 16px;
        }
    </style>
</head>
<body>
        <header>
            <a href="#home" class="logo"><img src="assets/springvale (2).png" alt=""></a>
            <ul class="navmenu">
                <li><a href="home.php">Home</a></li>
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
                <div class="nav-icon"> 
                    <a href="#"><i class='bx bx-search'></i></a>
                    <a href="favorite.php"><i class='fa-regular fa-heart' style="font-size: 22px;"></i></a>
                    <a href="cart.php"><i class='bx bx-cart'></i></a>
                    <a href="profile.php"><i class="fa-regular fa-user-circle" style="font-size: 22px;"></i></a>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="product-image">
                <img src="" alt="Product Image" id="product-img">
            </div>
            <div class="product-details">
                <h1 id="product-name"></h1>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="review-count" id="review-count"></span>
                <div class="quantity-container">
                    <div class="price" id="product-price"></div>
                    <div class="quantity-controls">
                        <button id="decrease">-</button>
                        <input type="text" id="quantity" value="1">
                        <button id="increase">+</button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="sender-name">Nama Pengirim</label>
                    <input type="text" class="message-box" placeholder="Nama Pengirim" id="sender-name">
                </div>
                
                <div class="form-group">
                    <label for="sender-phone">Nomor HP Pengirim</label>
                    <input type="text" class="message-box" placeholder="Nomor HP Pengirim" id="sender-phone">
                </div>
                
                <div class="form-group">
                    <label for="recipient-name">Nama Penerima</label>
                    <input type="text" class="message-box" placeholder="Nama Penerima" id="recipient-name">
                </div>
                
                <!-- <div class="form-group">
                    <label for="recipient-phone">Nomor HP Penerima</label>
                    <input type="text" class="message-box" placeholder="Nomor HP Penerima" id="recipient-phone">
                </div> -->
                
                <div class="form-group">
                    <label for="recipient-address">Alamat</label>
                    <input type="text" class="message-box" placeholder="Alamat" id="recipient-address">
                </div>
                
                <div class="form-group">
                    <label for="request-message">Request Message</label>
                    <textarea class="message-box" placeholder="Request Message" id="request-message"></textarea>
                </div>                                

                <div class="button-container">
                    <button class="buy-now">Buy now</button>
                </div>
            </div>
        </div>
        <div class="product-description-section">
            <h2>Description <span style="color: #cfa3a3;">Product</span></h2>
            <p class="product-description" id="product-description"></p>
        </div>
        <div id="product-details"></div>    

                    <!-- js untuk mengambil data produk di home -->
                    <script>
                        // Fungsi untuk mendapatkan parameter dari URL
                        function getQueryParam(param) {
                            const urlParams = new URLSearchParams(window.location.search);
                            return urlParams.get(param);
                        }

                        // Ambil ID produk dari URL
                        const productId = getQueryParam('id');

                        // Data produk
                        const products = [
                            { 
                                id: '1', 
                                name: 'Unicorn Edition', 
                                price: 174000, 
                                image: 'assets/1.jpeg', 
                                reviews: 107, 
                                description: 'Unicorn Edition adalah buket bunga yang terinspirasi oleh keindahan dan keanggunan unicorn. Dengan kombinasi warna pastel yang lembut, buket ini terdiri dari bunga mawar, lili, dan gypsophila yang disusun dengan indah. Cocok untuk acara spesial atau sebagai hadiah untuk orang terkasih, buket ini akan membawa sentuhan magis ke dalam hidup Anda.'
                            },
                            { 
                                id: '2', 
                                name: 'Flower Cup', 
                                price: 80000, 
                                image: 'assets/15.jpeg', 
                                reviews: 107, 
                                description: 'Flower Cup adalah pilihan yang ideal untuk mereka yang menyukai kesederhanaan. Buket ini terdiri dari bunga-bunga cerah yang disusun dalam cangkir cantik, memberikan sentuhan unik dan segar untuk dekorasi rumah Anda. Dengan aroma yang menenangkan, Flower Cup adalah cara sempurna untuk menyemarakkan suasana.'
                            },
                            { 
                                id: '3', 
                                name: 'Unicorn Edition 2', 
                                price: 100000, 
                                image: 'assets/22.jpeg', 
                                reviews: 107, 
                                description: 'Unicorn Edition 2 adalah versi yang lebih berani dari buket sebelumnya. Dengan tambahan bunga eksotis seperti orkid dan protea, serta warna-warna cerah yang mencolok, buket ini akan menjadi pusat perhatian di setiap acara. Ideal untuk perayaan atau sebagai hadiah yang tak terlupakan.'
                            },
                            { 
                                id: '4', 
                                name: 'Medium Becca', 
                                price: 65000, 
                                image: 'assets/14.jpeg', 
                                reviews: 107, 
                                description: 'Medium Becca adalah buket yang sempurna untuk setiap kesempatan. Dengan kombinasi bunga yang harmonis, termasuk mawar dan tulip, buket ini memberikan kesan elegan dan menawan. Aroma bunga yang segar akan membawa kebahagiaan ke dalam hidup Anda, menjadikannya pilihan yang tepat untuk hadiah atau dekorasi.'
                            },
                            { 
                                id: '5', 
                                name: 'Medium Mermaid', 
                                price: 105000, 
                                image: 'assets/36.jpeg', 
                                reviews: 107, 
                                description: 'Medium Mermaid adalah buket yang terinspirasi oleh keindahan laut. Dengan warna biru dan hijau yang menenangkan, buket ini terdiri dari bunga-bunga laut dan tanaman hijau yang segar. Cocok untuk acara pantai atau sebagai hadiah untuk pecinta laut, buket ini akan membawa nuansa segar ke dalam hidup Anda.'
                            },
                            { 
                                id: '6', 
                                name: 'Big Mariposa', 
                                price: 175000, 
                                image: 'assets/34.jpeg', 
                                reviews: 107, 
                                description: 'Big Mariposa adalah buket yang megah dan penuh warna. Dengan kombinasi bunga-bunga tropis yang cerah, buket ini akan mencuri perhatian di setiap ruangan. Ideal untuk perayaan besar atau sebagai hadiah yang mencolok, Big Mariposa adalah pilihan yang sempurna untuk mengekspresikan perasaan Anda.'
                            },
                            { 
                                id: '7', 
                                name: 'Big Siren', 
                                price: 135000, 
                                image: 'assets/41.jpeg', 
                                reviews: 107, 
                                description: 'Big Siren adalah buket yang anggun dan menawan. Dengan bunga-bunga yang disusun dengan rapi, buket ini menciptakan kesan yang elegan dan romantis. Cocok untuk acara formal atau sebagai hadiah untuk orang terkasih, Big Siren akan membuat momen Anda semakin istimewa.'
                            },
                            { 
                                id: '8', 
                                name: 'Barbie', 
                                price: 195000, 
                                image: 'assets/38.jpeg', 
                                reviews: 107, 
                                description: 'Barbie adalah buket yang penuh warna dan ceria. Dengan kombinasi bunga-bunga cerah dan berani, buket ini cocok untuk merayakan momen bahagia. Desainnya yang unik dan menarik akan membuat siapa pun terpesona, menjadikannya pilihan yang sempurna untuk hadiah atau dekorasi.'
                            },
                            { 
                                id: '9', 
                                name: 'Fairytale', 
                                price: 120000, 
                                image: 'assets/24.jpeg', 
                                reviews: 107, 
                                description: 'Fairytale adalah buket yang terinspirasi oleh dongeng. Dengan bunga-bunga lembut dan warna pastel, buket ini menciptakan suasana yang romantis dan magis. Cocok untuk pernikahan atau acara spesial, Fairytale akan membawa keajaiban ke dalam hidup Anda.'
                            },
                            { 
                                id: '10', 
                                name: 'Aiyra', 
                                price: 150000, 
                                image: 'assets/25.jpeg', 
                                reviews: 107, 
                                description: 'Aiyra adalah buket yang elegan dan anggun. Dengan kombinasi bunga mawar dan lili, buket ini memberikan kesan yang mewah dan berkelas. Ideal untuk acara formal atau sebagai hadiah untuk orang terkasih, Aiyra akan membuat setiap momen menjadi lebih istimewa.'
                            },
                            { 
                                id: '11', 
                                name: 'Zora', 
                                price: 110000, 
                                image: 'assets/27.jpeg', 
                                reviews: 107, 
                                description: 'Zora adalah buket yang ceria dan penuh semangat. Dengan warna-warna cerah dan bunga-bunga segar, buket ini cocok untuk merayakan momen bahagia. Desainnya yang menarik akan membuat siapa pun tersenyum, menjadikannya pilihan yang sempurna untuk hadiah.'
                            },
                            { 
                                id: '12', 
                                name: 'Elena', 
                                price: 90000, 
                                image: 'assets/29.jpeg', 
                                reviews: 107, 
                                description: 'Elena adalah buket yang sederhana namun elegan. Dengan kombinasi bunga-bunga segar dan warna yang lembut, buket ini cocok untuk setiap kesempatan. Aroma bunga yang menenangkan akan membawa kebahagiaan ke dalam hidup Anda.'
                            },
                            { 
                                id: '13', 
                                name: 'Sunset', 
                                price: 95000, 
                                image: 'assets/31.jpeg', 
                                reviews: 107, 
                                description: 'Sunset adalah buket yang terinspirasi oleh keindahan matahari terbenam. Dengan warna-warna hangat dan bunga-bunga yang cerah, buket ini menciptakan suasana yang romantis dan menenangkan. Cocok untuk acara spesial atau sebagai hadiah untuk orang terkasih.'
                            },
                            { 
                                id: '14', 
                                name: 'Aretha', 
                                price: 75000, 
                                image: 'assets/30.jpeg', 
                                reviews: 107, 
                                description: 'Aretha adalah buket yang anggun dan menawan. Dengan kombinasi bunga-bunga yang elegan, buket ini memberikan kesan yang mewah dan berkelas. Ideal untuk acara formal atau sebagai hadiah untuk orang terkasih, Aretha akan membuat setiap momen menjadi lebih istimewa.'
                            },
                            { 
                                id: '15', 
                                name: 'Poppy', 
                                price: 65000, 
                                image: 'assets/32.jpeg', 
                                reviews: 107, 
                                description: 'Poppy adalah buket yang ceria dan penuh warna. Dengan kombinasi bunga-bunga cerah, buket ini cocok untuk merayakan momen bahagia. Desainnya yang menarik akan membuat siapa pun terpesona, menjadikannya pilihan yang sempurna untuk hadiah atau dekorasi.'
                            },
                            { 
                                id: '16', 
                                name: 'Athena', 
                                price: 85000, 
                                image: 'assets/IMG_6707.jpeg', 
                                reviews: 107, 
                                description: 'Athena adalah buket yang elegan dan anggun. Dengan kombinasi bunga-bunga yang disusun dengan rapi, buket ini menciptakan kesan yang menawan. Cocok untuk acara formal atau sebagai hadiah untuk orang terkasih, Athena akan membuat setiap momen menjadi lebih istimewa.'
                            },
                        ];

                        // Temukan produk berdasarkan ID
                        const product = products.find(p => p.id === productId);

                        // Jika produk ditemukan, tampilkan di halaman
                        if (product) {
                            document.querySelector('.product-image img').src = product.image;
                            document.querySelector('.product-details h1').innerText = product.name;
                            document.querySelector('.price').innerText = `Rp ${product.price.toLocaleString()}`;
                            document.querySelector('.review-count').innerText = `${product.reviews} reviews`;
                            document.querySelector('.product-description').innerText = product.description; // Menambahkan deskripsi produk
                        } else {
                            // Jika produk tidak ditemukan, tampilkan pesan atau redirect
                            document.querySelector('.product-details').innerHTML = '<h2>Produk tidak ditemukan</h2>';
                        }
                    </script>

        <!-- menyimpan data order ke local storage  -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
            // Fungsi untuk mengupdate harga berdasarkan quantity
            function updatePrice() {
                let qty = parseInt(document.getElementById("quantity").value);
                let priceText = document.querySelector(".price");
                let price = parseInt(priceText) || 0;
                let totalPrice = price * qty;
                document.getElementById("total-price").innerText = `Rp ${totalPrice.toLocaleString("id-ID")}`;
            }

            // Event listener untuk tombol tambah (+)
            document.getElementById('increase').addEventListener('click', function () {
                let qty = document.getElementById('quantity');
                qty.value = parseInt(qty.value) + 1;
                updatePrice();
            });

            // Event listener untuk tombol kurang (-)
            document.getElementById('decrease').addEventListener('click', function () {
                let qty = document.getElementById('quantity');
                if (parseInt(qty.value) > 1) {
                    qty.value = parseInt(qty.value) - 1;
                    updatePrice();
                }
            });

            // Event listener untuk tombol "Buy Now"
            document.querySelector('.buy-now').addEventListener('click', function () {
                let senderName = document.getElementById('sender-name').value.trim();
                let senderPhone = document.getElementById('sender-phone').value.trim();
                let recipientName = document.getElementById('recipient-name').value.trim();
                // let recipientPhone = document.getElementById('recipient-phone').value.trim();
                let address = document.getElementById('recipient-address').value.trim();
                let message = document.getElementById('request-message').value.trim();
                let qty = parseInt(document.getElementById('quantity').value);
                let productName = document.querySelector('.product-details h1').innerText;

                // **Ambil harga produk**
                let priceText = document.querySelector('.price').innerText.replace(/\D/g, '');
                let price = parseInt(priceText) || 0;
                let deliveryFee = 5000; // Biaya pengiriman
                let totalPrice = price * qty + deliveryFee;

                // **Ambil gambar produk**
                let productImage = document.getElementById('product-img').src;

                // **Validasi input tidak boleh kosong**
                if (!senderName || !senderPhone || !recipientName || !address) {
                    alert("Harap lengkapi semua kolom sebelum melanjutkan pembayaran!");
                    return;
                }

                // **Data yang akan disimpan ke localStorage**
                const orderData = {
                    id: Math.floor(100 + Math.random() * 900).toString(), // ID Order otomatis 3 digit
                    sender: senderName,
                    senderPhone: senderPhone,
                    recipient: recipientName,
                    // recipientPhone: recipientPhone,
                    address: address,
                    items: qty,
                    type: productName,
                    image: productImage,
                    total: price * qty,
                    delivery: deliveryFee,
                    message: message
                };

                // Simpan data ke localStorage
                localStorage.setItem("order", JSON.stringify(orderData));
                window.location.href = "payment.php"; 
            });

            // Pastikan harga awal diperbarui
            updatePrice();
        });
        </script>

        <!-- sinkronsasi dari cart -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityInput = document.getElementById("quantity");
        const totalPriceElement = document.getElementById("product-price");
        const increaseBtn = document.getElementById("increase");
        const decreaseBtn = document.getElementById("decrease");

        // Ambil ID produk dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get("id");

        let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
        let selectedProduct = cartItems.find(product => product.id == productId);

        if (!selectedProduct) {
            console.error("Produk tidak ditemukan!");
            return;
        }

        let productPrice = selectedProduct.price ? cleanPrice(selectedProduct.price) : 20000;

        // Set nilai awal
        selectedProduct.quantity = selectedProduct.quantity || 1;
        quantityInput.value = selectedProduct.quantity;
        updateTotalPrice(selectedProduct.quantity);

        // Event listener untuk tombol +
        increaseBtn.addEventListener("click", function () {
            let newQty = parseInt(quantityInput.value, 10) || 1;
            newQty += 1;
            updateQuantity(newQty);
        });

        // Event listener untuk tombol -
        decreaseBtn.addEventListener("click", function () {
            let newQty = parseInt(quantityInput.value, 10) || 1;
            if (newQty > 1) {
                newQty -= 1;
                updateQuantity(newQty);
            }
        });

        // Event listener untuk input kuantitas
        quantityInput.addEventListener("input", function () {
            let newQty = parseInt(quantityInput.value, 10);
            if (!isNaN(newQty) && newQty > 0) {
                updateQuantity(newQty);
            } else {
                quantityInput.value = selectedProduct.quantity;
            }
        });

        function updateQuantity(newQty) {
            selectedProduct.quantity = newQty;
            quantityInput.value = newQty;

            updateTotalPrice(newQty);

            let cartIndex = cartItems.findIndex(product => product.id == productId);
            if (cartIndex !== -1) {
                cartItems[cartIndex].quantity = newQty;
                localStorage.setItem("cart", JSON.stringify(cartItems));
            }
        }

        function updateTotalPrice(quantity) {
            const totalPrice = productPrice * quantity;
            totalPriceElement.innerText = `Rp ${totalPrice.toLocaleString("id-ID", { maximumFractionDigits: 0 })}`;
        }

        function cleanPrice(price) {
            if (typeof price === "string") {
                return parseInt(price.replace(/[^\d]/g, ""), 10);
            }
            return price;
        }
    });
</script>     

</body>
</html>