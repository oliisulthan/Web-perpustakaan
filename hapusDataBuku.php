<?php 
require "function.php";

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
            <script>
            alert('data berhasil Di hapus');
            document.location.href = 'dataBuku.php';
            </script>";
        }else{
            echo "
             <script>alert('data gagal Di hapus');
            document.location.href = 'dataBuku.php';
            </script>";
        }



?>