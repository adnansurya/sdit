<?php
include('../api/db_access.php');
if(isset($_GET['id'])){
    $sql = "DELETE from transaksi WHERE id_transaksi=". $_GET['id'];
    $result = mysqli_query($conn, $sql);
    if(!($result)){
        echo 'Error query transaksi';
    }else{
        header('Location: ../transaction_list.php'); 
    }
    
}else{
    echo 'Data tidak lengkap';
}


?>