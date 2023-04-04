<?php
require "koneksi.php";

$sql = "SELECT
            tb_transaksi.id_transaksi,
            tb_pelanggan.id_pelanggan,
            tb_buku.id_buku,
            tb_buku.nama_buku,
            tb_pelanggan.nama_pelanggan,
            tb_transaksi.jumlah,
            tb_transaksi.harga_saat_ini,
            tb_transaksi.total_pembayaran,
            tb_buku.harga
        FROM tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan
        INNER JOIN tb_buku ON tb_buku.id_buku = tb_transaksi.id_buku;";
$result = mysqli_query ($conn, $sql);
?>
<!DOCTYPE html>
    <head></head>

<body>
    <table  border="1">

    <tr>
        <th>id_transaksi</th>
        <th>nama_pelanggan</th>
        <th>nama_buku</th>
        <th>jumlah</th>
        <th>harga_saat_ini</th>
        <th>total_pembayaran</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row=mysqli_fetch_assoc($result)): ?>
    <tr>
         <td><?=$row['id_transaksi']?> </td>
         <td><?=$row['nama_pelanggan']?> </td>
         <td><?=$row['nama_buku']?> </td>
         <td><?=$row['jumlah']?> </td>
         <td><?=$row['harga_saat_ini']?> </td>
         <td><?=$row['total_pembayaran']?> </td>
    <td>
        <a href="delete_transaksi.php?id_transaksi=<?= $row['id_transaksi']?>">Hapus</a>
        <a href="editform_transaksi.php?id_transaksi=<?= $row['id_transaksi']?>">edit</a>
    </td>
    </tr>
    <?php endwhile ?>
</body>
</html>