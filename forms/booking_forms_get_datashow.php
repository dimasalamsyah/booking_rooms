
<?php

include '../koneksi/koneksi.php';

$query_jam = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");
$query_addroom = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by jenis_ruangan asc");

$jam= $_REQUEST['jam'];
$ruangan= $_REQUEST['ruangan'];
$tgl= $_REQUEST['tgl'];
$kdpemboking= $_REQUEST['kdpemboking'];
$jabatan= $_REQUEST['jabatan'];
$ket= $_REQUEST['ket'];
	


?>

						   		<!-- modal untuk edit data -->
							<div class="modal fade" role="dialog" id="mymodaledit"  >
							  <div class="modal-dialog" style="width:1000px;">
							    <div class="modal-content">
							      <div class="modal-header bg-primary">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title">Booking Ruangan</h4>
							      </div>
							      <div class="modal-body">
							        	
							        	<form id="" action="" method="post">
									    <div class="form-group col-md-3" style="margin-top:10px;">
									    	<select class="form-control" onchange="" id="" name="" style="margin-left:0px;" placeholder="Jabatan" required>
									    		<option>--Pilih Nama Jabatan--</option>
									    	</select>
									    </div>
									    <div class="form-group col-md-3" style="margin-top:10px;">
									    	<select class="form-control" onchange="" id="" name="" style="margin-left:0px;" placeholder="" required>
									    		<option>--Pilih Nama Pembooking--</option>
									    	</select>
									    </div>
									    <div class="form-group col-md-3" style="margin-top:10px;">
									    	<input id="" type="" class="form-control" placeholder="No Tlp"/>
									 	</div>
									   <div class="form-group col-md-1" style="margin-top:10px; margin-right:10px;">
									    	 <span class="btn btn-success" onclick="" name="add_btn" id="add_btn" >Add Row</span>
									    </div>
									    <div class="form-group col-md-1" style="margin-top:10px; ">
									    	<button type="submit" class="btn btn-success" onclick="" >Save</button>
									    </div>

									      <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE">
									         
									            <tr>
									                <th style="width:4%;">No</th>
									                <th style="width:25%;">Kode Ruangan</th>
									                <th style="width:25%;">Jam</th>
									                <th style="width:25%">Tanggal Booking</th>
									                <th style="width:25%">Note</th>
									                <th style="width:10%">Action</th>
									            </tr>
									            <tbody id="container_edit">

									            	<tr class="records">
							                        <td><div id=""><?php $no;?></div></td>
							                         <td><select class="form-control col-md-5 combo" onchange="" name="combo" style="" required >
							                         <option value="">--Choose Room--</option>
							                         
							                         	<?php while ($row_addroom = mysqli_fetch_array($query_addroom)) { 
							                         		$hasil = $ruangan;  
							                         		echo "<option "; if($row_addroom[0]==$hasil){ 
							                         			echo "selected"; }  
							                         			echo " value=".$row_addroom[0].">".$row_addroom[1]."</option>"; } 
							                         	?>

							                         </select></td>
							                         <td>
							                         	<select class="form-control col-md-5 combo" onchange="" name="combo" style="" required >
							                         	<option value="">--Choose Clock--</option>
							                         
							                         	<?php while ($row_jam = mysqli_fetch_array($query_jam)) { 
							                         		$hasil1 = $jam;  
							                         		echo "<option "; if($row_jam[0]==$hasil1){ 
							                         			echo "selected"; }  
							                         			echo " value=".$row_jam[0].">".$row_jam[1]."</option>"; } 
							                         	?>

							                         	</select>
							                         </td>
							                         <td style="width:100px;">
							                                   <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
							                                           <input class="form-control cek_date1" size="5" type="text" name="tanggal" placeholder="Date" required disabled  value="<?php echo $tgl; ?>" id="tanggal" >
							                                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="pointer2" style="cursor:pointer;" ></span></span>
							                                   </div> 
							                           </td>
							                         <td><textarea class="form-control" rows="3" style="max-width:175px; max-height:170px;" type="" name="note_add" placeholder="Note" required><?php echo $ket; ?></textarea></td>                  
							                         <td><a class="remove_item" href="#" >Delete</a></td></tr>

									            </tbody>
									        </table>
									    

							      </div>
							      <div class="modal-footer">
						           </div>
						      </form>

							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<script>
								 $('#pointer2').Zebra_DatePicker({  show_icon: false,

					            	onSelect: function(view, elements){
					            		document.getElementById("tanggal").value=view;
					            	}
					            });

							</script>