<?php 
//koneksi ke data base
$conn = mysqli_connect("localhost","root","","perpustakaan");


//function query 

//query Data buku
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;

    }

    return $rows;
}


//query data member

function DataMhs($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows = $row;
    }
    return $rows;
}

//tambah data buku

function tambah($data){
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $pengarang =  htmlspecialchars($data["pengarang"]);

    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }


    

    $query = "INSERT INTO buku VALUES
        ('','$judul','$pengarang','$gambar')
        ";
//cek adakah perubahan
    mysqli_query($conn,$query);
//kembalikan nilai function ini dan kirim ke halaman tambah data
return mysqli_affected_rows($conn);
}

function upload(){
    $file = $_FILES['gambar']['name'];
    $ukuranFiles = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


//cek adakah gambar yang di upload?

    if($error === 4){
    echo"<script>
        alert('Pilih Gambar Terlebih Dahulu');
    </script>";       
        return false;
    }

    //cek ekstensi file 
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $file);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo"<script>
        alert('yang anda upload bukan gambar');
    </script>";
    }
    //cek ukuran gambar
    if($ukuranFiles > 1000000){
        echo"<script>
        alert('Ukuran Gambar anda Terlalu Besar usahakan Kurang Dari 1Mb');
    </script>";
    }

//lolos pengecekan, file siap di upload
//merubah dnama gambar
$namaRandom = uniqid();
$namaRandom .= '.';
$namaRandom .= $ekstensiGambar;

move_uploaded_file($tmpName, 'img/'.$namaRandom);
    
return $namaRandom;








}


//tambah data member
function tambahMember($data){
    global $conn;

    $nama =  htmlspecialchars($data["nama"]);
    $jurusan =  htmlspecialchars($data["jurusan"]);
    $angkatan =  htmlspecialchars($data["angkatan"]);

    $query ="INSERT INTO member VALUES ('','$nama','$jurusan','$angkatan')";

    mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}



//hapus data buku
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM buku WHERE id = $id");

return mysqli_affected_rows($conn);
}


//hapus data member
function delete($nim){
    global $conn;

    mysqli_query($conn,"DELETE FROM member WHERE nim = $nim");

return mysqli_affected_rows($conn);
}

//ubah data buku
function ubah($data){
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $pengarang =  htmlspecialchars($data["pengarang"]);
    $gambarLama = $data["gambarLama"];
    $gambar =  htmlspecialchars($data["gambar"]);
//cek apakah user upload gambar baru atau tidak 
if($_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
}else{
    $gambar = upload();
}


    $query = "UPDATE buku SET
            judul = '$judul',
            pengarang = '$pengarang',
            gambar = '$gambar' WHERE id=$id
        ";
//cek adakah perubahan
    mysqli_query($conn,$query);
//kembalikan nilai function ini dan kirim ke halaman tambah data
return mysqli_affected_rows($conn);

}

//cari data buku 

function cari ($Jb){
    $query = "SELECT * FROM buku WHERE 
        judul  LIKE'%$Jb%' OR
        pengarang LIKE '%$Jb%' 


    ";
    return query($query);
}
function editDataMember($member){
    global $conn;
     $nim = $member["nim"];
     $nama = $member["nama"];
     $jurusan = $member["jurusan"];
     $angkatan = $member["angkatan"];

     $query = "UPDATE member SET
            nama = '$nama',
            jurusan = '$jurusan',
            angkatan = '$angkatan'WHERE nim=$nim
                 ";
     mysqli_query($conn,$query);

return mysqli_affected_rows($conn);

}
//cari data member 
function find($cari){
    $query = "SELECT * FROM member WHERE 
        nama  LIKE'%$cari%' OR
        jurusan LIKE '%$cari%' 


    ";
    return query($query);
}

//function register
function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["nama"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["cPassword"]);


//cek username
    $result = mysqli_query($conn,"SELECT nama FROM user WHERE nama = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

//cek konfirmasi password 
    if($password !== $password2){
        echo"<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
    }
//enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO user VALUES ('','$username', '$password')");

return  mysqli_affected_rows($conn);
}





//function register admin

function adm($data){
    global $conn;
    $username = strtolower(stripslashes($data["nama"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["cPassword"]);


//cek username
    $result = mysqli_query($conn,"SELECT nama FROM adm WHERE nama = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

//cek konfirmasi password 
    if($password !== $password2){
        echo"<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
    return false;
    }
//enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO adm VALUES ('','$username', '$password')");

return  mysqli_affected_rows($conn);
}

?>