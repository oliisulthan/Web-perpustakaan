<?php
require"function.php";

if(isset($_POST["submit"])){
    
    if(tambah($_POST) > 0 ){
        echo "
        <script>
        alert('data berhasil Di tambahkan');
        document.location.href = 'dataBuku.php';
        </script>";
    }else{
        echo "
         <script>alert('data gagal Di tambahkan');
        document.location.href = 'dataBuku.php';
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
    <title>Tambah Data Buku</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data" >
    <ul>
        <li><label for="judul">Judul</label></li>
        <li><input type="text" name="judul" id="judul" placeholder="Masukan Judul Buku"></li>

        <li><label for="pengarang">Pengarang</label></li>
        <li><input type="text" name="pengarang" id="pengarang" placeholder="Masukan Nama Pengarang"></li>

        <li><label for="gambar">Gambar</label></li>
        <li><input type="file" name="gambar" id="gambar"></li>

        <button type="submit" name="submit">Submit</button>

    </ul>



    </form>
    
</body>
</html>