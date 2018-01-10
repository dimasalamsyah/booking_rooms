<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">


<!-- javascript -->
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-typeahead.min.js"></script>
<script type="text/javascript" src="../js/jquery.mockjax.js"></script>
<script type="text/javascript" src="../js/bootstrap-popover-x.min.js"></script>
<script type="text/javascript" src="../js/chosen.jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>

<!-- datepicker -->
<script type="text/javascript" src="../datepicker/javascript/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../datepicker/css/metallic.css" type="text/css">



<?php 

include '../koneksi/koneksi.php';

?>							
							<tr id="kk">
						    	<th style="width:8%;" id="nn">Clock/Day</th>
						    	<th style="width:12%;" class="hari_cell"><?php

						    		/*mengambil nilai tanggal di url*/
						    		$datenow = $_REQUEST['datenow'];

						    		if(!isset($datenow)){
						    			$h_datenow = "now";
						    		}else{
						    			$h_datenow = $datenow;
						    		}

									$hari = (strtotime($h_datenow));
									$bulan = (strtotime($h_datenow));
									echo (date("l,", $hari) . "<br>");
									echo date("d F Y", $hari)."<br>";
									$get_date = date("Ymd", $hari);
									$get_date_cek = date("Y-m-d", $hari); ?></th>

									<!-- tanggal filter -->
						    	<th style="width:12%;" class=""><?php

									$hari1 = strtotime("+1 day", $hari);
									$bulan = strtotime("+1 day", $hari);
									echo date("l,", $hari1) . "<br>";
									echo $get_date3 = date("d F Y", $hari1); 
									$get_date1 = date("Ymd", $hari1);
									$get_date_cek1 = date("Y-m-d", $hari1);
									?>
								</th>
								<th style="width:12%;" class=""><?php
									
									$hari2 = strtotime("+2 day", $hari);
									$bulan = strtotime("+2 day", $hari);
									echo date("l,", $hari2) . "<br>";
									echo $get_date3 = date("d F Y", $hari2); 
									$get_date2 = date("Ymd", $hari1);
									$get_date_cek2 = date("Y-m-d", $hari2);
									?>
								</th>
								<th style="width:12%;" class=""><?php

									$hari3 = strtotime("+3 day", $hari);
									$bulan = strtotime("+3 day", $hari);
									echo date("l,", $hari3) . "<br>";
									echo $get_date3 = date("d F Y", $hari3); 
									$get_date3 = date("Ymd", $hari1);
									$get_date_cek3 = date("Y-m-d", $hari3);
									?>
								</th>
								<th style="width:12%;" class=""><?php

									$hari4 = strtotime("+4 day", $hari);
									$bulan = strtotime("+4 day", $hari);
									echo date("l,", $hari4) . "<br>";
									echo $get_date3 = date("d F Y", $hari4); 
									$get_date4 = date("Ymd", $hari1);
									$get_date_cek4 = date("Y-m-d", $hari4);
									?>
								</th>
								<th style="width:12%;" class=""><?php

									$hari5 = strtotime("+5 day", $hari);
									$bulan = strtotime("+5 day", $hari);
									echo date("l,", $hari5) . "<br>";
									echo $get_date3 = date("d F Y", $hari5); 
									$get_date5 = date("Ymd", $hari1);
									$get_date_cek5 = date("Y-m-d", $hari5);
									?>
								</th>
								<th style="width:12%;" class=""><?php

									$hari6 = strtotime("+6 day", $hari);
									$bulan = strtotime("+6 day", $hari);
									echo date("l,", $hari6) . "<br>";
									echo $get_date3 = date("d F Y", $hari6); 
									$get_date6 = date("Ymd", $hari1);
									$get_date_cek6 = date("Y-m-d", $hari6);
									?>
								</th>
						    </tr>
						    <?php

						    	$query_cell = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");

						     while ($row_cell = mysqli_fetch_array($query_cell)) {	 ?>
						    <tr class="load_content">	
						    	<th class="hh1" id="<?php echo $row_cell[0]; ?>" value="d" onclick="javascript:alert($('#<?php echo $row_cell[0]; ?>').html())"><?php echo $row_cell[1]; ?></th>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date; ?>), $('#<?php echo $row_cell[0]; ?>').html() )" onclick="show_cell((<?php echo $get_date; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php
						    				$sub_str_jam = substr($row_cell[0], 2,5);
						    				$hasil_sub_str =$sub_str_jam.$get_date;

											$query_cek = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek = mysqli_fetch_array($query_cek);
											$h_query = mysqli_num_rows($query_cek);

												if($h_query==1){
													echo $data = "<div id='".$hasil_sub_str."' class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date1; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">
						    	
						    		<?php

											$query_cek1 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek1' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek1 = mysqli_fetch_array($query_cek1);
											$h_query1 = mysqli_num_rows($query_cek1);

												if($h_query1==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a id='bb' href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek1[0]."</strong></div>";
												}else{
													
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date2; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php
						    				

											$query_cek2 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek2' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek2 = mysqli_fetch_array($query_cek2);
											$h_query2 = mysqli_num_rows($query_cek2);

												if($h_query2==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek2[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date3; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php

											$query_cek3 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek3' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek3 = mysqli_fetch_array($query_cek3);
											$h_query3 = mysqli_num_rows($query_cek3);

												if($h_query3==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek3[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date4; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php


											$query_cek4 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek4' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek4 = mysqli_fetch_array($query_cek4);
											$h_query4 = mysqli_num_rows($query_cek4);

												if($h_query4==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek4[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date5; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php


											$query_cek5 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek5' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek5 = mysqli_fetch_array($query_cek5);
											$h_query5 = mysqli_num_rows($query_cek5);

												if($h_query5==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek5[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    	<td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell((<?php echo $get_date6; ?>), $('#<?php echo $row_cell[0]; ?>').html() )">

						    		<?php

											$query_cek6 = mysqli_query($conn, "SELECT c.nama_ruangan from transaksi_detail a
													left join transaksi_header b on b.kode_transaksi = a.kode_transaksi 
													left join ruangan c on c.kode_ruangan = a.kode_ruangan
													where a.tgl_booking='$get_date_cek6' and a.kode_jam='$row_cell[0]' order by a.kode_transaksi desc limit 1 ");

											$row_cek6 = mysqli_fetch_array($query_cek6);
											$h_query6 = mysqli_num_rows($query_cek6);

												if($h_query6==1){
													echo $data = "<div class='alert alert-warning' style='margin:0px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>".$row_cek6[0]."</strong></div>";
												}else{
													/*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
												}
										?>

						    	</td>
						    </tr>


						     <?php } ?>