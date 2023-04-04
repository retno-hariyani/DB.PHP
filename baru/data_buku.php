<?php
require "koneksi.php";

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Penjualan</title> 
    <link rel="stylesheet" herf="css/style.css" type="text/css" />
    <link href="https://fons.googleapis.com/css2? family=Merriweather+Sans&family=Roboto=Condensed&display=swap" rel="stylesheet"/>  
</head>
<body>
<nav>
    <ul>
        <li><a href="walcome.php">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi">Data Transaksi</a></li>
    </ul>
</nav>

<div class= "container">
    <h2>Data Buku Toko Saya</h2>
    <a href="form_buku.php" class="add-button">Tambah Data Buku</a>
    <table>
        <tr>
            <!--<th>No</th>-->
            <th class="aksi">Id Buku</th>
            <th>nama_buku</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>harga</th>
            <th class="aksi">Aksi</th>
        </tr>
        <?php foreach(getbooks() as $row) : ?>
            <!--<td></td>-->
            <td class="center-align"><?= $row['id_buku'] ?></td>
            <td><?= $row['nama_buku'] ?></td>
            <td><?= $row['penulis'] ?></td>
            <td><?= $row['penerbit'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td class="center-align">
                <a href="form_buku.php?id_buku=<?=$row['id_buku']?>" class="edit-button">Edit</a>
                <a href="action_buku.php?id_buku=<?=$row['id_buku']?>" class="del-button">Hapus</a>
             </td>
         </tr>
        <?php endforeach ?>
    </table>
</div>
</body>
</html>