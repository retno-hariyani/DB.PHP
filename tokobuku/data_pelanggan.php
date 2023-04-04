<?php
require "koneksi.php";

$sql = "SELECT * FROM tb_pelanggan";
$result = mysqli_query ($conn, $sql);

?>

<!DOCTYPE html>
<head>
    
</head>
<body>
    <table border="1">
        <tr>
            <th>id_pelanggan</th>
            <th>nama_pelanggan</th>
            <th>alamat</th>
            <th>aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id_pelanggan']?></td>
            <td><?= $row['nama_pelanggan'] ?></td>
            <td><?= $row['alamat'] ?></td>
        <td>
            <a href="edit_pelanggan.php?id_pelanggan=<?=$row['id_pelanggan']?>">edit</a>
            <a href="delete_pelanggan.php?id_pelanggan=<?=$row['id_pelanggan']?>">hapus</a>
        </td>
        </tr>
        <?php endwhile?>
</body>
</html>