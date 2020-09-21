$(document).ready(function() {

	$("input[name='owner_estimate_rp']").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input[name='owner_estimate_rp']").val(), function(data) {
			$("input[name='owner_estimate_usd']").val(data);
		});
	});

	$("input[name='owner_estimate_usd']").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input[name='owner_estimate_usd']").val(), function(data) {
			$("input[name='owner_estimate_rp']").val(data);
		});
	});

	$("input[name='harga_po_rp']").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input[name='harga_po_rp']").val(), function(data) {
			$("input[name='harga_po_usd']").val(data);
		});
	});

	$("input[name='harga_po_usd]").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input[name='harga_po_usd']").val(), function(data) {
			$("input[name='harga_po_rp']").val(data);
		});
	});

	$("input[name='total_harga_rp']").on("keyup", function() {
		$.get("ajax/rptousd.php?rp=" + $("input[name='total_harga_rp']").val(), function(data) {
			$("input[name='total_harga_usd']").val(data);
		});
	});

	$("input[name='total_harga_usd']").on("keyup", function() {
		$.get("ajax/usdtorp.php?usd=" + $("input[name='total_harga_usd']").val(), function(data) {
			$("input[name='total_harga_rp']").val(data);
		});
	});

});

const buttonModals = document.querySelectorAll("button[data-target='#staticBackdrop']");
const modalBody = document.querySelector("div.modal-body");

buttonModals.forEach(function(buttonModal) {
	buttonModal.addEventListener("click", function() {

		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if( xhr.readyState == 4 && xhr.status == 200 ) {
				modalBody.innerHTML = xhr.responseText;
			}
		}

		xhr.open("GET", "ajax/detailModal.php?row=" + buttonModal.getAttribute("data-row"), true);
		xhr.send();
		$(document).ready(function() {
			const editButtonModal = document.querySelector("nav button.btn-warning");
			const allInputs = document.querySelectorAll("form.user input, select");
			const simpanButtonModal = document.querySelector("form.user button.btn-success");
			const tutupButtonModal = document.querySelector("nav button.btn-secondary");

			editButtonModal.addEventListener("click", function() {
				simpanButtonModal.classList.remove("d-none");
				tutupButtonModal.innerHTML = "Batal";
				tutupButtonModal.removeAttribute("data-dismiss");

				allInputs.forEach(function(input) {
					input.removeAttribute("disabled");
				});

				tutupButtonModal.addEventListener("click", function() {
					simpanButtonModal.classList.add("d-none");
					tutupButtonModal.innerHTML = "Tutup";

					allInputs.forEach(function(input) {
						input.setAttribute("disabled", "");
					});

					setTimeout(function() {
						tutupButtonModal.setAttribute("data-dismiss", "modal");
					}, 100);
					
				});

			});

		});
	});
	
});