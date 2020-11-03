<?php include('partials/global.php');
include('api/db_access.php');
if(!isset($_GET['id'])){
    header("location:transaction_list.php");   
}else{ 
    $query_sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi=".$_GET['id']." LIMIT 1");
    $detail = mysqli_fetch_array($query_sql,MYSQLI_ASSOC);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Detail Transaksi</title>
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
                        <h1>Detail Transaksi</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="menu-icon fa fa-building-o"></i> <strong>Perusahaan</strong>
                                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#mediumModal">
                                        <i class="fa fa-plus"></i> Baru
                                    </button>
                                    
                                </div>
                                <div class="card-body">                                  
                                    <select data-placeholder="Pilih Perusahaan" class="standardSelect" id="perusahaanSel" name="id_perusahaan" form="transactionForm">
                                        <option value=""></option>                                
                                        <?php 
                                            include('api/db_access.php');                                
                                            $load = mysqli_query($conn, "SELECT * FROM perusahaan ORDER BY nama_perusahaan");                                    
                                            while ($row = mysqli_fetch_array($load)){
                                                echo ' <option value="'.$row['id_perusahaan'].'"';
                                                
                                                if($detail['id_perusahaan'] == $row['id_perusahaan']){
                                                    echo ' selected ';
                                                }
                                                
                                                echo '>'.$row['kode_badan'].' '.$row['nama_perusahaan'].'</option>';                                        
                                            }
                                        ?>
                                    </select>  
                                    <div id="data-usaha"></div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="menu-icon fa fa-tag"></i> <strong>Kategori</strong>
                                    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#katModal">
                                        <i class="fa fa-plus"></i> Baru
                                    </button>
                                    
                                </div>
                                <div class="card-body">                                  
                                    <select data-placeholder="Pilih Kategori" class="standardSelect" id="kategoriSel" name="id_kategori" form="transactionForm" required>
                                        <option value=""></option>                                
                                        <?php 
                                            include('api/db_access.php');                                
                                            $load = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori");                                    
                                            while ($row = mysqli_fetch_array($load)){
                                                echo ' <option value="'.$row['id_kategori'].'"';
                                                
                                                if($detail['id_kategori'] == $row['id_kategori']){
                                                    echo ' selected ';
                                                }
                                                
                                                echo '>'.$row['nama_kategori'].'</option>';                                                                                               
                                            }
                                        ?>
                                    </select>  
                                    <div id="data-kategori"></div>                            
                                </div>
                            </div>       
                        </div>
                    </div>                    
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        <i class="menu-icon fa fa-file-text"></i> <strong>Data Transaksi</strong>
                        </div>
                        <div class="card-body card-block">
                            <form id="transactionForm" action="form/transaction_edit.php" method="post" enctype="multipart/form-data" class="form-horizontal">                                
                                <input type="hidden" name="id_transaksi" value="<?php echo $detail['id_transaksi']; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nama Barang</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="nama_barang" class="form-control" value="<?php echo $detail['nama_barang']; ?>">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <input type="text" id="qty" name="qty" class="form-control" value="<?php echo $detail['qty']; ?>"> 
                                                <small class="form-text text-muted">Quantity</small>                                                                           
                                            </div> 
                                            <div class="col col-md-3">
                                            <select name="satuan" id="satuan" class="form-control">
                                                <option value="ton" <?php  if($detail['satuan'] == 'ton'){ echo ' selected '; } ?> >ton</option>
                                                <option value="kg" <?php  if($detail['satuan'] == 'kg'){ echo ' selected '; } ?> >kg</option>
                                                <option value="Liter" <?php  if($detail['satuan'] == 'Liter'){ echo ' selected '; } ?> >Liter</option>
                                                <option value="m3" <?php  if($detail['satuan'] == 'm3'){ echo ' selected '; } ?> >m3</option>
                                            </select>
                                                <small class="form-text text-muted">Satuan</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>             
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PR</label>
                                    </div>
                                    <div class="col col-md-5">
                                        <input type="text" id="text-input" name="no_pr" class="form-control" value="<?php echo $detail['no_pr']; ?>"> 
                                        <small class="form-text text-muted">No. PR</small>                                       
                                    </div>
                                    <div class="col col-md-4">
                                        <input type="date" id="text-input" name="tgl_pr" class="form-control" value="<?php echo $detail['tanggal_pr']; ?>">                                         
                                        <small class="form-text text-muted">Tanggal PR</small>                                       
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">OE <small>(Owner Estimate)</small></label>
                                    </div>                                    
                                    <div class="col col-md-3">
                                        <input type="date" id="tgl_oe" name="tgl_oe" class="form-control" value="<?php echo $detail['tanggal_owner_estimate']; ?>"> 
                                        <small class="form-text text-muted">Tanggal OE</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_oe_usd" name="harga_oe_usd" class="form-control" value="<?php echo $detail['owner_estimate_usd']; ?>"> 
                                                <small class="form-text text-muted">Harga OE (USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_oe_rp"  name="harga_oe_rp" class="form-control" value="<?php echo $detail['owner_estimate_rp']; ?>"> 
                                                <small class="form-text text-muted">Harga OE (Rp.)</small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">DUR</label>
                                    </div>  
                                    <div class="col col-md-5">
                                        <input type="text" id="text-input" name="no_dur" class="form-control" value="<?php echo $detail['no_dur']; ?>"> 
                                        <small class="form-text text-muted">No. DUR</small>         
                                    </div>                                  
                                    <div class="col col-md-4">
                                        <input type="date" id="tgl_oe" name="tgl_dur" class="form-control" value="<?php echo $detail['tanggal_dur']; ?>" > 
                                        <small class="form-text text-muted">Tanggal DUR</small>                                       
                                    </div> 
                                                                      
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-5 offset-md-3">                                       
                                        <select name="metode_dur" id="sel-input" class="form-control">
                                            <option value="Penunjukan Langsung" <?php  if($detail['metode_dur'] == 'Penunjukan Langsung'){ echo ' selected '; } ?> >Penunjukan Langsung</option>
                                            <option value="Pemilihan Langsung" <?php  if($detail['metode_dur'] == 'Pemilihan Langsung'){ echo ' selected '; } ?> >Pemilihan Langsung</option>
                                            <option value="Pelelangan Terbatas" <?php  if($detail['metode_dur'] == 'Pelelangan Terbatas'){ echo ' selected '; } ?> >Pelelangan Terbatas</option>
                                            <option value="Pelalangan Terbuka" <?php  if($detail['metode_dur'] == 'Pelelangan Terbuka'){ echo ' selected '; } ?> >Pelelangan Terbuka</option>
                                            <option value="Pengadaan Langsung" <?php  if($detail['metode_dur'] == 'Pengadaan Langsung'){ echo ' selected '; } ?> >Pengadaan Langsung</option>                                            
                                        </select>
                                        <small class="form-text text-muted">Metode Pengadaan</small>                                                                                                                                                                                                  
                                    </div> 
                                                                      
                                </div>    
                                <div class="row form-group">
                                    <div class="offset-md-3 col-md-9">
                                        <input type="file" id="file_dur" name="file_dur" class="form-control"> 
                                        <small class="form-text text-muted">File DUR</small>                                       
                                    </div> 
                                </div>                            
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Tender</label>
                                    </div>
                                    <div class="col col-md-4">
                                        <input type="date" id="tgl_tawar" name="tgl_tawar" class="form-control" value="<?php echo $detail['tanggal_tawar']; ?>" >  
                                        <small class="form-text text-muted">Tanggal Penawaran</small>                                       
                                    </div>                                                                           
                                </div> 
                                <div class="row form-group">
                                    <div class="offset-md-3 col col-md-9">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_tawar_usd" name="harga_tawar_usd" class="form-control" value="<?php echo $detail['harga_tawar_usd']; ?>" > 
                                                <small class="form-text text-muted">Harga Penawaran (USD)</small>                                       
                                            </div>
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_tawar_rp" name="harga_tawar_rp" class="form-control" value="<?php echo $detail['harga_tawar_rp']; ?>" > 
                                                <small class="form-text text-muted">Harga Penawaran (Rp.)</small>                                       
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PO <small>(Purchase Order)</small></label>
                                    </div>
                                    <div class="col col-md-5">
                                        <input type="text" id="text-input" name="no_po" class="form-control" value="<?php echo $detail['no_po']; ?>"> 
                                        <small class="form-text text-muted">No. PO</small>                                       
                                    </div>
                                    <div class="col col-md-4">
                                        <input type="date" id="tgl_po" name="tgl_po" class="form-control" value="<?php echo $detail['tanggal_po']; ?>"> 
                                        <small class="form-text text-muted">Tanggal PO</small>                                       
                                    </div>                                    
                                </div>    
                                <div class="row form-group">                                    
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_po_usd" name="harga_po_usd" class="form-control" value="<?php echo $detail['harga_po_usd']; ?>"> 
                                                <small class="form-text text-muted">Harga PO (USD)<small class="satuan-txt"></small></small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="harga_po_rp" name="harga_po_rp" class="form-control" value="<?php echo $detail['harga_po_rp']; ?>"> 
                                                <small class="form-text text-muted">Harga PO (Rp.)<small class="satuan-txt"></small></small>                                                                             
                                            </div> 
                                        </div>                                                                         
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="offset-md-3 col-md-9">
                                        <input type="file" id="file_po" name="file_po" class="form-control"> 
                                        <small class="form-text text-muted">File PO</small>                                       
                                    </div> 
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Total Harga</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <input type="text" id="total_harga_usd" name="total_harga_usd" class="form-control" value="<?php echo $detail['total_harga_usd']; ?>"> 
                                                <small class="form-text">(USD)</small>                                                                           
                                            </div> 
                                            <div class="col col-md-6">
                                                <input type="text" id="total_harga_rp" name="total_harga_rp" class="form-control" value="<?php echo $detail['total_harga_rp']; ?>"> 
                                                <small class="form-text">(Rp.)</small>                                                                             
                                            </div>                                    
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">PO Approve</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="date" id="text-input" name="tgl_appr_po" class="form-control" value="<?php echo $detail['tanggal_approve_po']; ?>" >  
                                        <small class="form-text">Tanggal Approval PO</small>                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="status" class="form-control" value="<?php echo $detail['status']; ?>">                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Catatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="keterangan" id="textarea-input" rows="2" class="form-control"><?php echo $detail['keterangan']; ?></textarea>
                                    </div>
                                </div>  
                                <div class="row form-group">
                                    <div class="col-md-9 offset-md-3">                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
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
                                    <option value="PT" <?php  if($detail['kode_badan'] == 'PT'){ echo ' selected '; } ?> >PT</option>
                                    <option value="CV" <?php  if($detail['kode_badan'] == 'CV'){ echo ' selected '; } ?> >CV</option>
                                    <option value="Perorangan" <?php  if($detail['kode_badan'] == 'Perorangan'){ echo ' selected '; } ?> >Perorangan</option>
                                    <option value="Pte Ltd" <?php  if($detail['kode_badan'] == 'Pte Ltd'){ echo ' selected '; } ?> >Pte Ltd</option>
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

            var satuan =  jQuery('#satuan').val();
            let qty = parseFloat(jQuery('#qty').val());
            // console.log(qty);
            let harga_oe_usd = parseFloat(jQuery('#harga_oe_usd').val());
            let harga_oe_rp = parseFloat(jQuery('#harga_oe_rp').val());
            let harga_po_usd = parseFloat(jQuery('#harga_po_usd').val());
            let harga_po_rp = parseFloat(jQuery('#harga_po_rp').val());
            let total_harga_rp = parseFloat(jQuery('#total_harga_rp').val());
            let total_harga_usd = parseFloat(jQuery('#total_harga_usd').val());  
            let kurs_oe = 0;
            let kurs_po = 0;          
            jQuery('.satuan-txt').text(" / " +  satuan);

        jQuery('#satuan').change(function() {
            var satuan =  jQuery(this).val();
            if(satuan != ""){
                jQuery('.satuan-txt').text(" / " + satuan);
            }else{
                jQuery('.satuan-txt').text("");
            }
            
           
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

        jQuery('#kategoriSel').change(function() {
            jQuery('#data-kategori').empty();
            jQuery('#data-kategori').removeClass('mt-4');

            let idKategori = jQuery(this).val();
            

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_kategori.php',
                data: {"id": idKategori },
                success: function(data){
                    let kategoriObj = JSON.parse(data);
                    if(kategoriObj.result != 'unknown'){
                        jQuery('#data-kategori').addClass('mt-4');
                        jQuery('#data-kategori').append(`                            
                            <p> <small>`+kategoriObj.data.deskripsi+`</small> </p>
                        `);
                    }                    
                }
            });

        });
            
        });

        jQuery('#tgl_oe').change(function() {
            let tgl_oe = jQuery(this).val();
            harga_oe_usd = jQuery('#harga_oe_usd').val() == 0 ? 0 : jQuery('#harga_oe_usd').val();
            jQuery('#harga_oe_usd').val(harga_oe_usd);

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_oe },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_oe = parseFloat(varObj.data.usd_to_rp); 
                    harga_oe_rp = kurs_oe *harga_oe_usd;
                    // console.log(harga_oe_rp);
                    if(!isNaN(harga_oe_rp)){
                        jQuery('#harga_oe_rp').val(harga_oe_rp.toFixed(2));   
                    }else{
                        jQuery('#harga_oe_rp').val("0"); 
                    }  
                                    
                                                                    
                }
            });  
        });

        jQuery('#harga_oe_usd').keyup(function() {

            let tgl_oe = jQuery('#tgl_oe').val();
            harga_oe_usd = parseFloat(jQuery(this).val());

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_oe },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_oe = parseFloat(varObj.data.usd_to_rp);                 
                    let hasil = kurs_oe*harga_oe_usd;
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
            harga_oe_rp = parseFloat(jQuery(this).val());


            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_oe },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_oe = parseFloat(varObj.data.usd_to_rp);                
                    let hasil = harga_oe_rp/kurs_oe;
                    if(!isNaN(hasil)){
                        jQuery('#harga_oe_usd').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_oe_usd').val("0"); 
                    }                    
                                                                    
                }
            });  

        });



        jQuery('#tgl_po').change(function() {
            let tgl_po = jQuery(this).val();
            harga_po_usd = jQuery('#harga_po_usd').val() == 0 ? 0 : jQuery('#harga_po_usd').val();
            if(jQuery('#qty').val() == 0){
                qty = 0;
            }else{
                qty = parseFloat(jQuery('#qty').val());
            }            
            jQuery('#harga_po_usd').val(harga_po_usd);

            jQuery.ajax({
            
                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_po },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_po = parseFloat(varObj.data.usd_to_rp); 
                    harga_po_rp = kurs_po *harga_po_usd;
                    
                    if(!isNaN(harga_po_rp)){
                        jQuery('#harga_po_rp').val(harga_po_rp.toFixed(2));   
                    }else{
                        jQuery('#harga_po_rp').val("0"); 
                    }  

                    total_harga_usd = harga_po_usd*qty;            
                    if(!isNaN(total_harga_usd)){
                        jQuery('#total_harga_usd').val(total_harga_usd.toFixed(2));
                    }else{
                        jQuery('#total_harga_usd').val("0");
                    }
                    total_harga_rp = harga_po_rp*qty;            
                    if(!isNaN(total_harga_rp)){
                        jQuery('#total_harga_rp').val(total_harga_rp.toFixed(2));
                    }else{
                        jQuery('#total_harga_rp').val("0");
                    }
                                    
                                                                    
                }
            });  
        });




        jQuery('#harga_po_usd').keyup(function() {

            let tgl_po = jQuery('#tgl_po').val();
            harga_po_usd = parseFloat(jQuery(this).val());
            if(jQuery('#qty').val() == 0){
                qty = 0;
            }else{
                qty = parseFloat(jQuery('#qty').val());
            }  


            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_po },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_po = parseFloat(varObj.data.usd_to_rp);                    
                    harga_po_rp = kurs_po*harga_po_usd;
                    // console.log(harga_po_usd + " " + kurs_po +" "+ harga_po_rp + " " + qty);
                    if(!isNaN(harga_po_rp)){
                        jQuery('#harga_po_rp').val(harga_po_rp.toFixed(2));  
                        total_harga_usd = harga_po_usd*qty; 
                        jQuery('#total_harga_usd').val(total_harga_usd.toFixed(2)); 
                        total_harga_rp = harga_po_rp*qty; 
                        jQuery('#total_harga_rp').val(total_harga_rp.toFixed(2)); 
                    }else{
                        jQuery('#harga_po_rp').val("0"); 
                    }                    
                                                                    
                }
            });  

        });

        jQuery('#harga_po_rp').keyup(function() {

            let tgl_po = jQuery('#tgl_po').val();
            harga_po_rp = parseFloat(jQuery(this).val());
            if(jQuery('#qty').val() == 0){
                qty = 0;
            }else{
                qty = parseFloat(jQuery('#qty').val());
            }  


            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_po },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs = parseFloat(varObj.data.usd_to_rp);                    
                    harga_po_usd = harga_po_rp/kurs_po;
                    // console.log(harga_po_usd);
                    if(!isNaN(harga_po_usd)){
                        jQuery('#harga_po_usd').val(harga_po_usd.toFixed(2));
                        total_harga_usd = harga_po_usd*qty; 
                        jQuery('#total_harga_usd').val(total_harga_usd.toFixed(2)); 
                        total_harga_rp = harga_po_rp*qty; 
                        jQuery('#total_harga_rp').val(total_harga_rp.toFixed(2));  
                       
                    }else{
                        jQuery('#harga_po_usd').val("0"); 
                    }                    
                                                                    
                }
            });  

        });

        jQuery('#qty').keyup(function() {
            qty = parseFloat(jQuery(this).val());
            harga_po_usd = parseFloat(jQuery('#harga_po_usd').val());
            total_harga_usd = harga_po_usd*qty;            
            if(!isNaN(total_harga_usd)){
                jQuery('#total_harga_usd').val(total_harga_usd.toFixed(2));
            }else{
                jQuery('#total_harga_usd').val("0");
            }
            harga_po_rp = parseFloat(jQuery('#harga_po_rp').val());
            total_harga_rp = harga_po_rp*qty;            
            if(!isNaN(total_harga_rp)){
                jQuery('#total_harga_rp').val(total_harga_rp.toFixed(2));
            }else{
                jQuery('#total_harga_rp').val("0");
            }
               
        });

        jQuery('#harga_tawar_usd').keyup(function() {

            let tgl_tawar = jQuery('#tgl_tawar').val();
            harga_tawar_usd = parseFloat(jQuery(this).val());

            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_tawar },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_tawar = parseFloat(varObj.data.usd_to_rp);                 
                    let hasil = kurs_tawar*harga_tawar_usd;
                    if(!isNaN(hasil)){
                        jQuery('#harga_tawar_rp').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_tawar_rp').val("0"); 
                    }                    
                                                                    
                }
            });  

        });


        jQuery('#harga_tawar_rp').keyup(function() {

            let tgl_tawar = jQuery('#tgl_tawar').val();
            harga_tawar_rp = parseFloat(jQuery(this).val());

            jQuery.ajax({

                type: "GET",
                url: 'api/get_variabel.php',
                data: {"tanggal": tgl_tawar },
                success: function(data){
                    let varObj = JSON.parse(data);
                    kurs_tawar = parseFloat(varObj.data.usd_to_rp);                 
                    let hasil = harga_tawar_rp/kurs_tawar;
                    if(!isNaN(hasil)){
                        jQuery('#harga_tawar_usd').val(hasil.toFixed(2));   
                    }else{
                        jQuery('#harga_tawar_usd').val("0"); 
                    }                    
                                                                    
                }
        });  

});

        
        
    </script>
    
   

</body>

</html>
<?php } ?>