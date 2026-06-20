<?php
include 'header.php';
include 'koneksi.php';
?>

<h3 class="mb-4">
Decision Tree Kelayakan Pinjaman
</h3>

<div class="card shadow">

<div class="card-header bg-warning">

Aturan Pohon Keputusan

</div>

<div class="card-body">

<?php

$data=mysqli_query(
$koneksi,
"SELECT * FROM decision_tree"
);

while($d=mysqli_fetch_array($data))
{

?>

<div class="alert alert-light border">

<b><?= $d['atribut'] ?></b>

=

<b><?= $d['nilai'] ?></b>

→

<?php

if($d['hasil']=="Layak")
{
echo "<span class='badge bg-success'>Layak</span>";
}
else
{
echo "<span class='badge bg-danger'>Tidak Layak</span>";
}

?>

<br>

<small>

<?= $d['keterangan'] ?>

</small>

</div>

<?php } ?>

</div>

</div>
<br>

<div class="card shadow">

<div class="card-header bg-success text-white">

Visualisasi Pohon Keputusan

</div>

<div class="card-body text-center">

<pre>

                Penghasilan
                     │
          ┌──────────┴──────────┐
          │                     │
       Tinggi               Rendah
          │                     │
       Layak            Tidak Layak


</pre>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header bg-primary text-white">

Grafik Rule Decision Tree

</div>

<div class="card-body">

<div style="width:450px;margin:auto">

<canvas id="grafikTree"></canvas>

</div>

</div>

</div>

<script>

new Chart(
document.getElementById('grafikTree'),
{

type:'pie',

data:{

labels:[
'Rule Layak',
'Rule Tidak Layak'
],

datasets:[{

data:[

<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM decision_tree
WHERE hasil='Layak'"
)
);
?>,

<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM decision_tree
WHERE hasil='Tidak Layak'"
)
);
?>

],

backgroundColor:[
'#198754',
'#dc3545'
]

}]

}

}

);

</script>