<?php 
require "koneksi.php";

$id_buku = $_GET["id_buku"] ?? 0 ; 

if ($id_buku > 0) {
    $row = getBookbyID($id_buku);
    $id_buku = $row['id_buku'];
    $nama_buku = $row['nama_buku'];
    $pengarang = $row['penulis'];
    $pengarang = $row['penerbit'];
    $harga = $row['harga'];

    $form_action = "action.php?action=update_book";
    $title = "Edit Data Buku";
}
else {
    $id_buku = '';
    $nama_buku = '';
    $penulis = '';
    $penerbit = '';
    $harga = '';
    $form_action = 'action.php?action=insert_book';
    $title = "Tambah Data Buku";
}
?>

<!DOCTYPE html> 
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
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
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_buku" value="<?=$id_buku?>" />
        <label for="nama_buku">Nama Buku</label>
        <input type="text" name="nama_buku" value="<?=$nama_buku?>"/><br>
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" value="<?=$penulis?>" /><br>
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" value="<?=$penerbit?>" /><br>
        <label for="harga">Harga</lab el>
        <input type="number" name="harga" value="<?=$harga?>"/><br>
        <input type="submit" value="Simpan"/>
    </form>
</body>
</html>
