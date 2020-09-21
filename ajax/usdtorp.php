<?php
require "../functions.php";

$usd = floatval($_GET["usd"]);
$query = "SELECT * FROM variabeldinamis ORDER BY id_var DESC LIMIT 1";
$nilai = query($query);

$rp_db = floatval($nilai[0]["usd_to_rp"]);
$hasil = $usd * $rp_db;

echo $hasil;

?>