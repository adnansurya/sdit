<?php include('partials/global.php'); ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Kategori</title>
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
                        <h1>Kategori</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Daftar Kategori</strong>                           
                        </div>
                        <div class="card-body">  
                            
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include('api/db_access.php');                                
                                    $load = mysqli_query($conn, "SELECT * FROM kaegori ORDER BY nama_kategori ASC");
                                    $nomor = 1;
                                    while ($row = mysqli_fetch_array($load)){
                                        echo '<tr>';
                                        echo '<td>'.$nomor.'</td>';
                                        echo '<td>'.$row['nama_kategori'].'</td>';
                                        echo '<td>'.$row['deskripsi'].'</td>';                                        
                                        echo '<td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" 
                                            data-id="'.$row['id_var'].'" data-kurs="'.$row['usd_to_rp'].'" data-hba="'.$row['hba'].'" data-tgl="'.$row['tanggal'].'"><i class="fa fa-edit"></i> Edit</button>
                                            <a class="btn btn-danger btn-sm" href=form/variabel_delete.php?id='.$row['id_var'].'><i class="fa fa-trash"></i> Hapus</a>';
                                                                                                                                                     
                                        echo '</td></tr>';
                                        $nomor++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah Kategori</strong>                            
                        </div>
                        <div class="card-body">                                  
                            <form action="form/kategori_add.php" method="post" class="form-horizontal">    
                                                          
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="text-input" class=" form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" id="text-input" name="nama" class="form-control" required>                                                           
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="text-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <textarea name="deskripsi" id="textarea-input" rows="2" class="form-control"></textarea>                                                          
                                    </div>
                                </div> 
                               
                                <div class="row form-group">                                   
                                    <div class="col-12 col-md-8 offset-md-4">                                    
                                        <button type="submit" class="btn btn-success">Tambahkan</button>
                                    </div>
                                </div>                                 
                            </form>                                 
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
                    <h5 class="modal-title" id="mediumModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="form/kategori_edit.php" method="post" class="form-horizontal">    
                        <input type="hidden" name="id" id="idEdit">                                                   
                        <div class="row form-group">
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" id="kursEdit" name="nama" class="form-control" required>                                                           
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <textarea name="deskripsi" id="textarea-input" rows="2" class="form-control"></textarea>                                                          
                            </div>
                          
                        </div>                        
                        <div class="row form-group">                                   
                            <div class="col-12 col-md-8 offset-md-4">                                    
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
