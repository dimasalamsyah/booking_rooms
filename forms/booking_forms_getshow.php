  <?php 
  	include '../koneksi/koneksi.php';

  	$tanggal = $_REQUEST['tanggal'];
  	$jam = $_REQUEST['jam'];

  	$query_show = mysqli_query($conn, "SELECT c.nama_ruangan, a.tgl_booking, a.jam, a.atas_nama, a.keterangan, a.kode_ruangan, a.kode_jam, 
          b.kode_pembooking, b.jabatan
          from transaksi_detail a
					left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
					left join ruangan c on c.kode_ruangan = a.kode_ruangan
					where a.tgl_booking='$tanggal' and a.jam='$jam' order by a.kode_transaksi desc ");
  	$query_addroom = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by jenis_ruangan asc");

  		while ($row_show = mysqli_fetch_array($query_show)) {
  			$tgl_detail = $row_show[1]; 
  			$jam_detail = $row_show[2];
  			$atas_detail = $row_show[3];
  			$ket_detail = $row_show[4];
  			$ruangan_detail = $row_show[5];
        $kodejam_detail = $row_show[6];
        $kodepembooking_detail = $row_show[7];
        $jab_detail = $row_show[8];

  			/*harus di substring kalau mau taruh di parameter*/
  			$year = substr($tgl_detail, 0,4);
  			$month = substr($tgl_detail, 5,2);
  			$day = substr($tgl_detail, 8);
  			$kode_ruangan = substr($ruangan_detail, 2,4);

  			$hasil_date = $year.$month.$day;
  			$tambahan_angka = 1; /*digunakan untuk kode id agar sama*/
  			$detail_all = $tambahan_angka.$kode_ruangan.$hasil_date.$jam_detail;

  			echo  $data = "<div class='alert alert-info col-md-2' style='margin-left:5px; margin-bottom:5px; width:12%; cursor:pointer;' onclick='show_rooms(".$detail_all.")'>
  			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_show[0]."</strong>
  			<form action='' method='post' class='frm_1003201603249'>
  				<input id='tgl_".$detail_all."' style='display:block;' value=".$tgl_detail.">
  				<input id='jam_".$detail_all."' name='jam_".$detail_all."' style='display:block;' value=".$kodejam_detail.">
  				<input id='ruangan_".$detail_all."' style='display:block;' value=".$ruangan_detail.">
          <input id='pembooking_".$detail_all."' style='display:block;' value=".$kodepembooking_detail.">
          <input id='jabatan_".$detail_all."' style='display:block;' value=".$jab_detail.">
  				<input id='ket_".$detail_all."' style='display:block;' value=".$ket_detail.">
  				<button id='bv' type='button'>submit</button>
  			</form>
  			
  			</div>";
  		

}
 ?>
