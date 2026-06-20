<?php
include 'header.php';
include 'koneksi.php';
?>

<h2 class="mb-4">
Dashboard SPK Kelayakan Pinjaman
</h2>

<div class="row">

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h5>Dataset</h5>

<h2>
<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset"
)
);
?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h5>Training</h5>

<h2>
<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM dataset_training"
)
);
?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h5>Decision Tree</h5>

<h2>
<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM decision_tree"
)
);
?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h5>Analisis</h5>

<h2>
<?=
mysqli_num_rows(
mysqli_query(
$koneksi,
"SELECT * FROM hasil_analisis"
)
);
?>
</h2>

</div>

</div>

</div>

</div>

<?php include 'footer.php'; ?>