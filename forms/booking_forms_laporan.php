<?php
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	$pic = $_SESSION['pic'];

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;
	$result = array();

	$tgl_awal = @$_REQUEST['awal'];
	$tgl_akhir = @$_REQUEST['akhir'];

	if($tgl_awal!=""){
		$tgl_isi = "a.tgl BETWEEN '$tgl_awal' and '$tgl_akhir' and ";
		$periode = "<h4>Periode: $tgl_awal - $tgl_akhir</h4>";
	}else{
		$tgl_isi = "";
		$periode = "";
	}

	$where = "where $tgl_isi a.id!='' ";

	include("../koneksi/koneksi.php");




	$query_cek = mysqli_query($conn,"SELECT a.*, b.nama_ruangan, c.jam, d.nama_pemesan, e.nama_karyawan FROM pemesanan_detail a
									LEFT JOIN ruangan b on b.kode_ruangan = a.kode_ruangan
									LEFT JOIN jam c on c.kode_jam = a.kode_jam
									LEFT JOIN pemesan d on d.kode_pemesan = a.kode_pembooking
									LEFT JOIN karyawan e on e.kode_karyawan = a.kode_pembooking
									$where");

	$date=date("d M y / H:i:s",time());

$content = "	
	<style> 
		table {
			border-collapse: collapse;
			padding:4px;
			font-size:11px;
		}
		table, th, td {
			border: 1px solid black;	
		}
		th {
			background-color: #ffffff;
			color: black;

		}
	</style>
	

	<page>
	<div style='position:absolute;margin-top:10px;'>
		<img src='../images/logo.jpg' alt='#' style='width:100px;'/>
	</div>	

	<div style='margin-top:40px;margin-left:920px;font-size:10px'>	
		<p align='' >Bekasi, ".$date."<br>Print By : ".$pic."</p>		
	</div>

	<page_footer>
		<div style='width:100%;text-align:right;margin-bottom:100%'>page [[page_cu]] of [[page_nb]]</div>
    </page_footer> 

	<div style='margin-top:40px'>	
		<h2 align='center'>Laporan Pemesanan Ruangan</h2>
		<div style='margin-top:-10px; text-align:center;'>$periode</div>
		
		<table align='center'>";
		$nourut = 1;
		$content .= "
		<tbody align='' >

			<tr>
    			<th style='width:30px;'  align='center' >No</th>
    			<th style='width:' valign='' align='center' >Nama Pembooking</th>
				<th style='width:' valign='' align='center' >Jabatan</th>
				<th style='width:' valign='' align='center' >Nama Ruangan</th>
				<th style='width:' valign='' align='center' >Jam</th>
				<th style='width:' align='center'>Tanggal</th>
				<th style='width:' valign='' align='center' >Keterangan</th>
				<th style='width:' valign='' align='center' >User</th>
   			</tr>
   		</tbody>";

while($row=mysqli_fetch_array($query_cek))
{
	/*if($row['nama_pemesan']!=''){
		$pembooking = $row['nama_pemesan'];
	}
	if($row['nama']!=''){
		$pembooking = $row['nama'];
	}*/

	$pembooking = $row['nama_pembooking'];

$content .= "
	<tr>
		<td align='center' valign='middle'>".$nourut."</td>
		<td align='center' valign='middle'>".$pembooking."</td>
		<td align='center' valign='middle'>".$row['posisi']."</td>
		<td align='center' valign='middle'>".$row['nama_ruangan']."</td>
		<td align='center' valign='middle'>".$row['jam']."</td>
		<td align='center' valign='middle'>".$row['tgl']."</td>
		<td align='center' valign='middle'>".$row['ket']."</td>
		<td align='center' valign='middle'>".$row['ket']."</td>
	</tr>
	";
	$nourut++;
}

$content .= "</table></div></page>";
//echo $content;
    require_once(dirname(__FILE__).'/../class/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','en');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('laporan_dosen.pdf');
?>