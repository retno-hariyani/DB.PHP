<?php
require "koneksi.php";

$id_pelanggan = $_GET["id_pelanggan"];
mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
header("location: data_pelanggan.php");

?>