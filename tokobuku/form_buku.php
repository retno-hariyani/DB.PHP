<!DOCTYPE html>
    <title></title>
</head>

<body>
    <h1><b>data buku</b></h1>
    <form action="tambah_buku.php" method="POST">
        <input type="hidden" name="id_buku">
        <label for="nama_buku"> nama buku </label>
        <input type="text" id="nama_buku" name="nama_buku">
        <br>
        <label for="penulis"> penulis </label>
        <input type="text" id="penulis" name="penulis">
        <br>
        <label for="penerbit"> penerbit </label>
        <input type="text" id="penerbit" name="penerbit">
        <br>
        <label for="harga"> harga </label>
        <input type="text" id="harga" name="harga">
        <br>
        <input type="submit" value="simpan">
    </form>
</body>
</html>