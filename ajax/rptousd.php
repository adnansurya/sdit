<?php
require "../functions.php";

$rp = floatval($_GET["rp"]);
$query = "SELECT * FROM variabeldinamis ORDER BY id_var DESC LIMIT 1";
$nilai = query($query);

$rp_db = floatval($nilai[0]["usd_to_rp"]);
$hasil = $rp / $rp_db;

echo $hasil;

?>