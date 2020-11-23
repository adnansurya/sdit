<?php

$webname = 'SDIT';

function ifUsd($benar, $salah){
	if(isset($_GET['currency'])){ 
		if($_GET['currency'] == 'usd'){ 
			return $benar;  
		}else{
			return $salah;
		}
	}else{
		return $salah;
	}
}

function priceFormat($inputPrice){

    return number_format($inputPrice, 0, ".", ",");

}

function tglIndo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	if($tanggal != ''){
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}else{
		return 'Belum Tersedia';
	}
	
}

?>