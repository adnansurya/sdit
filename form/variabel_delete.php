<?php
include('../api/db_access.php');
if(isset($_GET['id'])){
    $sql = "DELETE from variabel WHERE id_var=". $_GET['id'];
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