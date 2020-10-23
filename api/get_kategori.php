<?php
include('../api/db_access.php');
if(isset($_GET['id'])){
    $resObj = new \stdClass();
    $resObj -> result = "";

           
        
    $registered = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori=".$_GET['id']);

    if (!$registered){
        
        $resObj -> result = "error";
        $resObj -> data = "Error description: " . mysqli_error($conn);
                           
    } else{
        if(mysqli_num_rows($registered) > 0){
            $r = mysqli_fetch_assoc($registered); 
    
            // $data -> nama = $r['nama'];
            // $data -> waktu = $waktu;
            
            $resObj -> result = "success";
            $resObj -> data = $r;
        }else{
            $resObj -> result = "unknown";
            $resObj -> data = $_GET['id'];
        }
    }
    
    
    

    echo json_encode($resObj);
    
}else{
    echo 'Data tidak lengkap';
}


?>