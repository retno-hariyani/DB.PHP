<?php
    require "koneksi.php";

    $id_pelanggan = $_POST ['id_pelanggan'];
    $nama_pelanggan = $_POST ['nama_pelanggan'];
    $alamat = $_POST ['alamat'];

    $sql = "INSERT INTO tb_pelanggan VALUES ('', '$nama_pelanggan', '$alamat')";
    mysqli_query($conn,$sql);
    header("location: data_pelanggan.php");

?>