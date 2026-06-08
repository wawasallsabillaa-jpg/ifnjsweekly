 <?php

 $koneksi = mysqli_connect("localhost", "root", "", "ifnjsweekly");

 function tampildata($query)
 {
    global $koneksi;
    $result = mysqli_query($koneksi, $query); /// lemari

    $rows = [];/// wadah

    while ($row = mysqli_fetch_row($result))
    {
        $rows[] = $row; ///ambil baju taruh ke wadah 
    }

    return $rows;
 }

function tambahdata($data)
{ 
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $email = $data["email"];
    $no_hp = $data["no_hp"];
    $foto = $data ["foto"];


    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
    VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
 ?>