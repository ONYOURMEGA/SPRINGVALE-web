<?php
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$host = 'localhost';
$dbname = 'springvale';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil username dari session
    $loggedInUsername = $_SESSION['username'];

    // Ambil data user dari database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $loggedInUsername]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "User tidak ditemukan.";
        exit();
    }

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 100px;
            min-height: 100vh;
        }
        /* Header & Navbar */
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
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navmenu li {
            display: flex;
        }

        .navmenu a {
            color: black;
            font-size: 16px;
            text-transform: capitalize;
            padding: 10px 20px;
            font-weight: 400;
            text-decoration: none; /* Hilangkan garis bawah */
            transition: all 0.3s ease;
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
            transition: all 0.42s ease;
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
        /* profile */
        .profile-container {
            width: 40%;
            height: 10%px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 50px;
            margin-top: 40px;
        }
        .profile-header {
            background: #f8c3d4;
            padding: 70px 0;
            border-radius: 10px 10px 0 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
        }
        .profile-pic {
            width: 80px;
            height: 80px;
            background: #ddd;
            border-radius: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            color: gray;
            margin: 50px auto 10px;
            position: relative;
            z-index: 1;
        }
        h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        p {
            color: gray;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }
        .edit-btn {
            background: white;
            border: 1px solid #ddd;
            color: #333;
            width: 150px;
            border-radius: 10px;
            height: 40px;
        }
        .edit-btn:hover {
            background: #ddd;
            color: black;
        }
        .logout-btn {
            background: #BA7291;
            font-size: 13px;
            color: white;
            width: 150px;
            border-radius: 10px;
            height: 40px;
        }
        .logout-btn:hover {
            background: #9e3c68;
        }
        .info-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
            text-align: left;
        }
        .info-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .info-item label {
            font-size: 14px;
            font-weight: 500;
            width: 120px;
            text-align: left;
        }
        .info-item input, .info-item textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: white;
        }
        textarea {
            height: 60px;
            resize: none;
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

        <!-- profile section -->
        <div class="profile-container">
            <div class="profile-header"></div>
            <div class="profile-pic">
                <i class="fa-solid fa-user"></i>
            </div>
            <h2><?php echo htmlspecialchars($user['username']); ?></h2>
            <!-- <p>@nelsonlmao</p> -->
            <div class="btn-container">
                <button onclick="window.location.href='editprofile.php'" class="edit-btn">Edit</button>
                <button onclick="window.location.href='index.php'" class="logout-btn">Log out</button>
            </div>
            <div class="info-container">
                <div class="info-item">
                    <label>Name</label>
                    <input id="profile-name" type="text" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
                </div>
                <div class="info-item">
                    <label>Username</label>
                    <input id="profile-username" type="text" value="@<?php echo htmlspecialchars($user['username']); ?>" readonly>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <input id="profile-email" type="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
            </div>
        </div>  
</body>
</html>
