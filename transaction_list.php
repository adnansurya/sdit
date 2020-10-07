<?php include('partials/global.php'); ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Daftar Transaksi</title>
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

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
                        <h1>Transaksi</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Daftar Transaksi</strong>                           
                        </div>
                        <div class="card-body">  
                            
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal PR</th>
                                        <th>Total Harga (USD)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include('api/db_access.php');                                
                                        $load = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.status, transaksi.tanggal_pr, transaksi.nama_barang, transaksi.total_harga_usd, perusahaan.kode_badan , perusahaan.nama_perusahaan 
                                        FROM perusahaan, transaksi WHERE perusahaan.id_perusahaan = transaksi.id_perusahaan GROUP BY transaksi.id_transaksi ORDER BY transaksi.tanggal_pr DESC");
                                    $nomor = 1;
                                    while ($row = mysqli_fetch_array($load)){
                                        echo '<tr>';
                                        echo '<td>'.$nomor.'</td>';
                                        echo '<td>'.$row['kode_badan'].' '.$row['nama_perusahaan'].'</td>';
                                        echo '<td>'.$row['nama_barang'].'</td>';
                                        echo '<td>'.$row['tanggal_pr'].'</td>';
                                        echo '<td>'.$row['total_harga_usd'].'</td>'; 
                                        echo '<td>'.$row['status'].'</td>'; 
                                        echo '<td>
                                            <a class="btn btn-info btn-sm" href=transaction_detail.php?id='.$row['id_transaksi'].'><i class="fa fa-edit"></i> Edit</button>
                                            <a class="btn btn-danger btn-sm" href=form/transaction_delete.php?id='.$row['id_transaksi'].'><i class="fa fa-trash"></i> Hapus</a>';
                                                                                                                                                     
                                        echo '</td></tr>';
                                        $nomor++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>            
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Variabel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="form/variabel_edit.php" method="post" class="form-horizontal">    
                        <input type="hidden" name="id" id="idEdit">
                        <div class="row form-group">
                            <div class="col col-md-5">
                                <label for="text-input" class=" form-control-label">Tanggal</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="date" id="tanggalEdit" name="tanggal" class="form-control" required>                                                           
                            </div>
                        </div>                             
                        <div class="row form-group">
                            <div class="col col-md-5">
                                <label for="text-input" class=" form-control-label">USD to Rp.</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="text" id="kursEdit" name="usd_to_rp" class="form-control" required>                                                           
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-5">
                                <label for="text-input" class=" form-control-label">HBA</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="text" id="hbaEdit" name="hba" class="form-control" required>                                                           
                            </div>
                        </div>
                        <div class="row form-group">                                   
                            <div class="col-12 col-md-7 offset-md-5">                                    
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>                                 
                    </form>     
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script>
        jQuery('#datatable').DataTable();

        jQuery('#detailModal').on('show.bs.modal', function (event) {
            let item = jQuery(event.relatedTarget);
            let idVar = item.data('id');
            let tanggal = item.data('tgl');
            let kurs = item.data('kurs');
            let hba = item.data('hba');

            let modal = jQuery(this);

           
            modal.find('#tanggalEdit').val(tanggal);
            modal.find('#kursEdit').val(kurs);
            modal.find('#hbaEdit').val(hba);
            modal.find('#idEdit').val(idVar);


        });

        jQuery("#detailModal").on("hidden.bs.modal", function () {
            let modal = jQuery(this);
            modal.find('#tanggalEdit').val('');
            modal.find('#kursEdit').val('');
            modal.find('#hbaEdit').val('');
            modal.find('#idEdit').val('');
        });
    </script>
    
   

</body>

</html>
