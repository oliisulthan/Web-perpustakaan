//ambil elmen elemen di html

var Jb = document.getElementById('Jb');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//tambahkan event ketika keyword di tulis 
Jb.addEventListener('keyup', function(){
    // buat object ajax
    var xhr = new XMLHttpRequest();
    
    //mengecek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;

        }
    }
    //eksekusi ajax
    xhr.open('GET','ajax/buku.php?Jb='+Jb.value, true);
    xhr.send()
    

});
