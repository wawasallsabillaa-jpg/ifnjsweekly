<?php

require 'fungsi.php';

$id = $_GET["id"];
$query = "SELECT * FROM mahasiswa WHERE id=$id";
$mhs = tampildata($query)[0]; ///wadah isinya data yang spesifik id

if(isset($_POST["kirim"]))
{
    ///ketika ada data yang diedit
    if(ubahdata($_POST, $id) > 0)
    {
        echo "<script>
                alert('Data Berhasil Di Edit!');
                window.location.href='mahasiswa.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Data Gagal Di Edit');
                window.location.href='mahasiswa.php';
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EDIT DATA MAHASISWA | WEB INFORMATIKA C 2026 </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
         <h1>
            EDIT DATA MAHASISWA 
        </h1>
        <hr>
        <table border = "1" cellspacing="0" cellpadding="10">
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
        <h2> Edit Data Mahasiswa  </h2>
        <form action = "" method = "post">
            <table border="0">
                <tr>
                    <td><label for="nama"> Nama </label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama" value="<?= $mhs[1] ?>"
                     required></td>
                    
                </tr>
                <tr>
                    <td><label for="nama"> Nim </label></td>
                    <td>:</td>
                    <td><input type="number" name="nim" id="nim" value="<?= $mhs[2] ?>"
                    required></td>
                </tr>
                <tr>
                    <td><label for="prodi"> Progam Studi </label></td>
                    <td>:</td>
                    <td> <input type="text" name="jurusan" id="prodi" value="<?= $mhs[3] ?>"
                    required></td>
                </tr>
                <tr>
                    <td><label for="email"> Email </label></td>
                    <td>:</td>
                    <td><input type="email" name="email" id="email" value="<?= $mhs[4] ?>"
                    ></td>
                </tr>
                <tr>
                    <td><label for="nohp"> No. Hp </label></td>
                    <td>:</td>
                    <td> <input type="number" name="no_hp" id="nohp" value="<?= $mhs[5] ?>"
                    ></td>
                </tr>
                 <tr>
                    <td><label for="foto"> Foto </label></td>
                    <td>:</td>
                    <td> <input type="file" name="foto" id="foto" value="<?= $mhs[6] ?>"
                    ></td>
                </tr>
            </table>
            <button type="submit" name="kirim" >Edit Data </button>
        </form>
</body>
</html>