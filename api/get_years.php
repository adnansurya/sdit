<?php
include "db_access.php";
$selected_tahun = $_GET['year'];
// $selected_column = $_GET['col'];

$resObj = new \stdClass();
$tglObj = new \stdClass();
$hbaObj = new \stdClass();
$kursObj = new \stdClass();
$dataObj = new \stdClass();


$load = mysqli_query($conn, "SELECT * FROM variabel WHERE YEAR(tanggal) = ".$selected_tahun." ORDER BY tanggal DESC ");

if($load){
    $resObj -> result = "success";

    $rows = array();
    $tanggalArray = array();
    $hbaArray = array();
    $kursArray = array();

    while($r = mysqli_fetch_assoc($load)) {
        $rows[] = $r;
        $tanggalArray[] = $r['tanggal'];
        $hbaArray[] = $r['hba'];
        $kursArray[] = $r['usd_to_rp'];

    }

    // $myarray = json_encode($rows);
    $tglObj -> tgl_Array = $tanggalArray;
    $hbaObj -> hba_Array = $hbaArray;
    $kursObj-> kurs_Array = $kursArray ;

    $dataObj -> tgl_Arr = $tanggalArray;
    $dataObj -> hba_Arr = $hbaArray;
    $dataObj -> kurs_Arr = $kursArray;

    $resObj -> data = $dataObj;    

}else{
    $resObj -> result = "failed";
    $resObj -> data= "empty";
}
 
echo json_encode($resObj);

?>