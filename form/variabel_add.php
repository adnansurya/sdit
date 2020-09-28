<?php
include('../api/db_access.php');
if(isset($_POST['usd_to_rp']) && isset($_POST['hba']) && isset($_POST['tanggal'])){
    $sql = "INSERT INTO variabel(usd_to_rp, hba, tanggal) VALUES (".$_POST['usd_to_rp'].", ".$_POST['hba'].", '".$_POST['tanggal']."')";
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query variabel';
    }else{
        header('Location: ../variabel.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>