
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springvale Studio</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url('./assets/index.png'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            margin-bottom: 230px;
        }
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 200px;
        }
        .heading {
            font-size: 40px;
            font-weight: bold;
            margin-top: -200px;
            color:black
        }
        .subtitle {
            color: #8B8B8B;
            font-size: 20px;
            margin: 10px 0;
            margin-bottom: 20px;
            margin-top: -10px;
        }
        .buttons button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .login {
            background-color: #d16b86;
            border: 2px solid black; 
            border-radius: 10px; 
            color: white; 
            padding: 10px 30px; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .register {
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid black;
            border-radius: 10px; 
            color: black;
            padding: 10px 30px; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="./assets/springvale (2).png" alt="Logo" class="logo">
        <h1 class="heading">Hey there!</h1>
        <p class="subtitle">Before you continue, log in or sign up to unlock all<br>the awesome features.</p>
        <div class="buttons">
            <!-- <button class="login" onclick="showAlert('home')">Login</button> -->
            <button class="login"onclick="window.location.href='login.php'">Login</button>
            <!-- <button class="signup" onclick="showAlert('Sign Up')">Sign Up</button> -->
            <button class="register"onclick="window.location.href='register.php'">Register</button>
        </div>
    </div>
    <script>
        function showAlert(action) {
            alert(action + " button clicked!");
        }
    </script>
</body>
</html>