<?php include('partials/global.php'); ?>
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
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-stats-up text-warning border-warning"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Rata-rata Harga Tahun Ini</div>
                                    <div class="stat-digit">1,012</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Harga Tahun Ini</div>
                                    <div class="stat-digit">1,012</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-package text-info border-info"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Quantity Tahun Ini</div>
                                    <div class="stat-digit">1,012</div>
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
                            <h4 class="mb-3">Pembelian Setiap Perusahaan </h4>
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
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script>
        

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



    </script>
    
   

</body>

</html>
