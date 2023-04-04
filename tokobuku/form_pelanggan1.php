<?php
require "koneksi.php";

//$id_pelanggan = $_GET["id_pelanggan"] ?? 0 ;
$id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : 0;

if ($id_pelanggan > 0) {
    $sql = "SELECT * FROM tb_pelanggan  WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)):
        $id_pelanggan = $row['id_pelanggan'];
        $nama_pelanggan = $row['nama_pelanggan'];
        $alamat = $row['alamat'];
    endwhile;
    $form_action = 'edit_pelanggan.php';
    $title = "Edit Data Pelanggan";
}
else {
    $id_pelannggan = '';
    $nama_pelanggan = '';
    $alamat = '';
    $form_action = 'tambah_pelanggan.php';
    $title = "Tambah Data pelanggan";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pelangga</title>
</head>
<body>
    <nav>
        <ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelangga</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
    </nav>

    <h2 style="margin-bottom:20px"><?=$title ?></h2>
    <form action="<?=$form_action ?>" method="post">
    <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan ?>">
    <label for="nama_pelanggan">Nama pelanggan</label>
    <input type="text" name="nama_pelanggan" value="<?=$nama_pelanggan ?>">
    <label for="alamat">alamat</label>
    <input type="text" name="alamat" value="<?=$alamat ?>">
    <input type="submit" value="simpan"/>

    </form>

</body>
</html>