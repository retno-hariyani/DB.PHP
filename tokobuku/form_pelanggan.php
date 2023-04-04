<!DOCTYPE html>
    <title></title>
</head>

<body>
    <h1><b>data pelanggan</b></h1>
    <form action="tambah_pelanggan.php" method="POST">
        <input type="hidden" name="id_pelanggan">
        <label for="nama_pelanggan"> nama pelanggan </label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan">
        <br>
        <label for="alamat"> alamat </label>
        <input type="text" id="alamat" name="alamat">
        <br>
        <input type="submit" value="simpan">
    </form>
</body>
</html>