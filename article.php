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
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #ffffff;
                color: #333;
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
    
            /* Article Section */
            .container {
                margin-top: 200px;
                max-width: 900px;
                margin: 120px auto;
                background: white;
                padding: 25px;
                border-radius: 8px;
                /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); */
            }
    
            h1 {
                text-align: center;
                font-size: 32px;
                font-weight: bold;
                margin-bottom: 10px;
            }
    
            .date {
                text-align: center;
                color: #888;
                font-size: 14px;
                margin-bottom: 25px;
            }
    
            .image-container {
                text-align: center;
            }
    
            .image-container img {
                width: 100%;
                max-width: 680px;
                border-radius: 8px;
            }
    
            .content {
                margin-top: 20px;
                line-height: 1.6;
                font-size: 16px;
                padding-top: 5px;
                text-align: justify;
            }
    
            .content p {
                margin-bottom: 15px;
            }

            .back-button {
                position: absolute;
                top: 140px;
                left: 100px;
                background-color: white;
                padding: 12px;
                border-radius: 50%;
                border: 1px solid;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-decoration: none;
                font-size: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 45px;
                height: 45px;
                transition: background-color 0.3s, color 0.3s;
                color: #333; 
            }

            .back-button i { 
                color: #333;
                transition: color 0.3s;
            }

            .back-button:hover i {
                color: #333; /* Warna ikon saat hover */
            }
    </style>
</head>
<body>
    <!-- navbar -->
    <header>
        <a href="#home" class="logo"><img src="assets/springvale (2).png" alt=""></a>
        <ul class="navmenu">
            <li><a href="home.php">home</a></li>
            <li><a href="#artificial">katalog</a></li>
            <li><a href="#review">review</a></li>
            <li><a href="#article">article</a></li>
        </ul>

        <!-- Tambahkan input pencarian di navbar -->
        <div class="search-container">
        <input type="text" id="search-input" placeholder="Search products...">
        </div>        

        <!-- Navigation Icons -->
        <div class="nav-icon"> 
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="favorite.php"><i class='fa-regular fa-heart' style="font-size: 22px;"></i></a>
            <a href="cart.php"><i class='bx bx-cart' style="font-size: 28px;"></i></a>
            <a href="profile.php"><i class="fa-regular fa-user-circle" style="font-size: 22px;"></i></a>
        </div>
        

        <!-- Tambahkan JavaScript untuk pencarian -->
        <script>
            document.getElementById('search-input').addEventListener('keyup', searchProducts);

            function searchProducts() {
                let input = document.getElementById('search-input').value.toLowerCase();
                let products = document.querySelectorAll('.product-item');
                let found = false;
                
                products.forEach(product => {
                    let productName = product.querySelector('.price h4');
                    if (productName) {
                        let nameText = productName.innerText.toLowerCase();
                        if (nameText.includes(input)) {
                            product.style.display = "block";
                            found = true;
                        } else {
                            product.style.display = "none";
                        }
                    }
                });
                
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

    <!-- Article Section -->
    <section class="container">
        <a href="home.php" class="back-button">
            <i class="fas fa-chevron-left"></i> 
        </a>        
        <h1>Bouquet Elegant Terbaru!</h1>
        <p class="date">12 January 2025 - Springvalestudio</p>

        <div class="image-container">
            <img src="assets/article.png" alt="Custom Bouquet">
        </div>

        <section class="content">
            <p>Bunga selalu menjadi simbol kecantikan, cinta, dan penghargaan, dan buket Zora ini adalah wujud sempurna dari semua perasaan tersebut. Buket ini memadukan berbagai bunga indah yang tidak hanya memukau secara visual, tetapi juga penuh makna. Setiap bunga dalam rangkaian ini memberikan sentuhan unik yang membuatnya menjadi pilihan hadiah yang sempurna untuk momen spesial.</p>
            <p>Bunga dalam Buket</p>
            <p>1. Mawar pink <br> Mawar pink dikenal sebagai simbol kekaguman, rasa terima kasih, dan kelembutan. Dengan kelopak yang lembut dan aroma yang menyegarkan, mawar pink menambahkan sentuhan romantis dan elegan pada buket ini, menciptakan kesan penuh kasih sayang dan kehangatan.</p>
            <p>2. Lily putih <br> Lily putih adalah simbol kemurnian dan keanggunan yang tak tertandingi. Dengan kelopak putih bersih dan bentuknya yang anggun, lily putih menambah nuansa elegan dan memberi kesan murni dan sempurna pada setiap komposisi buket ini.</p>
            <p>3. Gerbera fuchia <br> Gerbera fuchia memberikan sentuhan ceria dan menyegarkan pada buket ini. Bunga ini melambangkan kebahagiaan dan keceriaan, yang memberi keseimbangan yang menyenangkan pada buket ini. Keindahannya yang cerah membuat buket semakin hidup dan penuh energi positif!</p>
            <p>4. Daun eucalyptus <br> Daun eucalyptus hijau yang menyejukkan memberikan latar belakang alami dan segar pada buket ini. Selain tampilan yang menyegarkan, eucalyptus juga melambangkan perlindungan dan kesehatan, menambah kedamaian dan ketenangan yang luar biasa pada buket ini.</p>
            <p><br> Buket ini dibalut dengan kertas premium yang elegan, memberikan kesan modern dan mewah. Pita satin yang menghiasi buket semakin mempercantik penampilannya, menambahkan sentuhan akhir yang sempurna untuk memberikan kesan yang benar-benar istimewa.</p>
        </section>
    </section>      

    <!-- footer section -->
    <section class="footer" id="footer">
        <div class="footer-info">
            <div class="first-info">
                <img src="assets/springvale (2).png" alt="">

                <p>Jl.Serayu IX, Perum Sumampir Indah, Purwokerto Utara.</p>
                <p>+62 813-2990-8805</p>
                <p>springvalestudio@gmail.com</p>

                <div class="social-icon">
                    <a href="https://www.instagram.com/springvalestudio/" target="_blank" rel="noopener"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.tiktok.com/@springvalestudio" target="_blank" rel="noopener"><i class='bx bxl-tiktok'></i></a>
                    <a href="https://springvalestudio.carrd.co/" target="_blank" rel="noopener"><i class='bx bx-link'></i></a>
                    <a href="https://wa.me/+62 813-2990-8805" target="_blank" rel="noopener"><i class='bx bxl-whatsapp'></i></a>
                </div>
            </div>

            <div class="second-info">
                <h4>Support</h4>
                <p>Contact Us</p>
                <p>About Page</p>
                <p>Order Guide</p>
                <p>Shopping & Returns</p>
                <p>Privacy</p>
            </div>

            <div class="third-info">
                <h4>Shop</h4>
                <p>Fresh Flowers</p>
                <p>Artificial & Knit Flowers</p>
                <p>Acrilic & Frame</p>
                <p>Money Bouquet</p>
                <p>Snack Bouquet</p>
            </div>

            <div class="fourth-info">
                <h4>Company</h4>
                <p>About</p>
                <p>Blog</p>
                <p>Affiliate</p>
                <p>Login</p>
            </div>

            <div class="five">
                <h4>Subscribe</h4>
                <p>Receive updates, hot deals, discounts sent straight in your inbox daily.</p>
            </div>
        </div>
    </section>
    </body>
</html>