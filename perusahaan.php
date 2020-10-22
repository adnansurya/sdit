<?php include('partials/global.php'); ?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Perusahaan</title>
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/datatables-responsive/css/responsive.bootstrap4.css"/>

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
                        <h1>Perusahaan</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Perusahaan Terdaftar</strong> 
                            <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#mediumModal">
                                <i class="fa fa-plus"></i> Tambah Baru
                            </button>                          
                        </div>
                        <div class="card-body">  
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Perusahaan</th>
                                            <th>Kode Badan</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>Provinsi</th>
                                            <th>Negara</th>
                                            <th>No. Telp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include('api/db_access.php');                                
                                        $load = mysqli_query($conn, "SELECT * FROM perusahaan ORDER BY id_perusahaan DESC");
                                        $nomor = 1;
                                        while ($row = mysqli_fetch_array($load)){
                                            echo '<tr>';
                                            echo '<td>'.$nomor.'</td>';
                                            echo '<td>'.$row['kode_perusahaan'].'</td>';
                                            echo '<td>'.$row['kode_badan'].'</td>';
                                            echo '<td>'.$row['nama_perusahaan'].'</td>'; 
                                            echo '<td>'.$row['alamat'].'</td>'; 
                                            echo '<td>'.$row['provinsi'].'</td>'; 
                                            echo '<td>'.$row['negara'].'</td>'; 
                                            echo '<td>'.$row['no_telp'].'</td>'; 
                                            echo '<td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal" 
                                                data-id="'.$row['id_perusahaan'].'" data-kode="'.$row['kode_perusahaan'].'" data-badan="'.$row['kode_badan'].'" data-nama="'.$row['nama_perusahaan'].
                                                '" data-alamat="'.$row['alamat'].'" data-provinsi="'.$row['provinsi'].'" data-negara="'.$row['negara'].'" data-telp="'.$row['no_telp'].'"><i class="fa fa-edit"></i> Edit</button>
                                                <a class="btn btn-danger btn-sm" href=form/perusahaan_delete.php?id='.$row['id_perusahaan'].'><i class="fa fa-trash"></i> Hapus</a>';
                                                                                                                                                        
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
            </div>
            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="form/perusahaan_add.php" method="post" class="form-horizontal">    
                    <div class="modal-body">                                                
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Perusahaan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="kode_usaha" class="form-control">                                                           
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Nama Perusahaan</label>
                            </div>
                            <div class="col-md-3">
                                <select name="kode_badan" id="" class="form-control">
                                    <option value="PT">PT</option>
                                    <option value="CV">CV</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Pte Ltd">Pte Ltd</option>
                                </select>
                                <small class="form-text text-muted">Kode Badan</small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="text-input" name="nama_usaha" class="form-control">
                                <small class="form-text text-muted">Nama</small>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="alamat" id="textarea-input" rows="2" class="form-control"></textarea>
                            </div>
                        </div> 
                        <div class="row form-group">
                            
                            <div class="col-md-6 offset-md-3">                                
                                <input type="text" id="text-input" name="provinsi" class="form-control">
                                <small class="form-text text-muted">Provinsi</small>                                                              
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="text-input" name="negara" class="form-control">      
                                <small class="form-text text-muted">Negara</small>                                                        
                            </div>
                        </div>  
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No. Telp</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" id="text-input" name="telp" class="form-control">                                                           
                            </div>
                        </div>                                       
                    </div>
               
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="form/perusahaan_edit.php" method="post" class="form-horizontal"> 
                    <input type="hidden" name="id" id="idEdit">   
                    <div class="modal-body">                                                
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Perusahaan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="kodeEdit" name="kode_usaha" class="form-control">                                                           
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Nama Perusahaan</label>
                            </div>
                            <div class="col-md-3">
                                <select name="kode_badan" id="badanEdit" class="form-control">
                                    <option value="PT">PT</option>
                                    <option value="CV">CV</option>
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="Pte Ltd">Pte Ltd</option>
                                </select>
                                <small class="form-text text-muted">Kode Badan</small>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="namaEdit" name="nama_usaha" class="form-control">
                                <small class="form-text text-muted">Nama</small>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="alamat" id="alamatEdit" rows="2" class="form-control"></textarea>
                            </div>
                        </div> 
                        <div class="row form-group">
                            
                            <div class="col-md-6 offset-md-3">                                
                                <input type="text" id="provEdit" name="provinsi" class="form-control">
                                <small class="form-text text-muted">Provinsi</small>                                                              
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="negaraEdit" name="negara" class="form-control">      
                                <small class="form-text text-muted">Negara</small>                                                        
                            </div>
                        </div>  
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No. Telp</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" id="telpEdit" name="telp" class="form-control">                                                           
                            </div>
                        </div>                                       
                    </div>
               
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script> -->
    
    <script>
        jQuery('#datatable').DataTable({
            "responsive": true
        });

        jQuery('#editModal').on('show.bs.modal', function (event) {
            let item = jQuery(event.relatedTarget);
            let idPerusahaan = item.data('id');
            let kode = item.data('kode');
            let nama = item.data('nama');
            let badan = item.data('badan');
            let alamat = item.data('alamat');
            let provinsi = item.data('provinsi');
            let negara = item.data('negara');
            let telp = item.data('telp');
            

            let modal = jQuery(this);

        
            modal.find('#idEdit').val(idPerusahaan);
            modal.find('#kodeEdit').val(kode);
            modal.find('#namaEdit').val(nama);
            modal.find('#badanEdit').val(badan);
            modal.find('#alamatEdit').val(alamat);
            modal.find('#provEdit').val(provinsi);
            modal.find('#negaraEdit').val(negara);
            modal.find('#telpEdit').val(telp);


        });

        jQuery("#detailModal").on("hidden.bs.modal", function () {
            let modal = jQuery(this);
            modal.find('#idEdit').val('');
            modal.find('#kodeEdit').val('');
            modal.find('#namaEdit').val('');
            modal.find('#badanEdit').val('');
            modal.find('#alamatEdit').val('');
            modal.find('#provEdit').val('');
            modal.find('#negaraEdit').val('');
            modal.find('#telpEdit').val('');

        });
    </script>
    
   

</body>

</html>
