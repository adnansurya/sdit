<?php

include('../api/db_access.php');
if(isset($_POST['id_perusahaan']) && isset($_POST['id_kategori']) && isset($_POST['nama_barang']) && isset($_POST['qty']) && isset($_POST['id_transaksi'])){

    $filter_date = explode("-",$_POST['tgl_po']);
    $filter_year = $filter_date[0];
    $filter_month = $filter_date[1];
    $filter_day = $filter_date[2];


    $last = mysqli_query($conn,"SELECT file_dur, file_po FROM transaksi WHERE id_transaksi=".$_POST['id_transaksi']);
    $filenames = mysqli_fetch_assoc($last);  
    $filename_dur = '';
    $filename_po = '';

    if(!empty($_FILES["file_dur"]['name'])){
        $file_tmp_dur =$_FILES['file_dur']['tmp_name'];
        $file_name = $_FILES['file_dur']['name'];
        $ext_arr = explode('.',$file_name);
        $file_ext=strtolower(end($ext_arr));

        $temp = explode(".", $file_name);
        if(isset($_POST['no_dur'])){
           
            if($filenames['file_dur'] != ''){
                $filename_dur= $filenames['file_dur'];
            }else{
                $filename_dur= 'DUR-'.$_POST['no_dur']. '.' . end($temp);
            }
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
            if($filenames['file_po'] != ''){
                $filename_po= $filenames['file_po'];
            }else{
                $filename_po= 'PO-'.$_POST['no_po']. '.' . end($temp);
            }
            if(!move_uploaded_file($file_tmp_po,"../files/".$filename_po)){
                $errors[] = 'Gagal upload file PO';
            }
        }else{
            $errors[] = 'Nomor PO tidak boleh kosong';
        }

    }


    $sql = "UPDATE transaksi SET id_perusahaan='".$_POST['id_perusahaan']."', id_kategori='".$_POST['id_kategori']."',  
    nama_barang='".$_POST['nama_barang']."', no_pr='".$_POST['no_pr']."', 
    tanggal_pr='".$_POST['tgl_pr']."', no_po='".$_POST['no_po']."', tanggal_po='".$_POST['tgl_po']."', 
    owner_estimate_rp='".$_POST['harga_oe_rp']."', owner_estimate_usd='".$_POST['harga_oe_usd']."', 
    tanggal_owner_estimate='".$_POST['tgl_oe']."', no_dur = '".$_POST['no_dur']."', tanggal_dur = '".$_POST['tgl_dur']."', 
    metode_dur = '".$_POST['metode_dur']."',tanggal_tawar = '".$_POST['tgl_tawar']."',harga_tawar_usd = '".$_POST['harga_tawar_usd']."',
    harga_tawar_rp = '".$_POST['harga_tawar_rp']."',
    harga_po_rp='".$_POST['harga_po_rp']."',
    harga_po_usd='".$_POST['harga_po_usd']."', total_harga_rp='".$_POST['total_harga_rp']."', 
    total_harga_usd='".$_POST['total_harga_usd']."',tanggal_approve_po = '".$_POST['tgl_appr_po']."', qty='".$_POST['qty']."', satuan='".$_POST['satuan']."', 
    status='".$_POST['status']."', keterangan='".$_POST['keterangan']."', 
    filter_day='".$filter_day."', filter_month='".$filter_month."', filter_year='".$filter_year."' ";

    if(!empty($_FILES["file_dur"]['name'])){
        $sql = $sql."file_dur='".$filename_dur."' ";
    }

    if(!empty($_FILES["file_po"]['name'])){
        $sql = $sql."file_po='".$filename_po."' ";
    }
    
    $sql = $sql."WHERE id_transaksi=".$_POST['id_transaksi'];
   
    $result = mysqli_query($conn, $sql);
  
    if(!($result)){
        echo 'Error query perusahaan';
        echo $sql;
    }else{
        header('Location: ../transaction_detail.php?id='.$_POST['id_transaksi']); 
    }

    // echo $filename_dur;
    // echo $filename_po;
    // echo $sql;
    
}else{
    echo 'Data tidak lengkap';
}



?>