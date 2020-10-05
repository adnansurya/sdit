<?php

include('../api/db_access.php');
if(isset($_POST['id_perusahaan']) && isset($_POST['nama_barang']) && isset($_POST['qty']) && isset($_POST['id_transaksi'])){
    $sql = "UPDATE transaksi SET id_perusahaan='".$_POST['id_perusahaan']."',    
    nama_barang='".$_POST['nama_barang']."', no_pr='".$_POST['no_pr']."', 
    tanggal_pr='".$_POST['tgl_pr']."', no_po='".$_POST['no_po']."', tanggal_po='".$_POST['tgl_po']."', 
    owner_estimate_rp='".$_POST['harga_oe_rp']."', owner_estimate_usd='".$_POST['harga_oe_usd']."', 
    tanggal_owner_estimate='".$_POST['tgl_oe']."', harga_po_rp='".$_POST['harga_po_rp']."',
    harga_po_usd='".$_POST['harga_po_usd']."', total_harga_rp='".$_POST['total_harga_rp']."', 
    total_harga_usd='".$_POST['total_harga_usd']."', qty='".$_POST['qty']."', satuan='".$_POST['satuan']."', 
    status='".$_POST['status']."', keterangan='".$_POST['keterangan']."' WHERE id_transaksi=".$_POST['id_transaksi'];
   
    $result = mysqli_query($conn, $sql);
    echo $sql;
    if(!($result)){
        echo 'Error query perusahaan';
        echo $sql;
    }else{
        header('Location: ../transaction_detail.php?id='.$_POST['id_transaksi']); 
    }
    
}else{
    echo 'Data tidak lengkap';
}



?>