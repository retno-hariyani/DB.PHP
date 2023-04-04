<?php
require "koneksi.php";

$id_pelanggan= $_POST['id_pelanggan'];
$nama_pelanggan= $_POST['nama_pelanggan'];
$alamat= $_POST['alamat'];

$sql = "UPDATE tb_pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat' WHERE id_pelanggan = '$id_pelanggan'";
$result= mysqli_query($conn, $sql);

if ($result) {
    echo "<script> 
     alert('edit berhasil');
     location.href = 'data_buku.php';
     </script>";
 }else{
     echo "<script> 
     alert('edit gagal');
     location.href = 'data_buku.php';
     </script>";
 
 }
 ?>
