<?php

include('../api/db_access.php');
if(isset($_POST['id_perusahaan']) && isset($_POST['nama_barang']) && isset($_POST['qty'])){
    $sql = "INSERT INTO transaksi (id_perusahaan, nama_barang, no_pr, 
    tanggal_pr, no_po, tanggal_po, 
    owner_estimate_rp, owner_estimate_usd, tanggal_owner_estimate, 
    harga_po_rp, harga_po_usd, total_harga_rp, 
    total_harga_usd, qty, satuan, 
    status, keterangan) 
    VALUES ('".$_POST['id_perusahaan']."', '".$_POST['nama_barang']."', '".$_POST['no_pr']."',
     '".$_POST['tgl_pr']."' , '".$_POST['no_po']."', '".$_POST['tgl_po']."', 
     '".$_POST['harga_oe_rp']."' , '".$_POST['harga_oe_usd']."', '".$_POST['tgl_oe']."', 
     '".$_POST['harga_po_rp']."', '".$_POST['harga_po_usd']."', '".$_POST['total_harga_rp']."', 
     '".$_POST['total_harga_usd']."', '".$_POST['qty']."', '".$_POST['satuan']."', 
     '".$_POST['status']."', '".$_POST['keterangan']."')";
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