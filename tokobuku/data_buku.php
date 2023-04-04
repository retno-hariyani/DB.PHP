<?php
require "koneksi.php";

$sql = "SELECT * FROM tb_buku";
$result = mysqli_query ($conn, $sql);

?>

<!DOCTYPE html>
<head>
    
</head>
<body>
    <table border="1">
        <tr>
            <th>id_buku</th>
            <th>nama_buku</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>harga</th>
            <th>aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id_buku']?></td>
            <td><?= $row['nama_buku'] ?></td>
            <td><?= $row['penulis'] ?></td>
            <td><?= $row['penerbit'] ?></td>
            <td><?= $row['harga'] ?></td>
        <td>
            <a href="delete_buku.php?id_buku=<?=$row['id_buku']?>">hapus</a>
            <a href="edit_buku.php?id_buku=<?=$row['id_buku']?>">edit</a>
        </td>
        </tr>
        <?php endwhile?>
</body>
</html>