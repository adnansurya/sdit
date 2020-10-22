<?php
include('../api/db_access.php');
if(isset($_GET['id'])){
    $sql = "DELETE from kategori WHERE id_kategori=". $_GET['id'];
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