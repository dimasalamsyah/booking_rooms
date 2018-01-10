<?php
session_start();
	date_default_timezone_set('Asia/Jakarta');
	$pic = $_SESSION['pic'];

	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tax_invoiceno';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;
	$result = array();

	include("../koneksi/koneksi.php");

	$query_d = mysqli_query($conn, "SELECT * from karyawan");

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
		<h2 align='center'>Laporan Karyawan</h2>
		
		<table align='center'>";
		$nourut = 1;
		$content .= "
		<tbody align='' >

			<tr>
    			<th style='width:30px;'  align='center' >No</th>
    			<th style='width:100px;' valign='' align='center' >Kode Karyawan</th>
				<th style='width:100px;' valign='' align='center' >Nama Karyawan</th>
				<th style='width:100px;' valign='' align='center' >Tanggal Lahir</th>
				<th style='width:100px;' valign='' align='center' >Tempat Lahir</th>
				<th style='width:200px;' align='center'>Alamat</th>
				<th style='width:100px;' valign='' align='center' >No Tlp</th>
   			</tr>
   		</tbody>";

while($row=mysqli_fetch_array($query_d))
{
$content .= "
	<tr>
		<td align='center' valign='middle'>".$nourut."</td>
		<td align='center' valign='middle'>".$row['kode_karyawan']."</td>
		<td align='center' valign='middle'>".$row['nama_karyawan']."</td>
		<td align='center' valign='middle'>".$row['tanggal_lahir']."</td>
		<td align='center' valign='middle'>".$row['tempat_lahir']."</td>
		<td align='center' valign='middle'>".$row['alamat']."</td>
		<td align='center' valign='middle'>".$row['no_tlp']."</td>
	</tr>
	";
	$nourut++;
}

$content .= "</table></div></page>";
//echo $content;
    require_once(dirname(__FILE__).'/../class/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','en');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('laporan_karyawan.pdf');
?>