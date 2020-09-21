<?php
require "functions.php";

if( isset($_POST["submit"]) ) {
  if( tambahDataTransaksi($_POST) > 0 ) {
    echo "<script>
      alert('BERHASIL Ditambah!');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Transaksi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/tambahTransaksi.css">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <a href="index.php" class="btn btn-primary align-middle">
        <i class="fas fa-chevron-left"></i>
      </a>
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Transaksi</h1>
                <hr class="mb-5">
              </div>
              <form class="user" method="post">
                <div class="form-group">
                  <label for="kode_perusahaan">Kode Perusahaan :</label>
                  <input type="text" name="kode_perusahaan" class="form-control form-control-user" id="kode_perusahaan" placeholder="Kode Perusahaan">
                  <small>Isi kode perusahaan.</small>
                </div>
                <div class="form-group">
                  <label for="kode_badan">Kode Badan :</label>
                  <select name="kode_badan" class="form-control form-control-user" id="kode_badan" size="0">
                    <option value="-">-</option>
                    <option value="PT">PT</option>
                    <option value="CV">CV</option>
                    <option value="Perorangan">Perorangan</option>
                    <option value="Pte Ltd">Pte Ltd</option>
                  </select>
                  <small>Pilih salah satu kode badan.</small>
                </div>
                <div class="form-group">
                  <label for="nama_perusahaan">Nama Perusahaan :</label>
                  <input type="text" name="nama_perusahaan" class="form-control form-control-user" id="nama_perusahaan" placeholder="Nama Perusahaan">
                  <small>Isi nama perusahaan.</small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat :</label>
                  <input type="text" name="alamat" class="form-control form-control-user" id="alamat" placeholder="Alamat">
                  <small>Isi alamat.</small>
                </div>
                <div class="form-group">
                  <label for="provinsi">Provinsi :</label>
                  <input type="text" name="provinsi" class="form-control form-control-user" id="provinsi" placeholder="Provinsi">
                  <small>Isi nama provinsi.</small>
                </div>
                <div class="form-group">
                  <label for="negara">Negara :</label>
                  <input type="text" name="negara" class="form-control form-control-user" id="negara" placeholder="Negara">
                  <small>Isi nama negara.</small>
                </div>
                <div class="form-group">
                  <label for="no_telp">No. Telp :</label>
                  <input type="text" name="no_telp" class="form-control form-control-user" id="no_telp" placeholder="xxxxx..">
                  <small>Isi Nomor Telepon.</small>
                </div>
                <div class="form-group">
                  <label for="nama_barang">Nama Barang / Jasa :</label>
                  <input type="text" name="nama_barang" class="form-control form-control-user" id="nama_barang" placeholder="Nama Barang / Jasa">
                  <small>Isi nama barang atau jasa.</small>
                </div>
                <div class="form-group">
                  <label for="no_pr">No. PR :</label>
                  <input type="text" name="no_pr" class="form-control form-control-user" id="no_pr" placeholder="No. PR">
                  <small>Isi Nomor PR.</small>
                </div>
                <div class="form-group">
                  <label for="tanggal_pr">Tanggal PR :</label>
                  <input type="date" name="tanggal_pr" class="form-control form-control-user" id="tanggal_pr" placeholder="xx/xx/xxxx">
                  <small>Isi tanggal PR.</small>
                </div>
                <div class="form-group">
                  <label for="no_po">No. PO :</label>
                  <input type="text" name="no_po" class="form-control form-control-user" id="no_po" placeholder="xxxxxx">
                  <small>Isi nomor PO (Purchase Order similiar to kontrak).</small>
                </div>
                <div class="form-group">
                  <label for="tanggal_po">Tanggal PO :</label>
                  <input type="date" name="tanggal_po" class="form-control form-control-user" id="tanggal_po" placeholder="xxxx">
                  <small>Isi tanggal PO.</small>
                </div>
                <div class="form-group">
                  <label>Owner Estimate :</label>
                  <div class="row mx-auto">
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="owner_estimate_rp">IDR :</label>
                      <input type="text" name="owner_estimate_rp" class="form-control form-control-user" id="owner_estimate_rp" placeholder="Rp.">
                      <small>Isi Owner Estimate(Rp).</small>
                    </div>
                    <div class="font-weight-normal col-sm-2 text-center">
                      <p class="mt-5">
                        <i class="fas fa-sync-alt"></i>
                      </p>
                    </div>
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="owner_estimate_usd">USD :</label>
                      <input type="text" name="owner_estimate_usd" class="form-control form-control-user" id="owner_estimate_usd" placeholder="$.">
                      <small>Isi Owner Estimate($).</small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal_owner_estimate">Tanggal Owner Estimate :</label>
                  <input type="date" name="tanggal_owner_estimate" class="form-control form-control-user" id="tanggal_owner_estimate" placeholder="xxxx">
                  <small>Isi tanggal Owner Estimate.</small>
                </div>
                <div class="form-group">
                  <label>Harga PO :</label>
                  <div class="row mx-auto">
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="harga_po_rp">IDR :</label>
                      <input type="text" name="harga_po_rp" class="form-control form-control-user" id="harga_po_rp" placeholder="Rp.">
                      <small>Isi harga PO(Rp).</small>
                    </div>
                    <div class="font-weight-normal col-sm-2 text-center">
                      <p class="mt-5">
                        <i class="fas fa-sync-alt"></i>
                      </p>
                    </div>
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="harga_po_usd">USD :</label>
                      <input type="text" name="harga_po_usd" class="form-control form-control-user" id="harga_po_usd" placeholder="$.">
                      <small>Isi harga PO($).</small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Total Harga :</label>
                  <div class="row mx-auto">
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="total_harga_rp">IDR :</label>
                      <input type="text" name="total_harga_rp" class="form-control form-control-user" id="total_harga_rp" placeholder="Rp.">
                      <small>Isi total harga (Rp).</small>
                    </div>
                    <div class="font-weight-normal col-sm-2 text-center">
                      <p class="mt-5">
                        <i class="fas fa-sync-alt"></i>
                      </p>
                    </div>
                    <div class="col-sm-5 text-center">
                      <label class="font-weight-normal" for="total_harga_usd">USD :</label>
                      <input type="text" name="total_harga_usd" class="form-control form-control-user" id="total_harga_usd" placeholder="$.">
                      <small>Isi total harga($).</small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kuantum">Kuantum :</label>
                  <input type="text" name="kuantum" class="form-control form-control-user" id="kuantum" placeholder="xxxx">
                  <small>Isi kuantum.</small>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan :</label>
                  <select name="satuan" class="form-control form-control-user" id="satuan" size="0">
                    <option value="-">-</option>
                    <option value="Kilogram (Kg)">Kilogram (Kg)</option>
                    <option value="Ton">Ton</option>
                    <option value="Liter (L)">Liter (L)</option>
                  </select>
                  <small>Isi satuan.</small>
                </div>
                <div class="form-group">
                  <label for="status">Status :</label>
                  <input type="text" name="status" class="form-control form-control-user" id="status">
                  <small>Isi status.</small>
                </div>
                <hr>
                <small class="font-weight-bold">Note : Mohon perhatikan setiap data yang anda inputkan, karena data akan tersimpan di basis data.</small>
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block w-50 mt-4 mx-auto">
                  Kirim
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript" src="js/tambahTransaksi.js"></script>
</body>

</html>
