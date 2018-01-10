<?php

$query_saveoutbox = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                                 ('".$replace_num."', '".$feedback_ketersediaan."')");

if($query_saveoutbox){
	echo "berhasil save outbox"."<br>";
}else{
	echo "gagal save outbox"."<br>";
}

?>