<?php
include('partials/global.php');
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
        </div>

        <div class="content mt-3">

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php include('partials/script.php'); ?>
    
   

</body>

</html>
