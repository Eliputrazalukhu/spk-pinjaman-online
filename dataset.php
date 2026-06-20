<?php
include 'header.php';
include 'koneksi.php';
?>

<div class="d-flex justify-content-between mb-3">

<h3>Data Dataset</h3>

<a href="dataset_tambah.php"
class="btn btn-primary">

+ Tambah Dataset

</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Nama</th>
<th>Pekerjaan</th>
<th>Penghasilan</th>
<th>Tanggungan</th>
<th>Pinjaman</th>
<th>Lama</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data=mysqli_query(
$koneksi,
"SELECT * FROM dataset"
);

while($d=mysqli_fetch_array($data))
{
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_nasabah'] ?></td>

<td><?= $d['pekerjaan'] ?></td>

<td><?= $d['penghasilan'] ?></td>

<td><?= $d['tanggungan'] ?></td>

<td><?= $d['jumlah_pinjaman'] ?></td>

<td><?= $d['lama_pinjam'] ?></td>

<td>

<?php
if($d['status']=="Layak"){
echo '<span class="badge bg-success">Layak</span>';
}else{
echo '<span class="badge bg-danger">Tidak Layak</span>';
}
?>

</td>

<td>

<a href="dataset_edit.php?id=<?= $d['id_dataset'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="dataset_hapus.php?id=<?= $d['id_dataset'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus Data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include 'footer.php'; ?>