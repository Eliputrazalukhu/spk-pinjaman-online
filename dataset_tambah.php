<?php
include 'header.php';
include 'koneksi.php';

if(isset($_POST['simpan']))
{

mysqli_query(
$koneksi,

"INSERT INTO dataset
VALUES(
NULL,
'$_POST[nama]',
'$_POST[pekerjaan]',
'$_POST[penghasilan]',
'$_POST[tanggungan]',
'$_POST[jumlah_pinjaman]',
'$_POST[lama_pinjam]',
'$_POST[status]'
)"
);

echo "
<script>
alert('Data berhasil disimpan');
location='dataset.php';
</script>
";

}
?>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Tambah Dataset

</div>

<div class="card-body">

<form method="post">

<div class="mb-3">

<label>Nama Nasabah</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Pekerjaan</label>

<select
name="pekerjaan"
class="form-control">

<option>Tetap</option>
<option>Tidak Tetap</option>

</select>

</div>

<div class="mb-3">

<label>Penghasilan</label>

<select
name="penghasilan"
class="form-control">

<option>Tinggi</option>
<option>Sedang</option>
<option>Rendah</option>

</select>

</div>

<div class="mb-3">

<label>Tanggungan</label>

<select
name="tanggungan"
class="form-control">

<option>Sedikit</option>
<option>Sedang</option>
<option>Banyak</option>

</select>

</div>

<div class="mb-3">

<label>Jumlah Pinjaman</label>

<select
name="jumlah_pinjaman"
class="form-control">

<option>Kecil</option>
<option>Sedang</option>
<option>Besar</option>

</select>

</div>

<div class="mb-3">

<label>Lama Pinjaman</label>

<select
name="lama_pinjam"
class="form-control">

<option>12 Bulan</option>
<option>24 Bulan</option>
<option>36 Bulan</option>

</select>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option>Layak</option>
<option>Tidak Layak</option>

</select>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

<a href="dataset.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<?php include 'footer.php'; ?>