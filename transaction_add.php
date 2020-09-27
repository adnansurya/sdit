<?php include('partials/global.php'); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - HTML5 Admin Template</title>
    <link rel="stylesheet" href="vendors/chosen/chosen.min.css">

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
                        <h1>Tambah Transaksi</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Perusahaan</strong>
                            <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#mediumModal">
                                <i class="fa fa-plus"></i> Baru
                            </button>
                            
                        </div>
                        <div class="card-body">                                  
                            <select data-placeholder="Pilih Perusahaan" class="standardSelect">
                                <option value=""></option>
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Aland Islands">Aland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                            </select>                                
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Data Transaksi</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nama Barang</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="text-input" class="form-control">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Kuantum</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Satuan</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>             
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PR</label>
                                    </div>
                                    <div class="col col-md-6">
                                        <input type="text" id="text-input" name="text-input" class="form-control"> 
                                        <small class="form-text text-muted">No. PR</small>                                       
                                    </div>
                                    <div class="col col-md-3">
                                        <input type="text" id="text-input" name="text-input" class="form-control"> 
                                        <small class="form-text text-muted">Tanggal PR</small>                                       
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PO <small>(Purchase Order)</small></label>
                                    </div>
                                    <div class="col col-md-6">
                                        <input type="text" id="text-input" name="text-input" class="form-control"> 
                                        <small class="form-text text-muted">No. PO</small>                                       
                                    </div>
                                    <div class="col col-md-3">
                                        <input type="text" id="text-input" name="text-input" class="form-control"> 
                                        <small class="form-text text-muted">Tanggal PO</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Harga PO (USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Harga PO (Rp.)</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">OE <small>(Owner Estimate)</small></label>
                                    </div>                                    
                                    <div class="col col-md-3">
                                        <input type="text" id="text-input" name="text-input" class="form-control"> 
                                        <small class="form-text text-muted">Tanggal OE</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Harga OE (USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text text-muted">Harga OE (Rp.)</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Total Harga</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text">(USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="text-input" class="form-control"> 
                                                <small class="form-text">(Rp.)</small>                                                                             
                                            </div>                                    
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="text-input" class="form-control">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Catatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="textarea-input" id="textarea-input" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>                                   
                            </form>
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
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">                                
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Perusahaan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="text-input" class="form-control">                                                           
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Nama Perusahaan</label>
                            </div>
                            <div class="col-md-2">
                                <select name="" id="" class="form-control">
                                    <option value="">PT</option>
                                    <option value="">PT</option>
                                    <option value="">PT</option>
                                </select>
                                <small class="form-text text-muted">Kode Badan</small>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="text-input" name="text-input" class="form-control">
                                <small class="form-text text-muted">Nama</small>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="textarea-input" id="textarea-input" rows="2" class="form-control"></textarea>
                            </div>
                        </div> 
                        <div class="row form-group">
                            
                            <div class="col-md-6 offset-md-3">                                
                                <input type="text" id="text-input" name="text-input" class="form-control">
                                <small class="form-text text-muted">Provinsi</small>                                                              
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="text-input" name="text-input" class="form-control">      
                                <small class="form-text text-muted">Negara</small>                                                        
                            </div>
                        </div>  
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No. Telp</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="text-input" class="form-control">                                                           
                            </div>
                        </div>                   
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
    
   

</body>

</html>
