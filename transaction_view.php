<?php
include('partials/global.php');
include('api/db_access.php');
if(!isset($_GET['id'])){
    header("location:transaction_list.php");   
}else{ 
    $query_sql = mysqli_query($conn, "SELECT transaksi.*, perusahaan.*, kategori.* 
    FROM transaksi, perusahaan, kategori 
    WHERE 
    transaksi.id_transaksi=".$_GET['id']." AND  
    transaksi.id_perusahaan = perusahaan.id_perusahaan AND
    (transaksi.id_kategori = kategori.id_kategori OR transaksi.id_kategori = 0)
    GROUP BY transaksi.id_transaksi 
    LIMIT 1");
    $detail = mysqli_fetch_array($query_sql,MYSQLI_ASSOC);
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Lihat Transaksi</title>

</head>

<body>
    <!-- Left Panel -->
    <?php include('partials/sidebar.php'); ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include('partials/topbar.php'); ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Lihat Transaksi</h1>
                    </div>
                </div>
            </div>  
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li class="active">Dashboard</li> -->
                            <a href="files/<?php echo $detail['file_dur']; ?>"><button class="btn btn-secondary btn-sm mr-1" > <i class="fa fa-download"></i> <?php echo $detail['file_dur']; ?></button></a>
                            <a href="files/<?php echo $detail['file_po']; ?>"><button class="btn btn-secondary btn-sm mr-1" > <i class="fa fa-download"></i> <?php echo $detail['file_po']; ?></button></a>
                            <button class="btn btn-primary btn-sm" onclick="printLaporan()"> <i class="fa fa-print"></i> Cetak</button>
                        </ol>
                        
                    </div>                    
                </div>
            </div>          
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">                        
                        <div class="card-body">
                            <div class="container printed">
                                <div class="row">
                                    <div class="col-md-6">
                                        <small>Nama Perusahaan</small>
                                        <h4><?php echo $detail['nama_perusahaan']; ?></h4> 
                                        <br> 
                                        <small>Status</small>
                                        <h4><?php echo $detail['status']; ?></h4>
                                        <br>  
                                        <small>Catatan</small>
                                        <h4><?php echo $detail['keterangan']; ?></h4>                                        
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <small>No. PR</small>
                                        <h6><?php echo $detail['no_pr']; ?></h6>
                                        <br>
                                        <small>Tanggal PR</small>
                                        <h6><?php echo $detail['tanggal_pr']; ?></h6>
                                        <br>
                                        <small>Metode</small>
                                        <h6><?php echo $detail['metode_dur']; ?></h6>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <small>Nama Barang / Jasa</small>
                                        <h4><?php echo $detail['nama_barang']; ?></h4>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <small>No. DUR</small>
                                        <h4><?php echo $detail['no_dur']; ?></h4>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <small>Qty</small>
                                        <h4><?php echo $detail['qty']; ?></h4>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <small>Satuan</small>
                                        <h4><?php echo $detail['satuan']; ?></h4>
                                        <br>                                        
                                    </div>                               
                                </div>
                                <hr>                                  
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <small>Harga OE / Satuan </small>
                                    </div>
                                    <div class="col-md-3">
                                       <h4>Rp. <?php echo $detail['owner_estimate_rp'];?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <small> Tanggal <?php echo $detail['tanggal_owner_estimate'];?></small>
                                    </div>                                    
                                </div>                                
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <small>Harga Penawaran / Satuan</small>
                                    </div>
                                    <div class="col-md-3">
                                       <h4>Rp. <?php echo $detail['harga_tawar_rp']; ?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <small> Tanggal <?php echo $detail['tanggal_tawar'];?></small>
                                    </div>
                                </div> 
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <small>Harga PO / Satuan </small>
                                    </div>
                                    <div class="col-md-3">
                                       <h4>Rp. <?php echo $detail['harga_po_rp']; ?></h4>
                                    </div>                                    
                                    <div class="col-md-3">
                                        <small>Tanggal <?php echo $detail['tanggal_po'];?> </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small>Total Efisiensi (OE - PO) </small>
                                    </div>
                                    <div class="col-md-6">
                                       <h4>Rp. <?php echo ($detail['owner_estimate_rp']-$detail['harga_po_rp'])*$detail['qty']; ?></h4>
                                    </div>
                                </div>                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script type="text/javascript" src="vendors/printThis/printThis.js"></script>
    <script>

        // $(document).ready(function() {

            function printLaporan(){
                jQuery('.printed').printThis({
                    base : 'sdit'
                });
            } 
        // });
    </script>
    
   

</body>
</html>
<?php } ?>