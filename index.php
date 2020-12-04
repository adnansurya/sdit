<?php 
include('partials/global.php'); 
include('api/db_access.php');  
if(isset($_GET['tahun'])){ 
    $selected_tahun = $_GET['tahun'];
}else{
    $selected_tahun  = $date->format("Y");    
}

?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <?php include('partials/head.php'); ?>
    <title><?php echo $webname; ?> - Dashboard</title>

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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header mt-2 float-right">                   
                    <select name="tahunSel" id="tahunSel" class="form-control text-right">
                        <?php
                            $load = mysqli_query($conn, "SELECT filter_year FROM transaksi GROUP BY filter_year ORDER BY filter_year DESC");
                            while ($row = mysqli_fetch_array($load)){
                                echo '<option value="'.$row['filter_year'].'"';
                                if($selected_tahun == $row['filter_year']){
                                    echo ' selected';
                                }
                                echo '>Tahun '.$row['filter_year'].'</option>';
                            }

                        ?>                                              
                    </select>                    
                </div>
            </div>
        </div>

        <?php
        $row_var =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM variabel ORDER BY tanggal DESC LIMIT 1"));
        $var_kurs = $row_var['usd_to_rp'];
        $var_hba = $row_var['hba'];
        $var_tgl = $row_var['tanggal']; 

        $row_total_pembelian =  mysqli_fetch_array(mysqli_query($conn, "SELECT filter_year, SUM(total_harga_rp) as total_beli, SUM(owner_estimate_rp - harga_po_rp) as efisiensi FROM transaksi  WHERE filter_year=".$selected_tahun." GROUP BY filter_year"));
        $var_total_pembelian = $row_total_pembelian['total_beli'];
        $var_tahun_pembelian  = $row_total_pembelian['filter_year'];
        $var_total_efisiensi  = $row_total_pembelian['efisiensi'];
        
        ?>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <!-- <div class="stat-icon dib"><i class="ti-stats-up text-warning border-warning"></i></div> -->
                                <div class="stat-content dib">
                                    <div class="stat-text">Kurs (USD to RP)</div>
                                    <div class="stat-digit">Rp. <?php echo priceFormat($var_kurs); ?></div>
                                    <div class="stat-text">Update : <?php echo tglIndo($var_tgl); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <!-- <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div> -->
                                <div class="stat-content dib">
                                    <div class="stat-text">HBA</div>
                                    <div class="stat-digit"><?php echo $var_hba; ?></div>
                                    <div class="stat-text">Update : <?php echo tglIndo($var_tgl); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <!-- <div class="stat-icon dib"><i class="ti-package text-info border-info"></i></div> -->
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Pembelian</div>
                                    <div class="stat-digit">Rp. <?php echo priceFormat($var_total_pembelian); ?></div>
                                    <div class="stat-text">Tahun <?php echo $var_tahun_pembelian; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <!-- <div class="stat-icon dib"><i class="ti-package text-info border-info"></i></div> -->
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Efisiensi</div>
                                    <div class="stat-digit">Rp. <?php echo priceFormat($var_total_efisiensi); ?></div>
                                    <div class="stat-text">Tahun <?php echo $var_tahun_pembelian; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kurs 1 USD to Rp </h4>
                        </div>
                        <div class="card-body">                           
                            <canvas id="kurs-chart"></canvas>
                        </div>                        
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="card"> 
                        <div class="card-header">
                            <h4>HBA</h4>
                        </div>
                        <div class="card-body">                           
                            <canvas id="hba-chart"></canvas>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pembelian Berdasarkan Kategori</h4>
                        </div>
                        <div class="card-body">                         
                            <canvas id="pieChart"></canvas>                            
                        </div>
                        <div class="card-footer">
                            <h6 class="text-right">Tahun <?php echo $selected_tahun;?></h6>
                        </div>
                    </div>
                </div>            
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Persentase Pembelian Dalam / Luar Negeri </h4>
                        </div>
                        <div class="card-body">                            
                            <canvas id="pieChart2"></canvas>
                        </div> 
                        <div class="card-footer">
                            <h6 class="text-right">Tahun <?php echo $selected_tahun;?></h6>
                        </div>                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Top 10 Perusahaan Transaksi Terbanyak  </h4>
                        </div>
                        <div class="card-body">                  
                            <canvas id="barChart"></canvas>
                        </div>
                        <div class="card-footer">
                            <h6 class="text-right">Tahun <?php echo $selected_tahun;?></h6>
                        </div> 
                    </div>
                </div>
            </div>
        
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <?php 
         $load = mysqli_query($conn, "SELECT * FROM variabel ORDER BY id_var DESC");
         $tanggalArray = array();
         $hbaArray = array();
         $kursArray = array();
         while ($row = mysqli_fetch_array($load)){
            $tanggalArray[] = $row['tanggal'];
            $hbaArray[] = $row['hba'];
            $kursArray[] = $row['usd_to_rp'];
         }

        
    ?>
    <script>    

        jQuery('#tahunSel').change(function(){
            let pilih_tahun = jQuery(this).val();
            window.location.href = "index.php?tahun="+pilih_tahun;   
            // console.log(pilih_tahun);
        });

    var ctx = document.getElementById( "kurs-chart" );
    var labelTanggal =  <?php echo json_encode($tanggalArray); ?>;
    var labelHba =  <?php echo json_encode($hbaArray); ?>;
    var labelKurs =  <?php echo json_encode($kursArray); ?>;
    
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: labelTanggal,
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: labelKurs,
                label: "Expense",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );


    var ctx = document.getElementById( "hba-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: labelTanggal,
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: labelHba,
                label: "Expense",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );

    <?php 
        $load = mysqli_query($conn, "SELECT SUM(transaksi.total_harga_rp) AS total_transaksi,
        CASE
            WHEN transaksi.id_kategori=0 THEN 'Tidak Tersedia'
            WHEN transaksi.id_kategori = kategori.id_kategori THEN kategori.nama_kategori
        END AS nama_kategori
        FROM transaksi, kategori
        WHERE  transaksi.id_kategori = kategori.id_kategori AND filter_year = ".$selected_tahun." GROUP BY transaksi.id_kategori");
        $kategoriArray = array();
        $totalKategoriArray = array();
        while ($row = mysqli_fetch_array($load)){
            $kategoriArray[] = $row['nama_kategori'];
            $totalKategoriArray[] = $row['total_transaksi'];           
        }
    ?>
    var ctx = document.getElementById( "pieChart" );
    var labelKategori =  <?php echo json_encode($kategoriArray); ?>;
    console.log(labelKategori);
    var labelTransaksiKategori =  <?php echo json_encode($totalKategoriArray); ?>;
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: labelTransaksiKategori,
                backgroundColor: [
                                    "rgba( 80, 150,0,0.9)",
                                    "rgba( 80, 150,0,0.7)",
                                    "rgba( 80, 150,0,0.5)",
                                    "rgba( 80, 150,0,0.3)",
                                    "rgba(0,0,0,0.07)"
                                ],
                hoverBackgroundColor: [
                    "rgba( 80, 150,0,0.9)",
                                    "rgba( 80, 150,0,0.7)",
                                    "rgba( 80, 150,0,0.5)",
                                    "rgba( 80, 150,0,0.3)",
                                    "rgba(0,0,0,0.07)"
                                ]

                            } ],
            labels: labelKategori
        },
        options: {
            responsive: true
        }
    } );

    <?php 
        $load = mysqli_query($conn, "SELECT SUM(transaksi.total_harga_rp) AS total_transaksi,        
        CASE        
            WHEN  UPPER(perusahaan.negara) = 'INDONESIA' THEN 'Dalam Negeri'
            ELSE 'Luar Negeri'
        END AS jenis_transaksi
        FROM transaksi, perusahaan
        WHERE transaksi.id_perusahaan=perusahaan.id_perusahaan AND 
        filter_year = ".$selected_tahun." GROUP BY jenis_transaksi");
        $jenisArray = array();
        $totalJenisArray = array();
        while ($row = mysqli_fetch_array($load)){
            $jenisArray[] = $row['jenis_transaksi'];
            $totalJenisArray[] = $row['total_transaksi'];           
        }
    ?>
    var ctx = document.getElementById( "pieChart2" );
    var labelJenis = <?php echo json_encode($jenisArray); ?>;
    var labelTransaksiJenis = <?php echo json_encode($totalJenisArray); ?>;
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: labelTransaksiJenis,
                backgroundColor: [
                                    "rgba(0, 123, 255,0.9)",                                    
                                    "rgba(0, 123, 255,0.5)",                                    
                                    "rgba(0,0,0,0.07)"
                                ],
                hoverBackgroundColor: [
                                    "rgba(0, 123, 255,0.9)",                                    
                                    "rgba(0, 123, 255,0.5)",                            
                                    "rgba(0,0,0,0.07)"
                                ]

                            } ],
            labels: labelJenis
        },
        options: {
            responsive: true
        }
    } );

    
    <?php 
        $load = mysqli_query($conn, "SELECT SUM(transaksi.total_harga_rp) AS total_transaksi,  
        perusahaan.nama_perusahaan AS nama_usaha
        FROM transaksi, perusahaan
        WHERE transaksi.id_perusahaan=perusahaan.id_perusahaan AND 
        filter_year = ".$selected_tahun." GROUP BY nama_usaha ORDER BY total_transaksi DESC LIMIT 10");
        $topArray = array();
        $totalTopArray = array();
        while ($row = mysqli_fetch_array($load)){
            $topArray[] = $row['nama_usaha'];
            $totalTopArray[] = $row['total_transaksi'];           
        }
    ?>
    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var labelTop = <?php echo json_encode($topArray); ?>;
    var labelTransaksiTop = <?php echo json_encode($totalTopArray); ?>;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: labelTop,
            datasets: [
             
                {
                    label: "Total Transaksi",
                    data: labelTransaksiTop,
                    borderColor:  "rgba(0, 123, 255,0.9)",   
                    borderWidth: "0",
                    backgroundColor:  "rgba(0, 123, 255,0.7)"   
                            }
        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );

    



   
    </script>
    
   

</body>

</html>
