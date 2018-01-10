<?php

$kd_dosen = $_REQUEST['kd_dosen'];
$nama = $_REQUEST['nama'];
$tgl = $_REQUEST['tgl'];
$tempat = $_REQUEST['tempat'];
$tlp = $_REQUEST['tlp'];
$alamat = $_REQUEST['alamat'];


?>

<!-- modal untuk add data -->
	<div class="modal fade" role="dialog" id="editdosen_modal"  >
	  <div class="modal-dialog" style="width:500px;">
	    <div class="modal-content">
	      <div class="modal-header bg-primary">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Edit Dosen: <?php echo  $kd_dosen." | ".$nama; ?></h4>
	      </div>
	      <div class="modal-body">
	     <form method="get" action="">
	     		<div class="form-group" id="" style="display:none;">
	                  <input id="kd_dosen" name="kd_dosen" type="text" class="form-control has-error" placeholder="Nama Dosen" value="<?php echo $kd_dosen; ?>" />
	            </div>
			    <div class="form-group" id="nama_error">
	                  <input id="nama" name="nama" type="text" class="form-control has-error huruf" onkeypress="return isHuruf(event)" placeholder="Nama Dosen" value="<?php echo $nama; ?>" />
	            </div>
	            <div class="form-group" id="tanggal_error">
                    <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                        <input class="form-control cek_date1" size="5" type="text" name="tgl" id="tgl"  placeholder="Date" required readonly="" value="<?php echo $tgl; ?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="pointer2" style="cursor:pointer;" ></span></span>
                    </div>
                </div>
                <div class="form-group" id="" style="display:none;">
	                  <input id="tgl1" name="tgl1" type="text" class="form-control has-error" placeholder="Nama Dosen" value="<?php echo $tgl; ?>" />
	            </div>
                <div class="form-group" id="tempat_error">
                    <input id="tempat" name="tempat" type="text" class="form-control huruf" placeholder="Tempat lahir" onkeypress="return isHuruf(event)" value="<?php echo $tempat; ?>" />
                </div>
                <div class="form-group" id="tlp_error">
                    <input id="tlp" name="tlp" type="" maxlength="13" class="form-control numeric" placeholder="No Tlp" onkeypress="return isNumberKey(event)" value="<?php echo $tlp; ?>"/>
                </div>
				<div class="form-group" id="alamat_error">
                    <textarea class="form-control" rows="3" style="max-width:475px; max-height:170px;" type="" name="alamat" id="alamat" placeholder="Alamat" required><?php echo $alamat; ?></textarea>
                </div>
                
			    	 <span type="" id="btn_update" class="btn btn-success" onclick="" >
			    	 	<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
			    	 Simpan</span>
			    	 <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
			    	 	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			    	 Batal</button>
			    <!-- </div> -->

			<div class="modal-footer"></div>

		</div>
	      
      </form>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<style>
	.modal-header:hover{
		cursor: move;
	}
	</style>

	<script>

	$(document).ready(function(){
         /*angka*/
            $('.numeric').bind('keyup blur',function(){ 
              this.value = this.value.replace(/[^0-9]/g, '');
            });
            /*hrurf*/
            $('.huruf').bind('keyup blur',function(){ 
              this.value = this.value.replace(/[^a-zA-Z-' ']/g, '');
            });
            
		  $("#editdosen_modal").draggable({
		      handle: ".modal-header"
		  });
		  $('#pointer2').Zebra_DatePicker({  show_icon: false,

                onSelect: function(view, elements){
                    document.getElementById("tgl").value=view;
                    //document.getElementById("#tgl_filter").innerHTML = "aa";
                    //alert(view);
                }
            });

		  $("#btn_update").click(function(){
                kode_dosen = $("#kd_dosen").val();
                nama = $("#nama").val();
                tgl = $("#tgl").val();
                tmpt = $("#tempat").val();
                tlp = $("#tlp").val();
                alamat = $("#alamat").val();

                if(nama==''){
                    $("#nama_error").addClass("has-error");
                }else{
                    $("#nama_error").removeClass("has-error");
                }
                if(tgl==''){
                    $("#tanggal_error").addClass("has-error");
                }else{
                    $("#tanggal_error").removeClass("has-error");
                }
                if(tmpt==''){
                    $("#tempat_error").addClass("has-error");
                }else{
                    $("#tempat_error").removeClass("has-error");
                }
                if(tlp==''){
                    $("#tlp_error").addClass("has-error");
                }else{
                    $("#tlp_error").removeClass("has-error");
                }
                if(alamat==''){
                    $("#alamat_error").addClass("has-error");             
                }else{
                    $("#alamat_error").removeClass("has-error");     
                }

                if(nama!='' && tgl!='' && tmpt!='' && tlp!='' && alamat!=''){
                    $.ajax({
                        type: 'GET',
                        url: 'dosen_forms_update.php?kd_dosen='+kode_dosen+'&nama='+nama+'&tgl='+tgl+'&tempat='+tmpt+'&tlp='+tlp+'&alamat='+alamat,
                        data_up: $(this).serialize(),
                        success: function(data_up) {
                            getdata();    
                            $("#editdosen_modal").modal('hide');  
                            //alert(data_up);
                        }
                    });
                }
                
                //alert();
            });
	});

	</script>