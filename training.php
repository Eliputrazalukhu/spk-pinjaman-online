<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">Data Training Naive Bayes</h3>

<?php

$total_layak = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE kelas='Layak'"
)
);

$total_tidak = mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE kelas='Tidak Layak'"
)
);

$total_training =
$total_layak +
$total_tidak;

?>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Total Training</h5>

<h2><?= $total_training ?></h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Layak</h5>

<h2 class="text-success">

<?= $total_layak ?>

</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h5>Tidak Layak</h5>

<h2 class="text-danger">

<?= $total_tidak ?>

</h2>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Tabel Data Training

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-primary">

<tr>

<th>No</th>
<th>Pekerjaan</th>
<th>Penghasilan</th>
<th>Tanggungan</th>
<th>Pinjaman</th>
<th>Lama</th>
<th>Kelas</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data=mysqli_query(
$koneksi,
"SELECT * FROM dataset_training"
);

while($d=mysqli_fetch_array($data))
{

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['pekerjaan'] ?></td>

<td><?= $d['penghasilan'] ?></td>

<td><?= $d['tanggungan'] ?></td>

<td><?= $d['jumlah_pinjaman'] ?></td>

<td><?= $d['lama_pinjam'] ?></td>

<td>

<?php

if($d['kelas']=="Layak")
{
echo "<span class='badge bg-success'>Layak</span>";
}
else
{
echo "<span class='badge bg-danger'>Tidak Layak</span>";
}

?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Grafik Dataset Training

</div>

<div class="card-body">

<div style="width:400px; margin:auto;">

<canvas id="grafikTraining"></canvas>

</div>

</div>

</div>

<script>

new Chart(
document.getElementById('grafikTraining'),
{

type:'pie',

data:{

labels:[
'Layak',
'Tidak Layak'
],

datasets:[{

data:[
<?= $total_layak ?>,
<?= $total_tidak ?>
],

backgroundColor:[
'#198754',
'#dc3545'
]

}]

},

options:{

responsive:true,

plugins:{

legend:{
position:'bottom'
}

}

}

}

);

</script>

<?php include 'footer.php'; ?>