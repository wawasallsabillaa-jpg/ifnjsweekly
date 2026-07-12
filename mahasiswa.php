<?php
  require 'fungsi.php';

  $qmahasiswa = "SELECT * FROM mahasiswa"; /// karena query ke tabel mahasiswa 

  $mahasiswa = tampildata($qmahasiswa); /// menghasilkan  data dalamm wadah 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | WEB INFORMATIKA C 2026 </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        WEB INFORMATIKA WAWA 
    </h1>
    <hr>
    <table border = "1" cellspacing="0" cellpadding="10">
        <tr>
            <th> <a href="index.php">Home</a></th>
            <th> <a href="profile.php">Profile</a></th>
            <th> <a href="kontak.php">Kontak</a></th>
            <th> <a href="mahasiswa.php"> Data Mahasiswa </a></th>
            </tr>
    </table>
    <h3> Data Mahasiswa </h3>
    <a href = "inputdata.php">
    <button>Tambah Data</button> 
    </a>
    <br>
    <br>
    <table border="2" cellspacing="5px" cellpadding="10px">
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >NIM</th>
            <th >Jurusan</th>
            <th >Email</th>
            <th >No.Hp</th>
            <th >Foto</th>
            <th >Aksi</th>
            <!--th> Baris 1, Kolom 1</th>-->
        </tr>
    <?php
    $no = 1;
    foreach($mahasiswa as $mhs)
    {
    ?>
<tr>
    <td align="center"><?= $no ?></td>
    <td><?= $mhs[1] ?></td>
    <td align="center"><?= $mhs[2] ?></td>
    <td align="center"><?= $mhs[3] ?></td>
    <td align="center"><?= $mhs[4] ?></td>
    <td><?= $mhs[5] ?></td>
    <td><img src="assets/image/<?= $mhs[6] ?>" width="100px" height="70px"/></td>
    <td>
        <a href="ubahdata.php?id=<?= $mhs[0] ?>"><button>Edit</button></a>
        <a href="hapusdata.php?id=<?= $mhs[0] ?>" onclick="return confrim('yakin?!')" ><button>Hapus</button></a>
    </td>
</tr>
    <?php
    $no++;

    }
    ?>
</table>
        
      