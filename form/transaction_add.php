<?php

include('../api/db_access.php');
if(isset($_POST['id_perusahaan']) && isset($_POST['nama_barang']) && isset($_POST['qty'])){
    
    $filter_date = explode("-",$_POST['tgl_po']);
    $filter_year = $filter_date[0];
    $filter_month = $filter_date[1];
    $filter_day = $filter_date[2];

    $filename_dur = '';
    $filename_po = '';

    if(!empty($_FILES["file_dur"]['name'])){
        $file_tmp_dur =$_FILES['file_dur']['tmp_name'];
        $file_name = $_FILES['file_dur']['name'];
        $ext_arr = explode('.',$file_name);
        $file_ext=strtolower(end($ext_arr));

        $temp = explode(".", $file_name);
        if(isset($_POST['no_dur'])){
            $filename_dur= 'DUR-'.$_POST['no_dur']. '.' . end($temp);
            if(!move_uploaded_file($file_tmp_dur,"../files/".$filename_dur)){
                $errors[] = 'Gagal upload file DUR';
            }
        }else{
            $errors[] = 'Nomor DUR tidak boleh kosong';
        }
       
       

    }

    if(!empty($_FILES["file_po"]['name'])){
        $file_tmp_po =$_FILES['file_po']['tmp_name'];
        $file_name = $_FILES['file_po']['name'];
        $ext_arr = explode('.',$file_name);
        $file_ext=strtolower(end($ext_arr));

        $temp = explode(".", $file_name);
        if(isset($_POST['no_po'])){
            $filename_po= 'PO-'.$_POST['no_po']. '.' . end($temp);
            if(!move_uploaded_file($file_tmp_po,"../files/".$filename_po)){
                $errors[] = 'Gagal upload file PO';
            }
        }else{
            $errors[] = 'Nomor PO tidak boleh kosong';
        }

    }


    $sql = "INSERT INTO transaksi (id_perusahaan, nama_barang, no_pr, 
    tanggal_pr, no_po, tanggal_po, 
    owner_estimate_rp, owner_estimate_usd, tanggal_owner_estimate, 
    no_dur, tanggal_dur, metode_dur, file_dur,
    harga_tawar_usd, harga_tawar_rp,
    harga_po_rp, harga_po_usd, file_po, total_harga_rp, 
    total_harga_usd, tanggal_approve_po, qty, satuan, 
    status, keterangan, filter_day, filter_month, filter_year) 
    VALUES ('".$_POST['id_perusahaan']."', '".$_POST['nama_barang']."', '".$_POST['no_pr']."',
     '".$_POST['tgl_pr']."' , '".$_POST['no_po']."', '".$_POST['tgl_po']."', 
     '".$_POST['harga_oe_rp']."' , '".$_POST['harga_oe_usd']."', '".$_POST['tgl_oe']."', 
     '".$_POST['no_dur']."' ,'".$_POST['tgl_dur']."' ,'".$_POST['metode_dur']."' ,'".$filename_dur."' ,
     '".$_POST['harga_tawar_usd']."' , '".$_POST['harga_tawar_rp']."',
     '".$_POST['harga_po_rp']."', '".$_POST['harga_po_usd']."','".$filename_po."' , '".$_POST['total_harga_rp']."', 
     '".$_POST['total_harga_usd']."','".$_POST['tgl_appr_po']."' , '".$_POST['qty']."', '".$_POST['satuan']."', 
     '".$_POST['status']."', '".$_POST['keterangan']."', '".$filter_day."', '".$filter_month."', '".$filter_year."')";

    if(empty($errors)==true){
        $result = mysqli_query($conn, $sql);
        if(!($result)){
            echo 'Error query perusahaan';
            echo $sql;
        }else{
            header('Location: ../transaction_new.php'); 
        }
    }else{
        print_r($errors[0]);
    }

    
    
}else{
    echo 'Data tidak lengkap';
}



?>