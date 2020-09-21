$(document).ready(function() {

	$("input#owner_estimate_rp").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input#owner_estimate_rp").val(), function(data) {
			$("input#owner_estimate_usd").val(data);
		});
	});

	$("input#owner_estimate_usd").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input#owner_estimate_usd").val(), function(data) {
			$("input#owner_estimate_rp").val(data);
		});
	});

	$("input#harga_po_rp").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input#harga_po_rp").val(), function(data) {
			$("input#harga_po_usd").val(data);
		});
	});

	$("input#harga_po_usd").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input#harga_po_usd").val(), function(data) {
			$("input#harga_po_rp").val(data);
		});
	});

	$("input#total_harga_rp").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input#total_harga_rp").val(), function(data) {
			$("input#total_harga_usd").val(data);
		});
	});

	$("input#total_harga_usd").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input#total_harga_usd").val(), function(data) {
			$("input#total_harga_rp").val(data);
		});
	});

});