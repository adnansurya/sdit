<?php

$conn = mysqli_connect("localhost", "root", "", "rekap");

function query($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function tambahDataTransaksi($data) {
	global $conn;

	$kode_perusahaan = htmlspecialchars($data["kode_perusahaan"]);
	$kode_badan = htmlspecialchars($data["kode_badan"]);
	$nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$provinsi = htmlspecialchars($data["provinsi"]);
	$negara = htmlspecialchars($data["negara"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$no_pr = htmlspecialchars($data["no_pr"]);
	$tanggal_pr = htmlspecialchars($data["tanggal_pr"]);
	$no_po = htmlspecialchars($data["no_po"]);
	$tanggal_po = htmlspecialchars($data["tanggal_po"]);
	$owner_estimate_rp = floatval(htmlspecialchars($data["owner_estimate_rp"]));
	$owner_estimate_usd = floatval(htmlspecialchars($data["owner_estimate_usd"]));
	$tanggal_owner_estimate = htmlspecialchars($data["tanggal_owner_estimate"]);
	$harga_po_rp = floatval(htmlspecialchars($data["harga_po_rp"]));
	$harga_po_usd = floatval(htmlspecialchars($data["harga_po_usd"]));
	$total_harga_rp = floatval(htmlspecialchars($data["total_harga_rp"]));
	$total_harga_usd = floatval(htmlspecialchars($data["total_harga_usd"]));
	$kuantum = floatval(htmlspecialchars($data["kuantum"]));
	$satuan = htmlspecialchars($data["satuan"]);
	$status = htmlspecialchars($data["status"]);

	$query = "INSERT INTO transaksi
		VALUES
		('', '$kode_perusahaan', '$kode_badan', '$nama_perusahaan', '$alamat', '$provinsi', '$negara', '$no_telp', '$nama_barang', '$no_pr', '$tanggal_pr', '$no_po', '$tanggal_po', $owner_estimate_rp, $owner_estimate_usd, '$tanggal_owner_estimate', $harga_po_rp, $harga_po_usd, $total_harga_rp, $total_harga_usd, $kuantum, '$satuan', '$status') ;
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function perbaruiVariabel($data) {
	global $conn;

	$usd_to_rp = floatval(htmlspecialchars($data["usd_to_rp"]));
	$hba = floatval(htmlspecialchars($data["hba"]));
	$tanggal = htmlspecialchars($data["tanggal"]);

	$query = "INSERT INTO variabeldinamis 
		VALUES
		('', $usd_to_rp, $hba, '$tanggal');
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusDataTransaksi($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id");
	return mysqli_affected_rows($conn);
}

function ubahDataTransaksi($data) {
	global $conn;

	$id_transaksi = intval(htmlspecialchars($data["id_transaksi"]));
	$kode_perusahaan = htmlspecialchars($data["kode_perusahaan"]);
	$kode_badan = htmlspecialchars($data["kode_badan"]);
	$nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$provinsi = htmlspecialchars($data["provinsi"]);
	$negara = htmlspecialchars($data["negara"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$no_pr = htmlspecialchars($data["no_pr"]);
	$tanggal_pr = htmlspecialchars($data["tanggal_pr"]);
	$no_po = htmlspecialchars($data["no_po"]);
	$tanggal_po = htmlspecialchars($data["tanggal_po"]);
	$owner_estimate_rp = floatval(htmlspecialchars($data["owner_estimate_rp"]));
	$owner_estimate_usd = floatval(htmlspecialchars($data["owner_estimate_usd"]));
	$tanggal_owner_estimate = htmlspecialchars($data["tanggal_owner_estimate"]);
	$harga_po_rp = floatval(htmlspecialchars($data["harga_po_rp"]));
	$harga_po_usd = floatval(htmlspecialchars($data["harga_po_usd"]));
	$total_harga_rp = floatval(htmlspecialchars($data["total_harga_rp"]));
	$total_harga_usd = floatval(htmlspecialchars($data["total_harga_usd"]));
	$kuantum = floatval(htmlspecialchars($data["kuantum"]));
	$satuan = htmlspecialchars($data["satuan"]);
	$status = htmlspecialchars($data["status"]);

	$query = "UPDATE transaksi
		SET
		kode_perusahaan = '$kode_perusahaan', 
		kode_badan = '$kode_badan', 
		nama_perusahaan = '$nama_perusahaan', 
		alamat = '$alamat', 
		provinsi = '$provinsi', 
		negara = '$negara', 
		no_telp = '$no_telp', 
		nama_barang = '$nama_barang', 
		no_pr = '$no_pr', 
		tanggal_pr = '$tanggal_pr', 
		no_po = '$no_po', 
		tanggal_po = '$tanggal_po', 
		owner_estimate_rp = $owner_estimate_rp, 
		owner_estimate_usd = $owner_estimate_usd, 
		tanggal_owner_estimate = '$tanggal_owner_estimate', 
		harga_po_rp = $harga_po_rp, 
		harga_po_usd = $harga_po_usd, 
		total_harga_rp = $total_harga_rp, 
		total_harga_usd = $total_harga_usd, 
		kuantum = $kuantum, 
		satuan = '$satuan', 
		status = '$status'
		WHERE id_transaksi = $id_transaksi ;
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

?>