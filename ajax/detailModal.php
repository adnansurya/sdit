<?php
require "../functions.php";

$row = $_GET["row"];
$data = query("SELECT * FROM transaksi WHERE id_transaksi = $row ;")[0];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <button type="submit" class="btn btn-warning mr-3 mt-3">Edit</button>
        </li>
        <li class="nav-item">
          <form method="post">
            <input type="hidden" name="id_transaksi" value="<?= $data["id_transaksi"]; ?>">
          	<button type="submit" name="hapus" class="btn btn-danger mr-3 mt-3">Hapus</button>
          </form>
        </li>
        <li class="nav-item">
        	<button type="submit" class="btn btn-secondary mr-3 mt-3" data-dismiss="modal">Tutup</button>
        </li>
      </ul>
    </div>
  </nav>
<form class="user" method="post">
  <input type="hidden" name="id_transaksi" value="<?= $data["id_transaksi"]; ?>">
    <div class="form-group">
      <label for="kode_perusahaan">Kode Perusahaan :</label>
      <input type="text" name="kode_perusahaan" class="form-control form-control-user" id="kode_perusahaan" value="<?= $data["kode_perusahaan"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="kode_badan">Kode Badan :</label>
      <select name="kode_badan" class="form-control form-control-user" id="kode_badan" size="0" disabled>
        <option value="<?= $data["kode_badan"]; ?>">-</option>
        <option value="PT">PT</option>
        <option value="CV">CV</option>
        <option value="Perorangan">Perorangan</option>
        <option value="Pte Ltd">Pte Ltd</option>
      </select>
    </div>
    <div class="form-group">
      <label for="nama_perusahaan">Nama Perusahaan :</label>
      <input type="text" name="nama_perusahaan" class="form-control form-control-user" id="nama_perusahaan" value="<?= $data["nama_perusahaan"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat :</label>
      <input type="text" name="alamat" class="form-control form-control-user" id="alamat" value="<?= $data["alamat"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="provinsi">Provinsi :</label>
      <input type="text" name="provinsi" class="form-control form-control-user" id="provinsi" value="<?= $data["provinsi"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="negara">Negara :</label>
      <input type="text" name="negara" class="form-control form-control-user" id="negara" value="<?= $data["negara"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="no_telp">No. Telp :</label>
      <input type="text" name="no_telp" class="form-control form-control-user" id="no_telp" value="<?= $data["no_telp"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="nama_barang">Nama Barang / Jasa :</label>
      <input type="text" name="nama_barang" class="form-control form-control-user" id="nama_barang" value="<?= $data["nama_barang"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="no_pr">No. PR :</label>
      <input type="text" name="no_pr" class="form-control form-control-user" id="no_pr"value="<?= $data["no_pr"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="tanggal_pr">Tanggal PR :</label>
      <input type="date" name="tanggal_pr" class="form-control form-control-user" id="tanggal_pr" value="<?= $data["tanggal_pr"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="no_po">No. PO :</label>
      <input type="text" name="no_po" class="form-control form-control-user" id="no_po" value="<?= $data["no_po"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="tanggal_po">Tanggal PO :</label>
      <input type="date" name="tanggal_po" class="form-control form-control-user" id="tanggal_po" value="<?= $data["tanggal_po"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label>Owner Estimate :</label>
      <div class="row mx-auto">
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="owner_estimate_rp">IDR :</label>
          <input type="text" name="owner_estimate_rp" class="form-control form-control-user" id="owner_estimate_rp" value="<?= $data["owner_estimate_rp"]; ?>" disabled>
        </div>
        <div class="font-weight-normal col-sm-2 text-center">
          <p class="mt-5">
            <i class="fas fa-sync-alt"></i>
          </p>
        </div>
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="owner_estimate_usd">USD :</label>
          <input type="text" name="owner_estimate_usd" class="form-control form-control-user" id="owner_estimate_usd" value="<?= $data["owner_estimate_usd"]; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="tanggal_owner_estimate">Tanggal Owner Estimate :</label>
      <input type="date" name="tanggal_owner_estimate" class="form-control form-control-user" id="tanggal_owner_estimate" value="<?= $data["tanggal_owner_estimate"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label>Harga PO :</label>
      <div class="row mx-auto">
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="harga_po_rp">IDR :</label>
          <input type="text" name="harga_po_rp" class="form-control form-control-user" id="harga_po_rp" value="<?= $data["harga_po_rp"]; ?>" disabled>
        </div>
        <div class="font-weight-normal col-sm-2 text-center">
          <p class="mt-5">
            <i class="fas fa-sync-alt"></i>
          </p>
        </div>
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="harga_po_usd">USD :</label>
          <input type="text" name="harga_po_usd" class="form-control form-control-user" id="harga_po_usd" value="<?= $data["harga_po_usd"]; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Total Harga :</label>
      <div class="row mx-auto">
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="total_harga_rp">IDR :</label>
          <input type="text" name="total_harga_rp" class="form-control form-control-user" id="total_harga_rp" value="<?= $data["total_harga_rp"]; ?>" disabled>
        </div>
        <div class="font-weight-normal col-sm-2 text-center">
          <p class="mt-5">
            <i class="fas fa-sync-alt"></i>
          </p>
        </div>
        <div class="col-sm-5 text-center">
          <label class="font-weight-normal" for="total_harga_usd">USD :</label>
          <input type="text" name="total_harga_usd" class="form-control form-control-user" id="total_harga_usd" value="<?= $data["total_harga_usd"]; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="kuantum">Kuantum :</label>
      <input type="text" name="kuantum" class="form-control form-control-user" id="kuantum" value="<?= $data["kuantum"]; ?>" disabled>
    </div>
    <div class="form-group">
      <label for="satuan">Satuan :</label>
      <select name="satuan" class="form-control form-control-user" id="satuan" size="0" disabled>
        <option value="<?= $data["satuan"]; ?>">-</option>
        <option value="Kilogram (Kg)">Kilogram (Kg)</option>
        <option value="Ton">Ton</option>
        <option value="Liter (L)">Liter (L)</option>
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status :</label>
      <input type="text" name="status" class="form-control form-control-user" id="status" value="<?= $data["status"]; ?>" disabled>
    </div>
    <hr>
    <small class="font-weight-bold">Note : Mohon perhatikan setiap data yang anda inputkan, karena data akan tersimpan di basis data.</small>
    <button type="submit" name="simpan" class="btn btn-success btn-user btn-block w-50 mt-4 mx-auto d-none">
      Simpan
    </button>
  </form>

