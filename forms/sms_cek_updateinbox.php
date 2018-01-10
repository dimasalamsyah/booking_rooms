<?php

$query_updateinbox = mysqli_query($conn, "UPDATE inbox SET Processed = 'true' WHERE ID = '$id_getinbox'");

if($query_updateinbox){
	echo "berhasil upadte inbox"."<br>";
}else{
	echo "gagal upadte inbox"."<br>";
}

?>