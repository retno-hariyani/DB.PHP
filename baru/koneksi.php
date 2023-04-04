<?php

/**fungsi untuk koneksi ke database */
function conn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_toko_buku";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    return $conn;
}

/** fungsi untuk menampilkan data buku */
function getBooks(){
    $conn = conn();
    $sql = "SELECT * FROM tb_buku";
    $result = mysqli_query ($conn, $sql);
    //biar ketika data di table buku kosong, $rows tidak undefined
    
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk menampilkan data pelanggan */
function getCustomers() {
    $conn = conn();
    $sql = "SELECT * FROM tb_pelanggan";
    $result = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk menampilkan data transaksi */
function getTransaction() {
    $conn = conn();
    $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.jumlah, tb_transaksi.harga_saat_ini, tb_transaksi.total_pembayaran, tb_pelanggan.id_pelanggan, tb_pelanggan.nama_pelanggan, tb_buku.id_buku, tb_buku.nama_buku FROM tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan INNER JOIN tb_buku ON tb_buku.id_buku = tb_transaksi.id_buku ORDER by id_transaksi";
    $result = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/**fungsi untuk query insert data buku */
function insertBook($nama_buku, $penulis, $penerbit, $harga){
    $conn = conn();
    $sql = "INSERT INTO tb_buku (nama_buku, penulis, penerbit, harga) VALUES ('$nama_buku','$penulis','$penerbit','$harga')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/**fungsi untuk menampilkan data buku berdasarkan id_buku tertentu */
function getBookbyID($id_buku){
    $conn = conn();
    $sql = "SELECT * FROM tb_buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;   
}

/**fungsi untuk query edit data buku */
function updateBook($id_buku, $nama_buku, $penulis, $penerbit, $harga){
    $conn = conn();
    $sql = "UPDATE tb_buku SET nama_buku ='$nama_buku', penulis ='$penulis', penerbit ='$penerbit', harga ='$harga' WHERE id_buku ='$id_buku'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query hapus data buku */
function deleteBook($id_buku){
    $conn = conn();
    $sql = "DELETE FROM tb_buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/** fungsi untuk query insert data pelanggan */
function insertCustomers($nama_pelanggan, $alamat){
    $conn = conn();
    $sql = "INSERT INTO tb_pelanggan (nama_pelanggan, alamat) VALUES ('$nama_pelanggan', '$alamat')";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/** fungsi untuk menampilkan data pelanggan berdasarkan id_pelanggan tertentu */
function getCustomerbyID($id_pelanggan){
    $conn = conn();
    $sql = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query edit data pelanggan */
function updateCustomer($id_pelanggan, $nama_pelanggan, $alamat){
    $conn = conn();
    $sql = "UPDATE tb_pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat' WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/**fungsi untuk query hapus data pelanggan */
function deleteCustomer($id_pelanggan) {
    $conn = conn();
    $sql = "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/**  fungsi untuk mendapatkan nilai id_buku, nama_buku dan harga dari tabel buku untuk digunakan sebagai option di form*/
function fetchBooks(){
    $conn = conn();
    $sql = "SELECT id_buku, nama_buku, harga FROM tb_buku";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/**  fungsi untuk mendapatkan nilai id_pelanggan, nama_pelanggan dan alamat dari tabel pelanggan untuk digunakan sebagai option di form*/
function fetchCustomers(){
    $conn = conn();
    $sql = "SELECT id_pelanggan, nama_pelanggan FROM tb_pelanggan";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/** fungsi untuk menampilkan data transaksi berdasarkan id_transaksi tertentu */
function getTransactionbyID($id_transaksi){
    $conn = conn();
    $sql = "SELECT tb_transaksi.id_transaksi, tb_pelanggan.id_pelanggan, tb_buku.id_buku, tb_pelanggan.nama_pelanggan, tb_buku.nama_buku, tb_transaksi.jumlah, tb_transaksi.harga_saat_ini, tb_transaksi.total_pembayaran FROM tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan INNER JOIN tb_buku ON tb_buku.id_buku = tb_transaksi.id_buku WHERE tb_transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk mendapat harga buku */
function getHargaBuku($id_buku){
    $conn = conn();
    $sql = "SELECT harga FROM tb_buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query insert data transaksi */
function insertTransaction($id_pelanggan, $id_buku, $jumlah, $harga_saat_ini, $total_pembayaran){
    $conn = conn();
    $sql = "INSERT INTO tb_transaksi VALUE ('','$id_pelanggan','$id_buku','$jumlah','$harga_saat_ini', '$total_pembayaran')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query edit data transaksi */
function updateTransaction($id_transaksi, $id_pelanggan, $id_buku, $jumlah, $harga_saat_ini, $total_pembayaran){
    $conn = conn();
    $sql = "UPDATE tb_transaksi SET id_pelanggan = '$id_pelanggan', id_buku = '$id_buku', jumlah = '$jumlah', harga_saat_ini = '$harga_saat_ini', total_pembayaran = '$total_pembayaran' WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query hapus data transaksi */
function deleteTransaction($id_transaksi){
    $conn = conn();
    $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}


?>