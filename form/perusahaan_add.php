<?php

include('../api/db_access.php');
if(isset($_POST['kode_usaha']) && isset($_POST['kode_badan']) && isset($_POST['nama_usaha']) && isset($_POST['alamat']) 
&& isset($_POST['provinsi']) && isset($_POST['negara']) && isset($_POST['telp'])){
    $sql = "INSERT INTO perusahaan (kode_perusahaan, kode_badan, nama_perusahaan, alamat, provinsi, negara, no_telp) 
    VALUES ('".$_POST['kode_usaha']."', '".$_POST['kode_badan']."', '".$_POST['nama_usaha']."', '".$_POST['alamat']."'
    , '".$_POST['provinsi']."', '".$_POST['negara']."', '".$_POST['telp']."')";
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query perusahaan';
        echo $sql;
    }else{
        header('Location: ../transaction_new.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}



?>