<?php
require '../function.php';

$cari = $_GET['Jb'];
$query = "SELECT * FROM buku WHERE 
         judul  LIKE'%$cari%' OR
         pengarang LIKE '%$cari%' 

";
$NewBooks = query($query);

?>
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