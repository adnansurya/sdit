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
                            <select data-placeholder="Pilih Perusahaan" class="standardSelect" id="perusahaanSel">
                                <option value=""></option>                                
                                <?php 
                                    include('api/db_access.php');                                
                                    $load = mysqli_query($conn, "SELECT * FROM perusahaan ORDER BY nama_perusahaan");                                    
                                    while ($row = mysqli_fetch_array($load)){
                                        echo ' <option value="'.$row['id_perusahaan'].'">'.$row['kode_badan'].' '.$row['nama_perusahaan'].'</option>';
                                        
                                    }
                                ?>
                            </select>  
                            <div id="data-usaha"></div>                            
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
                                        <input type="text" id="text-input" name="nama_barang" class="form-control">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <input type="text" id="text-input" name="qty" class="form-control"> 
                                                <small class="form-text text-muted">Quantity</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="satuan" name="satuan" class="form-control"> 
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
                                        <input type="text" id="text-input" name="no_pr" class="form-control"> 
                                        <small class="form-text text-muted">No. PR</small>                                       
                                    </div>
                                    <div class="col col-md-3">
                                        <input type="date" id="text-input" name="tgl_pr" class="form-control">                                         
                                        <small class="form-text text-muted">Tanggal PR</small>                                       
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">OE <small>(Owner Estimate)</small></label>
                                    </div>                                    
                                    <div class="col col-md-3">
                                        <input type="date" id="tgl_oe" name="tgl_oe" class="form-control"> 
                                        <small class="form-text text-muted">Tanggal OE</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_oe_usd" name="harga_oe_usd" class="form-control"> 
                                                <small class="form-text text-muted">Harga OE (USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_oe_rp" name="harga_oe_rp" class="form-control"> 
                                                <small class="form-text text-muted">Harga OE (Rp.)</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PO <small>(Purchase Order)</small></label>
                                    </div>
                                    <div class="col col-md-6">
                                        <input type="text" id="text-input" name="no_po" class="form-control"> 
                                        <small class="form-text text-muted">No. PO</small>                                       
                                    </div>
                                    <div class="col col-md-3">
                                        <input type="date" id="tgl_po" name="tgl_po" class="form-control"> 
                                        <small class="form-text text-muted">Tanggal PO</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_po_usd" name="harga_po_usd" class="form-control"> 
                                                <small class="form-text text-muted">Harga PO (USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_po_rp" name="harga_po_rp" class="form-control"> 
                                                <small class="form-text text-muted">Harga PO (Rp.)</small>                                                                             
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
                                                <input type="text" id="text-input" name="total_harga_usd" class="form-control"> 
                                                <small class="form-text">(USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="text-input" name="total_harga_rp" class="form-control"> 
                                                <small class="form-text">(Rp.)</small>                                                                             
                                            </div>                                    
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="text" id="text-input" name="status" class="form-control">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Catatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="catatan" id="textarea-input" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>  
                                <div class="row form-group">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-success">Simpan</button>
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

        jQuery('#perusahaanSel').change(function() {
            jQuery('#data-usaha').empty();
            jQuery('#data-usaha').removeClass('mt-4');

            let idPerusahaan = jQuery(this).val();
            

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_perusahaan.php',
                data: {"id": idPerusahaan },
                success: function(data){
                    let usahaObj = JSON.parse(data);
                    if(usahaObj.result != 'unknown'){
                        jQuery('#data-usaha').addClass('mt-4');
                        jQuery('#data-usaha').append(`
                            <h6><b>`+usahaObj.data.kode_badan+` `+ usahaObj.data.nama_perusahaan +`</b></h6><br>
                            <p><small>Kode </small> `+usahaObj.data.kode_perusahaan+`<br>
                            <small>Alamat </small> `+usahaObj.data.alamat+`<br>
                            <small>Provinsi </small> `+usahaObj.data.provinsi+`<br>
                            <small>Negara </small> `+usahaObj.data.negara+`<br>
                            <small>No. Telp </small> `+usahaObj.data.no_telp+`</p>
                        `);
                    }                    
                }
            });

        });
            
        });

        jQuery('#harga_oe_usd').keyup(function() {

            let tgl_oe = jQuery('#tgl_oe').val();
            

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_oe },
                success: function(data){
                    let varObj = JSON.parse(data);
                    let kurs = parseFloat(varObj.data.usd_to_rp);
                    let usd = parseFloat(jQuery('#harga_oe_usd').val());
                    let hasil = kurs*usd;
                    if(!isNaN(hasil)){
                        jQuery('#harga_oe_rp').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_oe_rp').val("0"); 
                    }                    
                                                                       
                }
            });  

        });

        jQuery('#harga_oe_rp').keyup(function() {

            let tgl_oe = jQuery('#tgl_oe').val();


            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_oe },
                success: function(data){
                    let varObj = JSON.parse(data);
                    let kurs = parseFloat(varObj.data.usd_to_rp);
                    let rp = parseFloat(jQuery('#harga_oe_rp').val());
                    let hasil = rp/kurs;
                    if(!isNaN(hasil)){
                        jQuery('#harga_oe_usd').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_oe_usd').val("0"); 
                    }                    
                                                                    
                }
            });  

        });




        jQuery('#harga_po_usd').keyup(function() {

            let tgl_po = jQuery('#tgl_po').val();


            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_po },
                success: function(data){
                    let varObj = JSON.parse(data);
                    let kurs = parseFloat(varObj.data.usd_to_rp);
                    let usd = parseFloat(jQuery('#harga_po_usd').val());
                    let hasil = kurs*usd;
                    if(!isNaN(hasil)){
                        jQuery('#harga_po_rp').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_po_rp').val("0"); 
                    }                    
                                                                    
                }
            });  

        });

    jQuery('#harga_po_rp').keyup(function() {

        let tgl_po = jQuery('#tgl_po').val();


        jQuery.ajax({

            type: "GET",
            url: 'api/get_variabel.php',
            data: {"tanggal": tgl_po },
            success: function(data){
                let varObj = JSON.parse(data);
                let kurs = parseFloat(varObj.data.usd_to_rp);
                let rp = parseFloat(jQuery('#harga_po_rp').val());
                let hasil = rp/kurs;
                if(!isNaN(hasil)){
                    jQuery('#harga_po_usd').val(hasil.toFixed(2));   
                }else{
                    jQuery('#harga_po_usd').val("0"); 
                }                    
                                                                
            }
        });  

    });
        
    </script>
    
   

</body>

</html>
