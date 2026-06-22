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


    function tambahdata($data,$files)
{ 
    global $koneksi;

    $nama = htmlspecialchars ($data["nama"]);
    $nim = htmlspecialchars ($data["nim"]);
    $jurusan = htmlspecialchars ($data["jurusan"]);
    $email = htmlspecialchars ($data["email"]);
    $no_hp = htmlspecialchars ($data["no_hp"]);
    
    $namafoto = $files["name"];
    $tmpfoto = $files["tmp_name"];

    $path = "assets/image/$namafoto";

    if(move_uploaded_file($tmpfoto, $path))
    {
        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
        VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";
        mysqli_query($koneksi, $query);
    }
        return mysqli_affected_rows($koneksi);
    
}

    function hapusdata($id)
{
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id=$id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

    function ubahdata($data, $id)
{
    global $koneksi;

    $nama = htmlspecialchars ($data["nama"]);
    $nim = htmlspecialchars ($data["nim"]);
    $jurusan = htmlspecialchars ($data["jurusan"]);
    $email = htmlspecialchars ($data["email"]);
    $no_hp = htmlspecialchars ($data["no_hp"]);
    $foto = htmlspecialchars ($data ["foto"]);


    $query = "UPDATE mahasiswa SET 
                nama='$nama', 
                nim= '$nim', 
                jurusan= '$jurusan',
                email= '$email',
                no_hp= '$no_hp',
                foto= '$foto'
                WHERE id='$id' ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
?>