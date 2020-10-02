<?php
include('../api/db_access.php');
if(isset($_GET['tanggal'])){
    $resObj = new \stdClass();
    $resObj -> result = "";

           
        
    $registered = mysqli_query($conn,"SELECT * FROM variabel WHERE tanggal='".$_GET['tanggal']."' LIMIT 1");

    if (!$registered){

        $last = mysqli_query($conn,"SELECT * FROM variabel ORDER BY tanggal DESC LIMIT 1");
        $r = mysqli_fetch_assoc($last);           
        
        $resObj -> result = "success";
        $resObj -> status = "default";
        $resObj -> data = $r;
               
                           
    } else{
        if(mysqli_num_rows($registered) > 0){
            $r = mysqli_fetch_assoc($registered); 

            $resObj -> result = "success";
            $resObj -> status = "confirmed";
            $resObj -> data = $r;
        }else{
            $last = mysqli_query($conn,"SELECT * FROM variabel ORDER BY tanggal DESC LIMIT 1");
            $r = mysqli_fetch_assoc($last);           
            
            $resObj -> result = "success";
            $resObj -> status = "default";
            $resObj -> data = $r;
        }
    }
    
    
    

    echo json_encode($resObj);
    
}else{
    echo 'Data tidak lengkap';
}


?>