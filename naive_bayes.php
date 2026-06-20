<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">Analisis Kelayakan Pinjaman (Naive Bayes)</h3>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Form Analisis

</div>

<div class="card-body">

<form method="post">

<div class="row">

<div class="col-md-6">

<label>Nama Nasabah</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="col-md-6">

<label>Pekerjaan</label>

<select
name="pekerjaan"
class="form-control">

<option>Tetap</option>
<option>Tidak Tetap</option>

</select>

</div>

</div>

<br>

<div class="row">

<div class="col-md-4">

<label>Penghasilan</label>

<select
name="penghasilan"
class="form-control">

<option>Tinggi</option>
<option>Sedang</option>
<option>Rendah</option>

</select>

</div>

<div class="col-md-4">

<label>Tanggungan</label>

<select
name="tanggungan"
class="form-control">

<option>Sedikit</option>
<option>Sedang</option>
<option>Banyak</option>

</select>

</div>

<div class="col-md-4">

<label>Jumlah Pinjaman</label>

<select
name="jumlah_pinjaman"
class="form-control">

<option>Kecil</option>
<option>Sedang</option>
<option>Besar</option>

</select>

</div>

</div>

<br>

<button
type="submit"
class="btn btn-success"
name="analisis">

Analisis Naive Bayes

</button>

</form>

</div>

</div>

<?php

if(isset($_POST['analisis']))
{

$nama=$_POST['nama'];
$pekerjaan=$_POST['pekerjaan'];
$penghasilan=$_POST['penghasilan'];
$tanggungan=$_POST['tanggungan'];
$jumlah_pinjaman=$_POST['jumlah_pinjaman'];

$total_layak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE kelas='Layak'"
)
);

$total_tidak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE kelas='Tidak Layak'"
)
);

$total_data=
$total_layak+
$total_tidak;

$pekerjaan_layak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE pekerjaan='$pekerjaan'
AND kelas='Layak'"
)
);

$pekerjaan_tidak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE pekerjaan='$pekerjaan'
AND kelas='Tidak Layak'"
)
);

$penghasilan_layak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE penghasilan='$penghasilan'
AND kelas='Layak'"
)
);

$penghasilan_tidak=mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training
WHERE penghasilan='$penghasilan'
AND kelas='Tidak Layak'"
)
);

$p_layak =
($total_layak/$total_data)
*
(($pekerjaan_layak+1)/($total_layak+2))
*
(($penghasilan_layak+1)/($total_layak+2));

$p_tidak =
($total_tidak/$total_data)
*
(($pekerjaan_tidak+1)/($total_tidak+2))
*
(($penghasilan_tidak+1)/($total_tidak+2));

if($p_layak > $p_tidak)
{
$hasil="LAYAK";
}
else
{
$hasil="TIDAK LAYAK";
}

mysqli_query(
$koneksi,

"INSERT INTO hasil_analisis
(
nama_nasabah,
pekerjaan,
penghasilan,
tanggungan,
jumlah_pinjaman,
prob_layak,
prob_tidak_layak,
keputusan
)

VALUES
(
'$nama',
'$pekerjaan',
'$penghasilan',
'$tanggungan',
'$jumlah_pinjaman',
'$p_layak',
'$p_tidak',
'$hasil'
)"
);

?>

<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Hasil Analisis

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>Nama</th>
<td><?= $nama ?></td>
</tr>

<tr>
<th>Probabilitas Layak</th>
<td><?= round($p_layak,5) ?></td>
</tr>

<tr>
<th>Probabilitas Tidak Layak</th>
<td><?= round($p_tidak,5) ?></td>
</tr>

<tr>
<th>Keputusan</th>
<td>

<?php

if($hasil=="LAYAK")
{
echo "<span class='badge bg-success'>LAYAK</span>";
}
else
{
echo "<span class='badge bg-danger'>TIDAK LAYAK</span>";
}

?>

</td>
</tr>

</table>

<h5>Konsep Naive Bayes</h5>


::contentReference[oaicite:0]{index=0}


<br><br>

<div style="width:400px; margin:auto;">

<canvas id="grafikNB"></canvas>

</div>

</div>

</div>

<script>

new Chart(
document.getElementById('grafikNB'),
{

type:'pie',

data:{

labels:[
'Layak',
'Tidak Layak'
],

datasets:[{

data:[
<?= $p_layak ?>,
<?= $p_tidak ?>
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

<?php
}
?>

<?php include 'footer.php'; ?>