<?php
require "function.php";

$nim = $_GET["nim"];

if(delete($nim) > 0 ){

    echo "
    <script>
    alert('data berhasil Di hapus');
    document.location.href = 'Mahasiswa.php';
    </script>";
}else{
    echo "
     <script>alert('data gagal Di hapus');
    document.location.href = 'Mahasiswa.php';
    </script>";
}




?>