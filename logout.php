<?php
session_start();
// Menghapus semua data session
session_unset();
// Menghancurkan session
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ffd6e7, #ffffff);
        }

        .card {
            background: white;
            width: 350px;
            padding: 40px;
            text-align: center;
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(255, 182, 193, .25), 0 5px 15px rgba(0, 0, 0, .05);
            animation: fadeUp 1s ease;
        }

        h2 { color: #444; margin-top: 0; }
        p { color: #666; }

        a {
            display: block;
            margin-top: 25px;
            padding: 12px;
            border-radius: 30px;
            background: #f8a5c2;
            color: white;
            text-decoration: none;
            transition: .3s;
        }

        a:hover {
            background: #f78fb4;
            transform: translateY(-3px);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="card">
        <h2>Logout Berhasil</h2>
        <p>Session kamu sudah dihapus.</p>
        <a href="login.php">Kembali ke Login</a>
    </div>

</body>
</html>