<?php
include('../api/db_access.php');
if(isset($_GET['id'])){
    $sql = "DELETE from perusahaan WHERE id_perusahaan=". $_GET['id'];
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query perusahaan';
    }else{
        header('Location: ../perusahaan.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>