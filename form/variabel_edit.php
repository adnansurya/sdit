<?php
include('../api/db_access.php');
if(isset($_POST['usd_to_rp']) && isset($_POST['hba']) && isset($_POST['tanggal']) && isset($_POST['id'])){
    $sql = "UPDATE variabel SET usd_to_rp = ".$_POST['usd_to_rp'].", hba = ".$_POST['hba']." , tanggal = '".$_POST['tanggal']."' WHERE id_var=" .$_POST['id'] ;
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query variabel';
        echo $sql;
    }else{
        header('Location: ../variabel.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>