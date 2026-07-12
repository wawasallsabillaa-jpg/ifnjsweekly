<?php
// Koneksi Database (Gunakan file config terpisah jika ingin lebih rapi)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "login_session";

$conn = mysqli_connect($host, $user, $pass, $db);

$message = "";
$message_type = ""; // untuk membedakan sukses/error

if (isset($_POST['register'])) {
    $nama     = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek apakah username sudah ada
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    
    if (mysqli_num_rows($check) > 0) {
        $message = "Username sudah terdaftar!";
        $message_type = "error";
    } else {
        // Input ke database
        $query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            $message = "Registrasi berhasil! Silakan <a href='login.php'>Login</a>";
            $message_type = "success";
        } else {
            $message = "Terjadi kesalahan sistem.";
            $message_type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; height: 100vh; margin: 0; display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, #ffd6e7, #ffffff); }
        .container { width: 380px; padding: 45px; background: white; border-radius: 30px; box-shadow: 0 20px 50px rgba(255,182,193,.25); animation: fadeUp 1s ease; }
        h1 { text-align: center; color: #444; font-size: 25px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; }
        input { width: 100%; padding: 12px 15px; border-radius: 20px; border: 1px solid #eee; box-sizing: border-box; outline: none; }
        button { width: 100%; padding: 13px; border: none; border-radius: 30px; background: #f8a5c2; color: white; cursor: pointer; transition: .3s; }
        button:hover { background: #f78fb4; }
        .msg { padding: 10px; border-radius: 15px; text-align: center; margin-bottom: 20px; }
        .error { background: #ffe0eb; color: #d6336c; }
        .success { background: #d4edda; color: #155724; }
        .link { text-align: center; margin-top: 20px; }
        .link a { color: #f8a5c2; text-decoration: none; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <div class="container">
        <h1>REGISTER</h1>

        <?php if ($message != ""): ?>
            <div class="msg <?= $message_type ?>"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button name="register">Daftar Sekarang</button>
        </form>

        <div class="link">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>