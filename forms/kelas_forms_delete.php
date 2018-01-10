
<?php

include '../koneksi/koneksi.php';


$id = $_REQUEST['id'];

$sql = mysqli_query($conn, "DELETE from  kelas where id='$id'");



?>

