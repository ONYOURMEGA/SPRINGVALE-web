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

    .body {
        font-family: 'Poppins', sans-serif;
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

    #favorite {
        margin-top: 20px;
        padding: 40px 20px;
    }

    .center-text h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .products {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .row {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 220px;
        text-align: left;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .row:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .row img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 5px;
    }

    .product-text h5 {
        position: absolute;
        top: 13px;
        left: 13px;
        color: #fff;
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        background-color: #edaeae;
        padding: 3px 10px;
        border-radius: 2px;
    }

    .heart-icon {
        cursor: pointer;
        font-size: 20px;
        color: red;
        margin-top: 0px;
        position: absolute;
        right: 14px;
        top: 281px;
    }

    .ratting i {
        color: gold;
    }

    .price h4 {
        font-size: 18px;
        margin-top: -5px;
        font-weight: 600;
        text-align: left;
    }

    .price p {
        color: black;
        font-size: 16px;
        text-align: left;
    }

    #no-result {
        text-align: center;
        color: red;
        font-size: 18px;
        margin-top: 20px;
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
    <section id="favorite">
        <div class="center-text">
            <h2 style="margin-top: 60px;">Your <span>Favorite</span> Finds</h2>
        </div>
        <div class="products favorite-products">
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const favoriteContainer = document.querySelector(".favorite-products");
            let favoriteItems = JSON.parse(localStorage.getItem("favorites")) || [];
        
            function renderFavorites() {
                favoriteContainer.innerHTML = ""; 
                favoriteItems.forEach(product => {
                    const productElement = document.createElement("div");
                    productElement.classList.add("row");
                    productElement.innerHTML = `
                        <img src="${product.image}" alt="">
                        <div class="product-text">
                            <h5>${product.status}</h5>
                        </div>
                        <div class="heart-icon" data-name="${product.name}">
                            <i class='bx bxs-heart' style="color: palevioletred;"></i> 
                        </div>
                        <div class="ratting">
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="price">
                            <h4>${product.name}</h4>
                            <p>${product.price}</p>
                        </div>
                    `;
        
                    favoriteContainer.appendChild(productElement);
                });
            }
        
            function removeFromFavorites(productName) {
                favoriteItems = favoriteItems.filter(item => item.name !== productName);
                localStorage.setItem("favorites", JSON.stringify(favoriteItems));
                renderFavorites();
            }
        
            // Gunakan event delegation di parent container
            favoriteContainer.addEventListener("click", function (event) {
                if (event.target.closest(".heart-icon")) {
                    let productName = event.target.closest(".heart-icon").getAttribute("data-name");
                    removeFromFavorites(productName);
                }
            });
        
            renderFavorites();
        });
        </script>        
</body>
</html>