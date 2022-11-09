<?php

//menghubungkan halaman index dengan function.php
require'function.php';

//membuat function query
$DataBuku = query("SELECT * FROM buku");

$DataBuku = query("SELECT * FROM buku");

if(isset($_POST["submit"])){
    $DataBuku = cari($_POST["Jb"]);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
</head>
<body>
    <h1>Daftra Buku</h1>
    <form action="" method="post">
        <label for="Jb">Cari Buku!</label><br>
        <input type="text" id="Jb" name="Jb" placeholder="Masukan Judul Buku Atau Pengarang" autocomplete="off" >
        <button type="submit" name="submit">CARI BUKU!!</button>
    </form>

    <a href="admin.php">Kembali</a><br>
    <a href="tambahBuku.php">+Tambah Data Buku</a>
    <table border="1" cellpadding="10" cellspacing="0">
    
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Gambar</th>
            <td>Aksi</td>
        </tr>
        <?php $i = 1;?>
        <?php foreach($DataBuku as $bk):?>
        <tr>
            <td><?= $i ?></td>
            <td><?=$bk["judul"];?></td>
            <td><?=$bk["pengarang"];?></td>
            <td><img src="img/<?=$bk["gambar"];?>" alt="" width="150"></td>
            <td><a href="editDataBuku.php?id=<?= $bk["id"];?>" style="color:green;">Edit</a> || <a href="hapusDataBuku.php?id=<?=$bk["id"];?>" onclick="return confirm('DATA INI AKAN DI HAPUS!!!')" style="color: red;">Delete</a></td>
        </tr>
        <?php $i ++;?>
        <?php endforeach;?>
        
    </table>
    
</body>
</html>