<?php
require "koneksi.php";

$id_buku = $_GET["id_buku"];
mysqli_query($conn, "DELETE FROM tb_buku
WHERE id_buku='$id_buku'");
header("location: data_buku.php");

?>