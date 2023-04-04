<?php
require "koneksi.php";
$id_transaksi = $_POST['id_transaksi'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_buku = $_POST['id_buku'];
$jumlah = $_POST['jumlah'];

$sql = "SELECT harga from tb_buku WHERE id_buku = '$id_buku'";
var_dump($sql);
$result = mysqli_query($conn, $sql);
echo"<br>";

while ($row = mysqli_fetch_array($result)):
    echo "<br>";
    $harga = $row['harga'];
    $total_harga = $_POST['jumlah']*$row['harga'];
    

    $query = "UPDATE tb_transaksi SET id_pelanggan = '$id_pelanggan', id_buku = '$id_buku', jumlah='$jumlah', harga_saat_ini = '$harga', total_pembayaran = 
    '$total_harga' WHERE id_transaksi = '$id_transaksi'";
    var_dump($query);
    $hasil = mysqli_query($conn, $sql);
    if($hasil){
        header ("location:data_transaksi.php");
    }
endwhile;

?>