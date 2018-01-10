<?php

include 'koneksi/koneksi.php';

$result = mysqli_query($conn,"SELECT * from pemesanan_detail");

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

?>