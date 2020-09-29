<?php

include('../api/db_access.php');
if(isset($_POST['kode_usaha']) && isset($_POST['kode_badan']) && isset($_POST['nama_usaha']) && isset($_POST['alamat']) 
&& isset($_POST['provinsi']) && isset($_POST['negara']) && isset($_POST['telp']) && isset($_POST['id'])){
    $sql = "UPDATE perusahaan SET kode_perusahaan='".$_POST['kode_usaha']."', kode_badan='".$_POST['kode_badan']."', 
    nama_perusahaan='".$_POST['nama_usaha']."', alamat='".$_POST['alamat']."', provinsi='".$_POST['provinsi']."', 
    negara='".$_POST['negara']."', no_telp='".$_POST['telp']."' WHERE id_perusahaan=".$_POST['id'];
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query perusahaan';
        echo $sql;
    }else{
        header('Location: ../perusahaan.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}



?>