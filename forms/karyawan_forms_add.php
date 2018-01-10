<?php

  include '../koneksi/koneksi.php';
    $query_no = mysqli_query($conn,"SELECT max(kode_karyawan) FROM karyawan");
    $row = mysqli_fetch_array($query_no);
    $kode = $row[0];

    $nourut = (int)substr($kode, 2,5);
    $nourut++;

    //echo "KD".$nourut;
     $data = sprintf("KK%03s", $nourut);

?>


        <!-- modal add -->
            <div class="modal fade" role="dialog" id="addkaryawan_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Karyawan <span id="title_hapus"></span></h4>
                  </div>
                  <div class="modal-body">
                  <forms>
                    <div class="form-group" id="kode_karyawan_add_er" style="display:;">
                      <input id="kode_karyawan_add" name="kode_karyawan_add" type="text" class="form-control has-error" placeholder="" readonly="" value="<?php echo $data;?>" />
                    </div>
                    <div class="form-group" id="nama_add_error">
                              <input id="nama_karyawan_add" name="nama_karyawan_add" type="text" onkeypress="return isHuruf(event)" class="form-control has-error" placeholder="Nama Karyawan" value="<?php  ?>" />
                    </div>
                    <div class="form-group" id="tanggal_add_error">
                          <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                              <input class="form-control cek_date1" size="5" type="text" name="tgl1_add" id="tgl1_add"  placeholder="Date" required readonly="" value="<?php  ?>">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="pointer3" style="cursor:pointer;" ></span></span>
                          </div>
                      </div>
                      <div class="form-group" id="tempat_add_error">
                          <input id="tempat_lahir_add" name="tempat_lahir_add" type="text" class="form-control" onkeypress="return isHuruf(event)" placeholder="Tempat lahir" value="<?php  ?>" />
                      </div>
                      <div class="form-group" id="tlp_add_error">
                          <input id="tlp_add" name="tlp_add" type="" maxlength="13" onkeypress="return isNumberKey(event)" class="form-control" placeholder="No Tlp" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" id="alamat_add_error">
                          <textarea class="form-control" rows="3" style="max-width:555px; max-height:170px;" type="" name="alamat_add" id="alamat_add" placeholder="Alamat" required><?php  ?></textarea>
                      </div>
                      <div class="form-group" id="username_add_err">
                          <input id="username_add" name="username_add" type="" maxlength="13" onkeypress="return isHuruf(event)" class="form-control" placeholder="Username" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" id="password_add_err">
                          <input id="password_add" name="password_add" type="password" maxlength="13" class="form-control" placeholder="Password" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" style="margin-top:0px;" id="jabatan_lap_err">
                            <select class="form-control selectpicker"  data-size="10"  id="jabatan_lap" name="jabatan_lap" style="margin-left:0px;">
                                <option value="">Level</option>
                                <option value="user">User</option>
                                <option value="superuser">Super User</option>
                            </select>
                        </div>

                             <button type="" class="btn btn-success" id="save_data" >
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                             Simpan</button>
                             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             Batal</button>
                      </forms>
                    <div class="modal-footer"></div>

                </div>
               
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <script>
                $('#pointer3').Zebra_DatePicker({  show_icon: false,

                  onSelect: function(view, elements){
                    document.getElementById("tgl1_add").value=view;
                  }
                });

                $("#save_data").click(function(){
                  var kode_karyawan = $("#kode_karyawan_add").val();
                  var nama_karyawan = $("#nama_karyawan_add").val();
                  var tgl = $("#tgl1_add").val();
                  var tempat_lahir = $("#tempat_lahir_add").val();
                  var tlp = $("#tlp_add").val();
                  var alamat = $("#alamat_add").val();
                  var username_add = $("#username_add").val();
                  var password_add = $("#password_add").val();
                  var jabatan_lap = $("#jabatan_lap").val();

                  if(nama_karyawan==''){
                    $("#nama_add_error").addClass("has-error");
                  }else{
                      $("#nama_add_error").removeClass("has-error");
                  }
                  if(tgl==''){
                    $("#tanggal_add_error").addClass("has-error");
                  }else{
                      $("#tanggal_add_error").removeClass("has-error");
                  }
                  if(tempat_lahir==''){
                    $("#tempat_add_error").addClass("has-error");
                  }else{
                      $("#tempat_add_error").removeClass("has-error");
                  }
                  if(tlp==''){
                    $("#tlp_add_error").addClass("has-error");
                  }else{
                      $("#tlp_add_error").removeClass("has-error");
                  }
                  if(alamat==''){
                    $("#alamat_add_error").addClass("has-error");
                  }else{
                    $("#alamat_add_error").removeClass("has-error");
                  }
                  if(username_add==''){
                    $("#username_add_err").addClass("has-error");
                  }else{
                    $("#username_add_err").removeClass("has-error");
                  }
                  if(password_add==''){
                    $("#password_add_err").addClass("has-error");
                  }else{
                    $("#password_add_err").removeClass("has-error");
                  }
                  if(jabatan_lap==''){
                    $("#jabatan_lap_err").addClass("has-error");
                  }else{
                    $("#jabatan_lap_err").removeClass("has-error");
                  }

                  if(nama_karyawan!="" && tgl!="" && tempat_lahir!="" && tlp!="" && alamat!="" && username_add!=""
                    && password_add!="" && jabatan_lap!=""){

                      var dataString1 = 'kode_karyawan='+kode_karyawan+"&nama_karyawan="+nama_karyawan+
                      "&tanggal_lahir="+tgl+"&tempat_lahir="+tempat_lahir+"&alamat="+alamat+"&no_tlp="+tlp
                      +"&username="+username_add+"&password="+password_add+"&jabatan="+jabatan_lap;
                      
                      $.ajax({
                         url:'karyawan_forms_save.php?'+dataString1,
                         success:function(data) {
                            ambildata_cari();
                            $("#addkaryawan_modal").modal('hide');
                            paging();
                            //alert(dataString1);
                          }
                      });
                  }
                  
                });

            </script>