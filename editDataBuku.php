<?php
require"function.php";


$id = $_GET["id"];

$idData = query("SELECT * FROM buku WHERE id = $id")[0];

if(isset($_POST["submit"])){
    
    if(ubah($_POST) > 0 ){
        echo "
        <script>
        alert('data berhasil Di Ubah');
        document.location.href = 'dataBuku.php';
        </script>";
    }else{
        echo "
         <script>alert('data gagal Di Ubah');
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
    <title>Edit Data Buku</title>
</head>
<body>
    <h1>Edit Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="id" value="<?=$idData["id"];?>">
        <input type="hidden" name="gambarLama" value="<?=$idData["gambar"];?>">
        <li><label for="judul">Judul</label></li>
        <li><input type="text" name="judul" id="judul" placeholder="Masukan Judul Buku" value="<?=$idData["judul"];?>"></li>

        <li><label for="pengarang">Pengarang</label></li>
        <li><input type="text" name="pengarang" id="pengarang" placeholder="Masukan Nama Pengarang" value="<?=$idData["pengarang"];?>"></li>

        <li><label for="gambar">Gambar</label></li>
        <img src="img/<?=$idData["gambar"];?>" width="220">
        <li><input type="file" name="gambar" id="gambar" ></li>

        <button type="submit" name="submit">Submit</button>

    </ul>



    </form>
    
</body>
</html>