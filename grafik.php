<?php
include 'header.php';
include 'koneksi.php';
?>


<h3 class="mb-4">
Dashboard Grafik SPK Pinjaman
</h3>


<div class="row">


<!-- Grafik Dataset Training -->

<div class="col-md-4">

<div class="card shadow">


<div class="card-header bg-primary text-white">

Dataset Training

</div>


<div class="card-body">


<canvas id="trainingChart"></canvas>


</div>


</div>

</div>



<!-- Grafik Naive Bayes -->

<div class="col-md-4">

<div class="card shadow">


<div class="card-header bg-success text-white">

Hasil Naive Bayes

</div>


<div class="card-body">


<canvas id="naiveChart"></canvas>


</div>


</div>

</div>



<!-- Grafik Decision Tree -->

<div class="col-md-4">

<div class="card shadow">


<div class="card-header bg-warning">

Decision Tree

</div>


<div class="card-body">


<canvas id="treeChart"></canvas>


</div>


</div>

</div>


</div>



<?php


// DATA TRAINING

$layak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM dataset_training
WHERE kelas='Layak'"

)

);


$tidak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM dataset_training
WHERE kelas='Tidak Layak'"

)

);



// HASIL ANALISIS


$hasil_layak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='LAYAK'"

)

);



$hasil_tidak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='TIDAK LAYAK'"

)

);



// TREE


$tree_layak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM decision_tree
WHERE hasil='Layak'"

)

);


$tree_tidak=mysqli_num_rows(

mysqli_query(
$koneksi,

"SELECT * FROM decision_tree
WHERE hasil='Tidak Layak'"

)

);



?>


<script>


// DATA TRAINING

new Chart(
document.getElementById('trainingChart'),
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

plugins:{

legend:{

position:'bottom'

}

}

}

}

);




// NAIVE BAYES


new Chart(
document.getElementById('naiveChart'),
{

type:'pie',

data:{

labels:[

'Layak',
'Tidak Layak'

],

datasets:[{

data:[

<?= $hasil_layak ?>,
<?= $hasil_tidak ?>

],

backgroundColor:[

'#0d6efd',
'#ffc107'

]

}]

},

options:{

plugins:{

legend:{

position:'bottom'

}

}

}

}

);




// DECISION TREE


new Chart(
document.getElementById('treeChart'),
{

type:'doughnut',

data:{

labels:[

'Rule Layak',
'Rule Tidak Layak'

],

datasets:[{

data:[

<?= $tree_layak ?>,
<?= $tree_tidak ?>

],

backgroundColor:[

'#20c997',
'#dc3545'

]

}]

},

options:{

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