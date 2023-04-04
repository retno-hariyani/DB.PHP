<?php
require "koneksi.php";
$id_buku = $_POST['id_buku'];
$id_pelanggan = $_POST['id_pelanggan'];
$jumlah= $_POST['jumlah'];

$query = mysqli_query($conn, "SELECT harga from tb_buku WHERE id_buku = '$id_buku'");
while ($row = mysqli_fetch_array($query)) :
    $harga = $row['harga'];
    $total_pembayaran = $_POST['jumlah']*$row['harga'];

    $sql = "INSERT INTO tb_transaksi VALUE (null, '$id_pelanggan', '$id_buku', '$jumlah', '$harga', '$total_pembayaran')";
    mysqli_query($conn,$sql);

endwhile;

header("location:data_transaksi.php");

?>