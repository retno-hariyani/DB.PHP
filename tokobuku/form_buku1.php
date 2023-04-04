<?php
require "koneksi.php";

//$id_buku = $_GET["id_buku"] ?? 0 ;
$id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : 0;

if ($id_buku > 0) {
    $sql = "SELECT * FROM tb_buku  WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)):
        $id_buku = $row['id_buku'];
        $nama_buku = $row['nama_buku'];
        $penulis = $row['penulis'];
        $penerbit = $row['penerbit'];
        $harga = $row['harga'];
    endwhile;
    $form_action = 'edit_buku.php';
    $title = "Edit Data Buku";
}
else {
    $id_buku = '';
    $nama_buku = '';
    $penulis = '';
    $penerbit = '';
    $harga = '';
    $form_action = 'tambah_buku.php';
    $title = "Tambah Data Buku";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
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
    <input type="hidden" name="id_buku" value="<?=$id_buku ?>">
    <label for="nama_buku">Nama Buku</label>
    <input type="text" name="nama_buku" value="<?=$nama_buku ?>">
    <label for="penulis">Penulis</label>
    <input type="text" name="penulis" value="<?=$penulis ?>">
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit" value="<?=$penerbit ?>">
    <label for="harga">Harga</label>
    <input type="number" name="harga" value="<?=$harga ?>">
    <input type="submit" value="simpan"/>

    </form>

</body>
</html>