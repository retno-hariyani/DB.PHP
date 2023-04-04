<?php
 require "koneksi.php";

 $id_transaksi = $_GET['id_transaksi'] ?? 0 ;

 if($id_transaksi > 0) {
    $row = getTransactionbyID($id_transaksi);
    $id_transaksi = $row['id_transaksi'];
    $id_pelanggan = $row['id_pelanggan'];
    $id_buku = $row['id_buku'];
    $nama_pelanggan = $roe['nama_pelanggan'];
    $nama_buku = $row['nama_buku'];
    $jumlah = $row['jumlah'];
    $harga_saat_ini = $row['harga_saat_ini'];
    $total_pembayaran = $row['total_prmbayaran'];
    $form_action = "action.php?action=update_transaction";
    $title = "Edit Data Transaksi";
 } else {
    $id_transaksi = '';
    $id_pelanggan = '';
    $id_buku = '';
    $nama_pelanggan = '';
    $nama_buku = '';
    $jumlah = '';
    $harga_saat_ini = '';
    $total_pembayaran = '';
    $form_action = "action.php?action=insert_transaction";
    $title = "Tambah Data Transaksi";
 }

?>

<!DOCTYPE html> 
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <nav>
        <ul>
            <li><a href="welcome.php">Beranda</a></li>
            <li><a href="data_buku.php">Data Buku</a></li>
            <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
            <li><a href="data_transaksi.php">Data Transaksi</a></li>
        </ul>
    </nav>
    <div class="container">
    <h2 style="margin-bottom:20px"><?=$title; ?></h2>
    <form action="<?=$form_action?>" method="post">
        <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
        <!-- pilih nama pelanggan -->
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <select name="id_pelanggan" id="nama_pelanggan">
            <option disabled selected>Pilih nama pelanggan...</option>
            <?php foreach (fetchCustomers() as $options) {
                //tanda (?) untuk if, tanda (:) untuk else
                $selected = $options['id_pelanggan']==$id_pelanggan ? 'selected': '';
            ?>
            <option value = "<?=$options['id_pelanggan']?>" <?=$selected?>>
                <?=$options['nama_pelanggan']?>
            </option>
            <?php } ?>
        </select>
        <!-- pilih nama buku -->
        <label for="nama_buku">Nama Buku</label>
        <select name="id_buku" id="nama_buku">
            <option disabled selected>Pilih nama buku...</option>
            <?php foreach (fetchBooks() as $options) { 
                $selected = $options['id_buku']==$id_buku ? 'selected' : '';
            ?>
            <option value="<?=$options['id_buku']?>" <?=$selected?>>
                <?=$options['nama_buku']?>
            </option>
            <?php } ?>
        </select>
        <!-- input kuantitas -->
        <label for="kuantitas">Jumlah</label>
        <input type="number" id="kuantitas" name="kuantitas" value="<?=$kuantitas?>">
        <input type="submit" value="Simpan">
    </form>
</body>
</html