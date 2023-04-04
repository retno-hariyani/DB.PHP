<!-- menampilkan datadari data form sebelumnya -->
<?php
include "koneksi.php";

$id_pelanggan = $_GET['id_pelanggan'];
$sql = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) :

?>


<!DOCTYPE html>
<head>
    <title>Edit pelanggan</title>
</head>
<body>
    <div class="container">
        <form action="update_pelanggan.php" method="post">
              <h1>Edit Data pelanggan</h1>
           <tr>
            <td><input type="hidden" name="id_pelanggan" value="<?=$row['id_pelanggan'] ?>"></td>
           </tr>
           <tr>
            <td><label for="nama_pelanggan">Nama pelanggan</label></td>
            <td><input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?=$row['nama_pelanggan'] ?>"></td>
           </tr>
            <br><br>
           <tr>
            <td><label for="alamat">alamat : </label></td>
            <td><input type="text" id="alamat" name="alamat" value="<?=$row['alamat'] ?>"></td>
           </tr>
            <td><input type="submit" name="submit" value="simpan" class="submit"></td>
           </tr>
        </form>
    </div>
</body>
</html>

<?php endwhile ?>