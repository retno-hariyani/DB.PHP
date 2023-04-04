<?php 
require "koneksi.php";

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
<div class="container">
<h2>Data Pelanggan Toko ABCDE</h2>
    <a href="form_pelanggan.php" class="add-button">Tambah Data Pelanggan</a>
    <table>
        <tr>
            <th class="aksi">ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat Pelanggan</th>
            <th class="aksi">Aksi</th>
        </tr>
        <?php foreach (getCustomers() as $row) { ?>
        <tr>
            <td class="center-align"><?=$row['id_pelanggan']?></td>
            <td><?=$row['nama_pelanggan']?></td>
            <td><?=$row['alamat']?></td>
            <td class="center-align">
                <a href="form_pelanggan.php?id_pelanggan=<?=$row['id_pelanggan']?>" class="edit-button">Edit</a>
                <a href="action.php?id_pelanggan=<?=$row['id_pelanggan']?>&action=delete_customer" class="del-button">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
 </body>
 </html>