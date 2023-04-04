<?php
require "koneksi.php";
$aksi = $_GET['action'];

switch ($aksi) {
    // aksi untuk insert ke data buku
    case 'insert_book':
        //insertBook($nama_buku,$penerbit,$penulis,$harga)
        $nama_buku = $_POST['nama_buku'];
        $penerbit = $_POST['penerbit'];
        $penulis = $_POST['penulis'];
        $harga = $_POST['harga'];
        $result = insertBook($nama_buku,$penerbit,$penulis,$harga);
        if ($result) {
            $msg = "Tambah Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Tambah Buku Gagal";
            $loc = "data_buku.php";
        }
        break;

    // aksi untuk edit data buku
    case 'update_book':
        // $id_buku = $_POST['id_buku'];
        // $nama_buku = $_POST['nama_buku'];
        // $penerbit = $_POST['penerbit'];
        // $penulis = $_POST['penulis'];
        // $harga = $_POST['harga'];
        // $result = updateBook($id_buku, $nama_buku, $penerbit, $penulis, $harga);
        $result = updateBook($_POST['id_buku'], $_POST['nama_buku'], $_POST['penerbit'], $_POST['penulis'], $_POST['harga']);
        if ($result) {
            $msg = "Edit Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Edit Buku Gagal";
            $loc = "data_buku.php";
        }
        break;
    //aksi untuk delete data buku
    case 'delete_book':
        $result = deleteBook($_GET['id_buku']);
        if ($result) {
            $msg = "Hapus Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Hapus Buku Gagal";
            $loc = "data_buku.php";
        }
        break;
    //aksi untuk insert data pelanggan
    case 'insert_customer':
        $result = insertCustomers($_POST['nama_pelanggan'], $_POST['alamat']);
        if ($result) {
            $msg = "Tambah Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Tambah Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk edit data pelanggan
    case 'update_customer':
        $result = updateCustomer($_POST['id_pelanggan'], $_POST['nama_pelanggan'], $_POST['alamat']);
        if ($result) {
            $msg = "Edit Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Edit Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk delete data pelanggan
    case 'delete_customer':
        $result = deleteCustomer($_GET['id_pelanggan']);
        if ($result) {
            $msg = "Hapus Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Hapus Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk insert data transaksi
    case 'insert_transaction':
        $id_buku = $_POST['id_buku'];
        $row = getHargaBuku($id_buku);
        $harga_saat_ini = $row['harga_saat_ini'];
        $total_pembayaran = $harga_saat_ini * $_POST['jumlah'];
        $result = insertTransaction($_POST['id_pelanggan'], $_POST['id_buku'], $_POST['jumlah'], $harga_saat_ini, $total_pembayaran);
        if ($result) {
            $msg = "Tambah Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Tambah Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;
    //aksi untuk edit data transaksi
    case 'update_transaction':
        $id_buku = $_POST['id_buku'];
        $row = getHargaBuku($id_buku);
        $harga_saat_ini = $row['harga_saat_ini'];
        $total_pembayaran = $jumlah * $_POST['harga_saat_ini'];
        $result = updateTransaction($_POST['id_transaksi'], $_POST['id_pelanggan'], $_POST['id_buku'], $_POST['jumlah'], $harga_saat_ini, $total_pembayaran);
        if ($result) {
            $msg = "Edit Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Edit Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;       
    //aksi untuk delete data transaksi
    case 'delete_transaction':
        $result = deleteTransaction($_GET['id_transaksi']);
        if ($result) {
            $msg = "Hapus Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Hapus Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break; 
 }

if (!empty($msg)){
    echo "<script>
        alert('$msg');
        location.href = '$loc';
    </script>";
}

?>