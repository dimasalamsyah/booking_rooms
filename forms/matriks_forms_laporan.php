<?php
require_once '../class/phpexcel/PHPExcel.php';
include("../koneksi/koneksi.php");

$kode_ruangan = @$_REQUEST['ruangan'];

if(!isset($kode_ruangan)){
    $where = "";
}else{
    $where = "where kode_ruangan='$kode_ruangan'";
}
/*$sql = mysqli_query($conn, "SELECT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN dosen c on a.kode_dosen=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam
                             ");*/

$sql = mysqli_query($conn, "SELECT * from ruangan $where order by nama_ruangan asc ");

$sql_t = mysqli_query($conn, "SELECT mulai, habis from penjadwalan_detail");
$row_t = mysqli_fetch_array($sql_t);

$tgl_mulai = strtotime($row_t['0']);
$tgl_akhir = strtotime($row_t['1']);

$mulai = date('Y',$tgl_mulai);
$akhir = date('Y',$tgl_akhir);


$count = mysqli_num_rows($sql);

$isi = 1 + $count;

$objPHPExcel = new PHPExcel(); 

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1', "Penjadwalan Ruangan Politeknik LP3I Jakarta Kampus Bekasi")
            ->setCellValue('B2', "Tahun Ajaran ".$mulai." - ".$akhir);

$sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('B1')->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet = $objPHPExcel->getActiveSheet();
                        $sheet->mergeCells('B1:H1');
$sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('B2')->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet = $objPHPExcel->getActiveSheet();
                        $sheet->mergeCells('B2:H2');

$no=1;

$no_row1 = 4;
$isi1 = 5;
$isi_jam = 6;
$no_row3 = 4;

/*$no_row1 = 1;
$isi1 = 2;
$isi_jam = 3;
$no_row3 = 4;*/

while ($row = mysqli_fetch_array($sql)) {
    

    $sql_jam = mysqli_query($conn, "SELECT * from jam a");
    $rows_jam = mysqli_num_rows($sql_jam);

    $hh=0;

     $nama_ruangan = $row['nama_ruangan'];

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$no_row1, $nama_ruangan)
            ->setCellValue('B'.$isi1, "Senin")
            ->setCellValue('C'.$isi1, "Selasa")
            ->setCellValue('D'.$isi1, "Rabu")
            ->setCellValue('E'.$isi1, "Kamis")
            ->setCellValue('F'.$isi1, "Jumat")
            ->setCellValue('G'.$isi1, "Sabtu")
            ->setCellValue('H'.$isi1, "Minggu")
            ;


    while ($row1 = mysqli_fetch_array($sql_jam)) {

            $nama_ruangan = $row['nama_ruangan'];
            $kode_ruangan = $row['kode_ruangan'];

            $jam = $row1['jam']." WIB";
            $kode_jam = $row1['kode_jam'];

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$isi_jam, $jam)
            ;

        

                $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('B'.$no_row1)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->mergeCells('B'.$no_row1.':H'.$no_row1);

                $sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                
            //$isi1 = $rows_jam;


                  /*SENIN*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Senin' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('B'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('B'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('B'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }

                 /*Selasa*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Selasa' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('C'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('C'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('C'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }

                /*Rabu*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Rabu' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('D'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('D'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('D'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }
                
                /*Kamis*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Kamis' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('E'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('E'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('E'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }

                /*Jumat*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Jumat' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('F'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('F'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('F'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }


                /*Sabtu*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Sabtu' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen'");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('G'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('G'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('G'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }

                /*Minggu*/
                $sql_cek = mysqli_query($conn, "SELECT DISTINCT a.*, b.nama_ruangan, c.nama_pemesan, d.nama_kelas, e.mata_kuliah, f.jam  from penjadwalan_detail a 
                            left join ruangan b on b.kode_ruangan=a.kode_ruangan
                            LEFT JOIN pemesan c on c.kode_pemesan=a.kode_dosen
                            LEFT JOIN kelas d on d.id=a.kode_kelas
                            LEFT JOIN matakuliah e on e.id=a.kode_matakuliah
                            LEFT JOIN jam f on f.kode_jam=a.kode_jam where a.hari='Minggu' and a.kode_jam='$kode_jam' and a.kode_ruangan='$kode_ruangan' and c.jabatan='dosen' ");
                
                while ($row_cek = mysqli_fetch_array($sql_cek)) {
                        $nama_dosen = $row_cek['nama_pemesan'];
                        $mata_kuliah = $row_cek['mata_kuliah'];
                        $nama_kelas = $row_cek['nama_kelas'];

                        $senin = $nama_dosen."\n".$mata_kuliah."\n".$nama_kelas;

                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('H'.$isi_jam, $senin);

                        $sheet = $objPHPExcel->getActiveSheet();
                        $sheet->getStyle('H'.$isi_jam)->getAlignment()
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                        $sheet->getStyle('H'.$isi_jam)->getAlignment()->setWrapText(true);
                        
                        //$sheet->getStyle('A'.$isi_jam)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

                }


            

            $isi1++;
            $isi_jam++;
            //$no_row1++;
            //$no_row1 = $no_row1 + $rows_jam; 
            //$no_row1 = $no_row1 + $rows_jam;
            //$no_row1++;
            //$no_row1 = $rows_jam + $no_row1+3;
            //$no_row1 = $no_row1 + 1;
            //$no_row1 = $no_row1 + 2;
    }
   
    $no_row1++;

    //$no_row1 = $isi1 + $rows_jam;
    
    $isi_jam = $isi_jam + 2;
    $isi1 = $isi1 + 2;
    $no_row1 = $no_row1 + $rows_jam + 1;
    //s$isi1 = $no_row1 + 1;
    //$no_row1 = $no_row1 + 1;
}

for($col = 'A'; $col !== 'P'; $col++) {
    $objPHPExcel->getActiveSheet()
        ->getColumnDimension($col)
        ->setAutoSize(true);

   $objPHPExcel->getActiveSheet()->getRowDimension($col)->setRowHeight(-1);

}

 

$objPHPExcel->getDefaultStyle()
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Matriks Kelas');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="penjadwalan_kelas.xlsx"');

// Write file to the browser
$objWriter->save('php://output');
?>