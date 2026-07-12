<?php
session_start();

// Koneksi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "login_session";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database gagal terkoneksi: " . mysqli_connect_error());
}

// Proses Login
$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data  = mysqli_fetch_assoc($query);

    if ($data) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['login']    = true;
            $_SESSION['nama']     = $data['nama'];
            $_SESSION['username'] = $data['username'];

            header("location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #333;
            --accent-color: #f8a5c2;
            --text-color: #555;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ffd6e7, #ffffff);
        }

        .container {
            width: 380px;
            padding: 45px;
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(255,182,193,.25), 0 5px 15px rgba(0,0,0,.05);
            animation: fadeUp 1s ease;
        }

        h1 { text-align: center; letter-spacing: 4px; color: #444; font-size: 25px; }
        h2 { color: #444; }

        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; }
        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 20px;
            border: 1px solid #eee;
            outline: none;
            box-sizing: border-box;
            transition: .3s;
        }
        input:focus { border-color: var(--accent-color); box-shadow: 0 0 10px rgba(248,165,194,.4); }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 30px;
            background: var(--accent-color);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: .3s;
        }
        button:hover { transform: translateY(-3px); background: #f78fb4; }

        .error {
            background: #ffe0eb;
            color: #d6336c;
            padding: 10px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .link { text-align: center; margin-top: 20px; }
        .link a { color: var(--accent-color); text-decoration: none; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>LOGIN</h1>
        <h2>WELCOME BACK!</h2>

        <?php if ($error != ""): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button name="login">Login</button>
        </form>

        <div class="link">
            Belum punya akun? <a href="register.php">Register</a>
        </div>
    </div>

</body>
</html>