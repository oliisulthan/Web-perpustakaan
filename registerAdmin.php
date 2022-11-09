<?php

require 'function.php';


if(isset($_POST["submit"])){
    if(Admin($_POST) > 0){
        echo"<script>
        alert('user berhasil di tambahkan');
        </script>";
    }else{
        mysqli_error($conn);

    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="post">
    <ul>
        <li>
        <label for="nama">Nama</label>
        <input type="text" id ="nama" name="nama"placeholder="Masukan Nama Anda">
        </li>

        <li>
            <label for="E-mail">E-mail</label>
            <input type="text" id="email" name="email" placeholder="Masukan E-Mail Anda">
        </li>
        
        <li>
        <label for="password">Password</label>
        <input type="password" id="password" name ="password" placeholder="Masukan password">
        </li>
        
        <li>
        <label for="cPassword">Konfirmasi Password</label>
        <input type="password" id="cPassword" name="cPassword" placeholder="Konfirmasi Password">
        </li>

        <li><button type="submit" name="submit">Registrasi!</button></li>

    </ul>


    </form>
    
</body>
</html>