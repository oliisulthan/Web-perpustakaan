<?php 
session_start();
require 'function.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
}
//pagination 

$jumlahDataPerHalaman = 2;
$totalData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($totalData/ $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$NewBooks = query("SELECT * FROM buku LIMIT $awalData, $jumlahDataPerHalaman ");

if(isset($_POST["submit"])){
    $NewBooks = cari($_POST["Jb"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang Di Toko Buku A Simple Book!!!</h1>
    <form action="" method="post">
        <label for="Jb">Cari Buku!</label><br>
        <input type="text" id="Jb" name="Jb" placeholder="Masukan Judul Buku Atau Pengarang" autocomplete="off" >
        <button type="submit"  id="tombol-cari" name="submit">CARI BUKU!!</button>
    </form>
    <br>
    <?php if($halamanAktif > 1):?>
        <a href="?halaman=<?=$halamanAktif-1;?>">&laquo;</a>
    <?php endif;?>
    <?php for($i=1; $i<= $jumlahHalaman;$i++): ?>
        <?php if($i == $halamanAktif):?>
            <a href="?halaman=<?= $i;?>" style=" font-weight:blod; color:red;"><?=$i;?></a>
            <?php else:?>
                <a href="?halaman=<?= $i;?>"><?=$i;?></a>
        <?php endif;?>
        <?php endfor;?>
    <?php if($halamanAktif < $jumlahHalaman):?>
        <a href="?halaman=<?=$halamanAktif + 1;?>">&raquo;</a>
    <?php endif;?>
    <h4>NEW Books Arrive</h4>

    <div id ="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Id</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Gambar</th>
             <th>Keterangan</th>
        </tr>
        <?php $a =1;?>
        <?php foreach($NewBooks as $nb):?>
        <tr>
            <td><?= $a?></td>
            <td><?= $nb["id"]?></td>
            <td><?= $nb["judul"]?></td>
            <td><?= $nb["pengarang"]?></td>
            <td><img src="img/<?= $nb["gambar"]?>"alt=""width="150"></td>
            <td><a href="#" style="color:aqua">Details</a></td>
            <?php $a ++?>
        </tr>
        <?php endforeach;?>
    </table>
    </div>

    <a href="logout.php">Logout</a>
<Script src = "js/script.js"> 

</Script>
</body>
</html>