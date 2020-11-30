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
    <title><?php echo $webname; ?> - Blank</title>

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
            <div class="offset-sm-4 col-sm-4">
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
        $row_var =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM variabel ORDER BY id_var DESC"));
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
                <div class="col-lg-6 col-md-12">
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
                <div class="col-lg-6 col-md-12">
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
                <div class="col-lg-6 col-md-12">
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
                <div class="col-lg-6 col-md-12">
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
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Kurs 1 USD to Rp </h4>
                            <canvas id="kurs-chart"></canvas>
                        </div>
                    </div>
                </div>            
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">HBA </h4>
                            <canvas id="hba-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Pembelian Berdasarkan Kategori </h4>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>            
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Persentase Pembelian Dalam / Luar Negeri </h4>
                            <canvas id="pieChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Top 10 Perusahaan Transaksi Terbanyak </h4>
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script>    

    var ctx = document.getElementById( "kurs-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ 0, 7, 3, 5, 2, 10, 7 ],
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
            labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ 0, 7, 3, 5, 2, 10, 7 ],
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


    var ctx = document.getElementById( "pieChart" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 10, 34, 70, 5 ],
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
            labels: [
                            "PT A",
                            "CV B",
                            "Perorangan C",
                            "PT D"

                        ]
        },
        options: {
            responsive: true
        }
    } );


    var ctx = document.getElementById( "pieChart2" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [70, 30 ],
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
            labels: [
                            "Dalam Negeri",
                            "Luar Negeri",                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    

    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June", "July" ],
            datasets: [
                {
                    label: "My First dataset",
                    data: [ 65, 59, 80, 81, 56, 55, 40 ],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                            },
                {
                    label: "My Second dataset",
                    data: [ 28, 48, 40, 19, 86, 27, 90 ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0,0,0,0.07)"
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

    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June", "July" ],
            datasets: [
                {
                    label: "My First dataset",
                    data: [ 65, 59, 80, 81, 56, 55, 40 ],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                            },
                {
                    label: "My Second dataset",
                    data: [ 28, 48, 40, 19, 86, 27, 90 ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0,0,0,0.07)"
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
