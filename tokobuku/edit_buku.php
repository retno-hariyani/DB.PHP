<!-- menampilkan datadari data form sebelumnya -->
<?php
include "koneksi.php";

$id_buku = $_GET['id_buku'];
$sql = "SELECT * FROM tb_buku WHERE id_buku = $id_buku";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) :

?>


<!DOCTYPE html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <div class="container">
        <form action="update_buku.php" method="post">
              <h1>Edit Data Buku</h1>
           <tr>
            <td><input type="hidden" name="id_buku" value="<?=$row['id_buku'] ?>"></td>
           </tr>
           <tr>
            <td><label for="nama_buku">Nama Buku</label></td>
            <td><input type="text" id="nama_buku" name="nama_buku" value="<?=$row['nama_buku'] ?>"></td>
           </tr>
            <br><br>
           <tr>
            <td><label for="penulis">Penulis : </label></td>
            <td><input type="text" id="penulis" name="penulis" value="<?=$row['penulis'] ?>"></td>
           </tr>
           <br><br>
           <tr>
            <td><label for="penerbit">Penerbit : </label></td>
            <td><input type="text" id="penerbit" name="penerbit" value="<?=$row['penerbit'] ?>"></td>
           </tr>
           <br><br>
           <tr>
            <td><label for="harga">Harga : </label></td>
            <td><input type="number" id="harga" name="harga" value="<?=$row['harga'] ?>"></td>
           </tr>
           <br><br>
           <tr>
            <td><input type="submit" name="submit" value="simpan" class="submit"></td>
           </tr>
        </form>
    </div>
</body>
</html>

<?php endwhile ?>