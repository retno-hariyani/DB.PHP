<?php
require "koneksi.php";
$result_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM tb_pelanggan");
$result_buku = mysqli_query($conn, "SELECT id_buku, nama_buku, harga FROM tb_buku");

$options_pelanggan = mysqli_fetch_all($result_pelanggan, MYSQLI_ASSOC);
$options_buku = mysqli_fetch_all($result_buku, MYSQLI_ASSOC);

$id_transaksi = $_GET['id_transaksi'];
$sql = "SELECT tb_transaksi.id_transaksi, tb_pelanggan.id_pelanggan, tb_buku.id_buku, tb_pelanggan.nama_pelanggan, tb_buku.nama_buku, tb_transaksi.jumlah, tb_transaksi.harga_saat_ini, tb_transaksi.total_pembayaran FROM
tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan INNER JOIN tb_buku ON tb_buku.id_buku = tb_transaksi.id_buku WHERE tb_transaksi.id_transaksi = '$id_transaksi'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)):

?>

<!DOCTYPE html>
<head>
</head>

<body>
    <form action="edit_transaksi.php" method="post">
        <input type="hidden" name="id_transaksi" value="<?$row['id_transaksi']?>" />

        <label for="nama_pelanggan">Nama pelanggan</label>
        <select name="id_pelanggan" id="nama_pelanggan"><?=$row['nama_pelanggan']?>
            <?php foreach ($options_pelanggan as $option) {
                $selected = $option['id_pelanggan']==$row['id_pelanggan'] ? 'selected' : '';
            ?>
            <option value="<?=$option['id_pelanggan']?>" <?= $selected ?>><?=$option['nama_pelanggan']?></option>
            <?php } ?>
        </select><br>

        <label for="nama_buku">Nama buku</label>
        <select name="id_buku" id="nama_buku"><?=$row['nama_buku']?>
            <?php foreach ($options_buku as $option) {
                $selected = $option['id_buku']==$row['id_buku'] ? 'selected' : '';
            ?>
            <option value="<?=$option['id_buku']?>" 
                <?= $selected ?>><?=$option['nama_buku'] . ' -Rp ' . $option['harga']?>
            </option>
            <?php } ?>
        </select><br>

        <label for="jumlah">qty</label>
        <input type="text" name="jumlah" id="jumlah" value="<?=$row['jumlah']?>"></input><br>
        <input type="submit" value="ubah">
        <?php endwhile; ?>
    </form>
</body>
</html>