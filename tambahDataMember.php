<?php
require "function.php";

if(isset($_POST["submit"])){
        if(tambahMember($_POST) > 0 ){
            echo "
            <script>
            alert('data berhasil Di tambahkan');
            document.location.href = 'Mahasiswa.php';
            </script>";
        }else{
            echo "
             <script>alert('data gagal Di tambahkan');
            document.location.href = 'Mahasiswa.php';
            </script>";
        }
    }





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Member</title>
</head>
<body>
    <h1>Tambah Data Member</h1>
<form action=""method="post">
    
<ul>
        <li><label for="nama">Nama</label></li>
        <li><input type="text" name="nama" id="nama" placeholder="Masukan Nama"></li>

        <li><label for="jurusan">Jurusan</label></li>
        <li><input type="text" name="jurusan" id="jurusan" placeholder="Masukan Jurusan"></li>

        <li><label for="angkatan">Angkatan</label></li>
        <li><input type="text" name="angkatan" id="angkatan" placeholder="Masukan angkatan"></li>

        <button type="submit" name="submit">Submit</button>

    </ul>
</form>
    
</body>
</html>