<?php
require "koneksi.php";

// $id_pelanggan = $_GET['id_pelanggan'];
$id_pelanggan = $_GET['id_pelanggan'] ?? 0;
// $id_pelanggan = !empty($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : 0;

if ($id_pelanggan > 0 ) {
    $row = getCustomerbyID($id_pelanggan);
    $id_pelanggan = $row['id_pelanggan'];
    $nama_pelanggan = $row['nama_pelanggan'];
    $alamat = $row['pelanggan'];
    $form_action = "action.php?action=update_customer";
    $title = "Edit Data Pelanggan";
} else {
    $id_pelanggan = '';
    $nama_pelanggan = '';
    $alamat = '';
    $form_action = "action.php?action=insert_customer";
    $title = "Tambah Data Pelanggan";
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>

<body>
<nav>
    <ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
    <h2> Edit Data Pelanggan </h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan?>" required/>
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?=$nama_pelanggan?>" required/><br>
        <label for="alamat">Alamat</label>
        <input type="alamat" id="alamat" name="alamat" value="<?=$alamat?>" required/><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html> 