<?php
session_start();
require 'function.php';
//cek cookie
if(isset($_COOKIE['yup']) && isset($_COOKIE['yek'])){
    $id = $_COOKIE['yup'];
    $key = $_COOKIE['yek'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM adm WHERE id=$id ");
    $rows = mysqli_fetch_assoc($result);


    //cek cookie dan user name
    if($key === hash('sha256' , $row['username'])){
        $_SESSION['login'] = true;
    }
}
if(isset($_SESSION["login"])){
    header("Location:admin.php");
    exit;
}



if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM adm WHERE nama = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //cek session
            $_SESSION["login"] = true;
            //buat cookie login
            if(isset($_POST["remember"])){

                setcookie('yup',$row["id"],time() + 60 );
                setcookie('yek',hash('sha256',$row["username"]),time() + 60);
            }
            header("Location: admin.php");
            exit;
        }
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login, Selamat datang</h1>
    <?php if(isset($error)):?>
    <p style="color: red; font-style:italic">Username/Password Salah</p>
    <?php endif;?>
    <form action="" method="post">
    <label for="user">Masukan User Name:</label><br>
    <input type="text" name="username" id="user" placeholder="Masukan Username"><br><br>
    <label for="password">Masukan Password</label><br>
    <input type="password" name="password" id="password" placeholder="Masukan Password"><br><br>
    <input type="checkbox" name = "remember" id="remember"><label for="remember">remember me</label><br>
    <button type ="submit" name="login">LogIn!</button>

    


    </form>
    
</body>
</html>