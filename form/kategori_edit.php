<?php
include('../api/db_access.php');
if(isset($_POST['nama']) && isset($_POST['id'])){
    $sql = "UPDATE kategori SET nama_kategori = '".$_POST['nama']."', deskripsi = '".$_POST['deskripsi']."' WHERE id_kategori=" .$_POST['id'] ;
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query kategori';
        echo $sql;
    }else{
        header('Location: ../kategori.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>