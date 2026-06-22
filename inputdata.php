<?php

require 'fungsi.php';

if(isset($_POST["kirim"]))
{

    if(tambahdata($_POST, $_FILES["foto"]) > 0)
    {
        echo "<script>
                alert('Data Berhasil Ditambahkan!');
                window.location.href='mahasiswa.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Data Gagal Ditambahkan!');
                
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data Mahasiswa | WEB INFORMATIKA C 2026 </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
         <h1>
            INPUT DATA MAHASISWA 
        </h1>
        <hr>
        <table border = "1" cellspacing="0" cellpadding="10px">
            <tr>
                <th>
                    <a href="index.php">Home</a>
                </th>
                <th> 
                    <a href="profile.php">Profile</a>
                </th>
                <th> 
                    <a href="kontak.php">Kontak</a>
                </th>
                <th>
                    <a href="mahasiswa.php"> Data Mahasiswa </a> 
                </th>
            </tr>
        </table>
        <h2> Input Data Mahasiswa  </h2>
        <form action = "" method = "post" enctype="multipart/form-data">
        <table border = "1" cellspacing="5px">
                <tr>
                    <td><label for="nama"> NAMA </label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama" required></td>
                </tr>
                <tr>
                    <td><label for="nama"> NIM </label></td>
                    <td>:</td>
                    <td><input type="number" name="nim" id="nim" required></td>
                </tr>
                <tr>
                    <td><label for="prodi"> Progam Studi </label></td>
                    <td>:</td>
                    <td> <input type="text" name="jurusan" id="prodi" required></td>
                </tr>
                <tr>
                    <td><label for="email"> Email </label></td>
                    <td>:</td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="nohp"> No. Hp </label></td>
                    <td>:</td>
                    <td> <input type="number" name="no_hp" id="nohp"></td>
                </tr>
                 <tr>
                    <td><label for="foto"> Foto </label></td>
                    <td>:</td>
                    <td> <input type="file" name="foto" id="foto"></td>
                </tr>
            </table>
            <button type="submit" name="kirim" >Kirim Data </button>
        </form>
</body>
</html>