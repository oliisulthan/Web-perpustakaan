<?php
require 'function.php';


$query = query("SELECT * FROM member");

if(isset($_POST["submit"])){
    $query = find($_POST["cari"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Daftar Member</h1>
    <h3>Cari Member Di Sini:</h3>
    <form action="" method="post">
        <label for="cr">Masukan Nama atau Jurusan:</label><br>
        <input type="text" name="cari" id="cr" autocomplete="off" placeholder="Nama Atau Jurusan ">
        <button type="submit" name="submit">Cari!</button>
    </form>
    <a href="admin.php">Kembali</a><br>
    <a href="tambahDataMember.php">+Tambah Member</a>
    <table border="1" cellpadding ="10" cellspacing = "0">
    <tr>
        <th>No.</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Angkatan</th>
        <th>Aksi</th>
    </tr>
    <?php $i=1; ?>
    <?php foreach($query as $mhs):?> 
    <tr>

        <td><?=$i ;?></td>
        <td><?=$mhs["nim"] ;?></td>
        <th><?=$mhs["nama"] ;?></th>
        <td><?=$mhs["jurusan"] ;?></td>
        <td><?=$mhs["angkatan"];?></td>
        <td><a href="editDataMember.php?nim=<?=$mhs["nim"];?> "style="color: green;">Edit</a> || <a href="hapusDataMember.php?nim=<?=$mhs["nim"];?>"onclick="return confirm('DATA INI AKAN DI HAPUS!!!')" style="color:red;">Delete</a></td>
    </tr>
    <?php $i++;?>
    <?php endforeach;?>
    </table>
    
</body>
</html>