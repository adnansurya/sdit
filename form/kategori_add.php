<?php
include('../api/db_access.php');
if(isset($_POST['nama'])){
    $sql = "INSERT INTO kategori(nama_kategori, deskripsi) VALUES ('".$_POST['nama']."', '".$_POST['deskripsi']."')";
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query kategori';
    }else{
        header('Location: ../kategori.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>