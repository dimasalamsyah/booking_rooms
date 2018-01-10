<?php 

include '../koneksi/koneksi.php';

$id = $_REQUEST['id'];

$save = mysqli_query($conn, "DELETE from matakuliah where id='$id' ");

?>