<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB INFORMATIKA C 2026</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>WEB INFORMATIKA JUAK</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="kontak.php">Kontak</a>
        <a href="mahasiswa.php">Data Mahasiswa</a>

        <?php if (isset($_SESSION['login'])) : ?>
            <a href="logout.php">Logout</a>
        <?php else : ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <h3>BIODATA DIRI</h3>

        <div class="content-section">
            <h4><i>ABOUT ME</i></h4>
            <p>
                <strong>Nama:</strong> Najwa Salsabila <br>
                <strong>Nim:</strong> 13182420117 <br>
                <strong>Alamat:</strong> Perumahan Graha Mulia Asri 1 No 2B, Tembalang, Semarang <br>
                <strong>Hobi:</strong> Jajan, Nonton, Jalan Jalan
            </p>
        </div>
    </div>

</body>
</html>