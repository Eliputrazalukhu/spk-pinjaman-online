<?php
include 'header.php';
include 'koneksi.php';
?>


<h3 class="mb-4">
Riwayat Hasil Analisis Naive Bayes
</h3>



<?php

$layak = mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='LAYAK'"

)

);


$tidak = mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='TIDAK LAYAK'"

)

);

?>


<div class="row mb-4">


<div class="col-md-4">


<div class="card shadow">

<div class="card-body text-center">

<h5>Total Analisis</h5>

<h2>

<?= $layak+$tidak ?>

</h2>

</div>

</div>


</div>



<div class="col-md-4">


<div class="card shadow">

<div class="card-body text-center">

<h5 class="text-success">

Layak

</h5>

<h2>

<?= $layak ?>

</h2>

</div>

</div>


</div>



<div class="col-md-4">


<div class="card shadow">

<div class="card-body text-center">

<h5 class="text-danger">

Tidak Layak

</h5>

<h2>

<?= $tidak ?>

</h2>

</div>

</div>


</div>


</div>





<div class="card shadow">


<div class="card-header bg-primary text-white">

Data Riwayat Analisis

</div>



<div class="card-body">


<table class="table table-bordered table-striped">


<thead class="table-primary">

<tr>

<th>No</th>
<th>Nama</th>
<th>Pekerjaan</th>
<th>Penghasilan</th>
<th>Prob Layak</th>
<th>Prob Tidak</th>
<th>Keputusan</th>
<th>Tanggal</th>

</tr>

</thead>



<tbody>


<?php


$no=1;


$data=mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
ORDER BY id_hasil DESC"

);



while($d=mysqli_fetch_array($data))
{


?>


<tr>


<td><?= $no++ ?></td>


<td><?= $d['nama_nasabah'] ?></td>


<td><?= $d['pekerjaan'] ?></td>


<td><?= $d['penghasilan'] ?></td>


<td>

<?= round($d['prob_layak'],4) ?>

</td>


<td>

<?= round($d['prob_tidak_layak'],4) ?>

</td>


<td>


<?php

if($d['keputusan']=="LAYAK")

{

echo "

<span class='badge bg-success'>

LAYAK

</span>

";

}

else

{

echo "

<span class='badge bg-danger'>

TIDAK LAYAK

</span>

";

}

?>


</td>


<td>

<?= $d['tanggal'] ?>

</td>


</tr>



<?php } ?>


</tbody>


</table>


</div>


</div>




<br>



<!-- GRAFIK -->


<div class="card shadow">


<div class="card-header bg-success text-white">

Grafik Hasil Keputusan Naive Bayes

</div>



<div class="card-body">


<div style="width:400px;margin:auto">


<canvas id="hasilChart"></canvas>


</div>


</div>


</div>




<script>


new Chart(

document.getElementById('hasilChart'),

{


type:'pie',


data:{


labels:[

'Layak',
'Tidak Layak'

],


datasets:[{


data:[

<?= $layak ?>,

<?= $tidak ?>

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

include 'footer.php';

?>