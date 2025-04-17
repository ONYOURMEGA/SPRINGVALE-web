<?php
session_start();

// Konfigurasi database
$host = 'localhost';
$dbname = 'springvale';
$username = 'root';
$password = ''; 

// Koneksi ke database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Ambil data artificial produk
$stmt_artificial = $pdo->prepare("SELECT * FROM artificial_products");
$stmt_artificial->execute();
$artificial_products = $stmt_artificial->fetchAll(PDO::FETCH_ASSOC);

// Ambil data fresh flower
$stmt_fresh = $pdo->prepare("SELECT * FROM fresh_products");
$stmt_fresh->execute();
$fresh_products = $stmt_fresh->fetchAll(PDO::FETCH_ASSOC);

// Ambil data update terbaru (New Updates)
$stmt_updates = $pdo->prepare("SELECT * FROM updates ORDER BY created_at DESC LIMIT 3");
$stmt_updates->execute();
$updates = $stmt_updates->fetchAll(PDO::FETCH_ASSOC);
?>

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
</head>
<body>

    <!-- Navbar -->
    <header>
        <a href="#home" class="logo"><img src="assets/springvale (2).png" alt=""></a>
        <ul class="navmenu">
            <li><a href="#home">home</a></li>
            <li><a href="#artificial">katalog</a></li>
            <li><a href="#review">review</a></li>
            <li><a href="#blog">article</a></li>
        </ul>

        <!-- Search Container -->
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search products...">
        </div>

        <!-- Navigation Icons -->
        <div class="nav-icon"> 
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="favorite.php"><i class='fa-regular fa-heart' style="font-size: 22px;"></i></a>
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <a href="profile.php"><i class="fa-regular fa-user-circle" style="font-size: 22px;"></i></a>
        </div>
    </header>

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

    <!-- JavaScript untuk fungsi favorite -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const heartIcons = document.querySelectorAll(".heart-icon");

            heartIcons.forEach(icon => {
                icon.addEventListener("click", function () {
                    const productCard = this.closest(".row");
                    const productName = productCard.querySelector(".price h4").textContent;
                    const productPrice = productCard.querySelector(".price p").textContent;
                    const productImage = productCard.querySelector("img").src;
                    const productStatus = productCard.querySelector(".product-text h5").textContent;

                    let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
                    const exists = favorites.some(item => item.name === productName);

                    if (!exists) {
                        favorites.push({
                            name: productName,
                            price: productPrice,
                            image: productImage,
                            status: productStatus
                        });

                        localStorage.setItem("favorites", JSON.stringify(favorites));
                        alert("Produk ditambahkan ke favorit!");
                    } else {
                        alert("Produk sudah ada di favorit!");
                    }
                });
            });
        });
    </script>

    <!-- JavaScript untuk fungsi rating -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const heartIcons = document.querySelectorAll(".heart-icon i");
            heartIcons.forEach(icon => {
                icon.addEventListener("click", function () {
                    this.classList.toggle("active");
                });
            });

            const ratings = document.querySelectorAll(".ratting");
            ratings.forEach(rating => {
                const stars = rating.querySelectorAll("i");
                stars.forEach((star, index) => {
                    star.addEventListener("click", function () {
                        stars.forEach(s => s.classList.remove("active"));
                        for (let i = 0; i <= index; i++) {
                            stars[i].classList.add("active");
                        }
                    });
                });
            });
        });
    </script>

    <!-- buat cart -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const cartIcons = document.querySelectorAll(".cart-icon");

        cartIcons.forEach(icon => {
            icon.addEventListener("click", function () {
                const productCard = this.closest(".product-item"); 
                const productId = new URLSearchParams(productCard.querySelector("a").href.split('?')[1]).get("id"); // Ambil ID dari href
                const productName = productCard.querySelector(".price h4").textContent;
                const productPrice = productCard.querySelector(".price p").textContent;
                const productImage = productCard.querySelector("img").src;
                const productStatus = productCard.querySelector(".product-text h5").textContent;

                if (!productId) {
                    console.error("ID produk tidak ditemukan!");
                    return;
                }

                // Ambil data cart dari localStorage
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                const exists = cart.some(item => item.id === productId);

                if (!exists) {
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        image: productImage,
                        status: productStatus,
                        quantity: 1 // Default quantity
                    });

                    localStorage.setItem("cart", JSON.stringify(cart));
                    alert("Produk ditambahkan ke keranjang!");
                } else {
                    alert("Produk sudah ada di keranjang!");
                }
            });
        });
    });
    </script>

    <!-- Banner Section -->
    <section class="main-home" id="home">
        <div class="main-text">
            <h5>Florist Purwokerto</h5>
            <h1>Flowers <br> Craft & Bouquet</h1>
            <p>Express Your Love and Care</p>
            <a href="#artificial" class="main-btn"><b>Buy Now</b><i class='bx bx-right-arrow-alt'></i></a>
        </div>
    </section>

    <!-- Artificial Flowers Product Section -->
    <section class="artificial" id="artificial">
        <div class="center-text">
            <h2>Artificial Flower <span>Products</span></h2>
        </div>
        <div class="products">
            <?php foreach ($artificial_products as $product): ?>
                <div class="row product-item">
                    <a href="detailpage.php?id=<?php echo $product['id']; ?>">
                        <img src="<?php echo $product['image']; ?>" alt="Product Image">
                        <div class="product-text"><h5>NEW</h5></div>
                        <div class="price">
                            <h4><?php echo $product['name']; ?></h4>
                            <p>Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                        </div>
                    </a>
                    <div class="heart-icon"><i class='fa-regular fa-heart'></i></div>
                    <div class="cart-icon"><i class='bx bx-cart'></i></div>
                    <div class="ratting">
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <br><br>
        <!-- <div class="center-text">
            <h2>Fresh Flower <span>Products</span></h2>
        </div>
        <div class="products">
            <?php foreach ($fresh_products as $product): ?>
                <div class="row product-item">
                    <a href="detailpage.php?id=<?php echo $prodak['id']; ?>">
                        <img src="<?php echo $product['image']; ?>" alt="Product Image">
                        <div class="product-text"><h5>NEW</h5></div>
                        <div class="price">
                            <h4><?php echo $product['name']; ?></h4>
                            <p>Rp. <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                        </div>
                    </a>
                    <div class="heart-icon"><i class='fa-regular fa-heart'></i></div>
                    <div class="cart-icon"><i class='bx bx-cart'></i></div>
                    <div class="ratting">
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                    </div>
                </div>
            <?php endforeach; ?> -->
        </div>
    </section>

        <!-- Client Review Section -->
        <section class="client-review" id="review">
            <div class="container text-center">
                <h3 style="font-size: 30px;">Client Reviews</h3>
                <div class="reviews-wrapper">
                    <button class="prev" onclick="scrollReviews(-1)">&#10094;</button>
                    <div class="reviews">
                        <div class="review">
                            <img src="assets/nabila.jpeg" alt="">
                            <div class="star-review">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <p class="review-text">Saya pesan buket untuk ulang tahun teman saya, hasilnya sangat cantik! Bunga segar, pengiriman tepat waktu, dan kemasan rapi. Teman saya sangat senang dengan bunganya! Terimakasihh</p>
                            <h2 class="buyer-name">Nabila</h2>
                            <p class="buyer-role">The Buyer</p>
                        </div>
                        <div class="review">
                            <img src="assets/nayla.jpeg" alt="">
                            <div class="star-review">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <p>Pilihan buket yang mereka tawarkan sungguh mengesankan, dengan beragam jenis bunga yang indah untuk dipilih. Pengiriman dilakukan dengan cepat, dan buketnya tiba dalam kondisi sempurna, membuat kejutan saya menjadi lebih berkesan.</p>
                            <h2>Nayla</h2>
                            <p>The Buyer</p>
                        </div>
                        <div class="review">
                            <img src="assets/afra.jpeg" alt="">
                            <div class="star-review">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <p>Springvale berhasil membuat momen pertunangan saudara semakin spesial dengan buket bunga yang sangat indah! Pilihan bunga yang dipadukan dengan wrapping premium membuatnya terlihat elegan dan mewah. Keren sekali!!</p>
                            <h2>Afra</h2>
                            <p>The Buyer</p>
                        </div>
                        <div class="review">
                            <img src="assets/mega.jpeg" alt="">
                            <div class="star-review">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                            <p>Buket valentine dari Springvale sangat luar biasa! Bunga segar dan warna yang sempurna, membuat hari kami semakin istimewa. Pelayanan cepat dan mudah, lewat website semua serba cepat. Terima kasih, Springvale!"</p>
                            <h2>Mega</h2>
                            <p>The Buyer</p>
                        </div>
                    </div>
                    <button class="next" onclick="scrollReviews(1)">&#10095;</button>
                </div>
            </div>
        </section>

    <script>
        let index = 0;
        
        function scrollReviews(direction) {
            const reviews = document.querySelector(".reviews");
            const totalReviews = document.querySelectorAll(".review").length;
            const prevButton = document.querySelector(".prev");
            const nextButton = document.querySelector(".next");

            index += direction;

            // Cek batas agar tidak bisa geser lebih dari batas
            if (index <= 0) {
                index = 0;
                prevButton.style.display = "none"; 
            } else {
                prevButton.style.display = "block"; 
            }

            if (index >= totalReviews - 1) {
                index = totalReviews - 1;
                nextButton.style.display = "none";
            } else {
                nextButton.style.display = "block"; 
            }

            reviews.style.transform = `translateX(${-index * 100}%)`;
        }

        // Sembunyikan tombol prev di awal halaman
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector(".prev").style.display = "none"; 
        });
    </script>

    <!-- Update News Section -->
    <section class="update-news" id="blog">
        <div class="up-center-text">
            <h2>New <span class="highlight">Updates</span></h2>
        </div>
        <div class="update-article">
            <div class="article">
                <img src="assets/40.jpeg" alt="Custom Bouquet">
                <h5>12 January 2025</h5>
                <h4>Create Your Custom Bouquet</h4>
                <p>With Create Your Custom Bouquet, you have the freedom to design a floral arrangement that reflects your style, occasion, and heartfelt.</p>
                <button class="read-more" onclick="window.location.href='article.php'">
                    <i class="fas fa-book"></i> Continue Reading
                </button>
            </div>
            <div class="article">
                <img src="assets/fresh.jpg" alt="Fresh Flowers">
                <h5>28 August 2023</h5>
                <h4>Fresh Flowers for Your Loved One</h4>
                <p>Fresh flowers are always a special gift choice for loved ones. Its natural beauty, soothing aroma. Good choice with your someone you loved.</p>
                <button class="read-more" onclick="window.location.href='article.php'">
                    <i class="fas fa-book"></i> Continue Reading
                </button>
            </div>
            <div class="article">
                <img src="assets/23.jpg" alt="Wedding Flowers">
                <h5>14 October 2024</h5>
                <h4>Flowers Wedding Dream</h4>
                <p>A Flowers Wedding Dream is about selecting the perfect blooms that reflect your love story and wedding theme.</p>
                <button class="read-more" onclick="window.location.href='article.php'">
                    <i class="fas fa-book"></i> Continue Reading
                </button>
            </div>
        </div>
    </section>


   
    <!-- Footer Section -->
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
                <p>Acrylic & Frame</p>
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

    <div class="end-text">
        <p>Copyright @2025. All Right Reserved. Designed By FourPuff Girls.</p>
    </div>

</body>
</html>