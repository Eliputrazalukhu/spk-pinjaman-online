<?php

include 'koneksi.php';

$id=$_GET['id'];

mysqli_query(
$koneksi,
"DELETE FROM dataset
WHERE id_dataset='$id'"
);

header("location:dataset.php");

?>