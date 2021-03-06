<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/nouislider/nouislider.min.css" />

<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $base_assets_url?>vendor/sweetalert/sweetalert.css"/>
<link rel="stylesheet" href="<?php echo $base_assets_url;?>vendor/dropify/css/dropify.min.css">
<?php
if (!empty($id)) {
    # code...
    foreach ($json as $jsonData);
}
?>
            <form id="addAlumni" action="<?php echo base_url('api/rest_alumni/save') ?>" method="post" enctype="multipart/form-data">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control col-lg-10 col-md-10 col-sm-12" name="realname" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->realname : '' ; ?>" placeholder="Nama Lengkap" required>
                                    <input type="hidden" name="user_id" value="<?php echo $retVal = (!empty($id)) ? $id : '' ; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nis</label>
                                    <input type="number" class="form-control col-lg-5 col-md-5 col-sm-12" name="nis" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->nis : '' ; ?>" placeholder="Nomor Induk Siswa" required>
                                </div>
                                <div class="form-group row">
                                    <div class="inputGroup col-lg-5 col-md-5 col-sm-6">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->tempat_lahir : '' ; ?>" placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="inputGroup col-lg-7 col-md-7 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" id="tanggal_lahir" class="form-control col-lg-7 col-md-7 col-sm-6" name="tanggal_lahir" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->tanggal_lahir : '' ; ?>" placeholder="Tanggal Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="inputGroup col-lg-3 col-md-3 col-sm-6">
                                        <label>Jenis Kelamin</label>
                                        <div class="multiselect_div pl-0 pr-0">
                                            <div class="multiselect_div">
                                                <select id="jk" name="jk" class="multiselect multiselect-custom" multiple="multiple" required>
                                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputGroup col-lg-4 col-md-4 col-sm-6">
                                        <label>Agama</label>
                                        <div class="multiselect_div pl-0 pr-0">
                                            <div class="multiselect_div">
                                                <select id="agama" name="agama" class="multiselect multiselect-custom" multiple="multiple" required>
                                                    <option value="ISLAM">ISLAM</option>
                                                    <option value="KRISTEN KATOLIK">KRISTEN KATOLIK</option>
                                                    <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                                                    <option value="HINDU">HINDU</option>
                                                    <option value="BUDHA">BUDHA</option>
                                                </select>
                                            </div>
                                        </div>    
                                    </div>
                                    <di class="col-lg-5 col-md-5"></di>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea id="alamat" class="form-control col-lg-8 col-md-8 col-sm-12" name="alamat" rows="5" required><?php echo $retVal = (!empty($id)) ? $jsonData->alamat : '' ; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="number" class="form-control col-lg-5 col-md-5 col-sm-12" name="no_telp" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->no_telp : '' ; ?>" placeholder="Nomor Telpon" required>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <div class="multiselect_div col-lg-5 col-md-5 col-sm-12 pl-0 pr-0">
                                        <div class="multiselect_div">
                                            <select id="jurusan" name="jurusan_id" class="multiselect multiselect-custom" multiple="multiple" required>
                                                <?php  
                                                    $query = $this->tb_jurusan_m->get_by(array('is_publish' => '1'));
                                                    foreach ($query as $data) {
                                                ?>
                                                <option value="<?php echo $data->jurusan_id ?>"><?php echo $data->nama_jurusan.' ('.$data->kode_jurusan.')' ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="inputGroup col-lg-3 col-md-3 col-sm-12">
                                        <label>Tahun Masuk</label>
                                        <input type="text" class="form-control" name="th_masuk" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->th_masuk : '' ; ?>" placeholder="Tahun Masuk" required>
                                    </div>
                                    <div class="inputGroup col-lg-3 col-md-3 col-sm-12">
                                        <label>Tahun Lulus</label>
                                        <input type="text" class="form-control" name="th_keluar" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->th_keluar : '' ; ?>" placeholder="Tahun Lulus" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12"></div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control col-lg-5 col-md-5 col-sm-12" name="email" autocomplete="off" value="<?php echo $retVal = (!empty($id)) ? $jsonData->email : '' ; ?>" placeholder="Email" required=""></input>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" class="form-control col-lg-5 col-md-5 col-sm-12" name="password" autocomplete="off" value="" placeholder="Password" <?php echo $retVal = (!empty($id)) ? '' : required ; ?>></input>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" id="confirm_password" class="form-control col-lg-5 col-md-5 col-sm-12" name="confirm_password" autocomplete="off" value="" placeholder="Konfirmasi Password" ></input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" id="display" name="foto" data-default-file="<?php echo $retVal = (!empty($id)) ? base_url().$jsonData->path_img.$jsonData->img : '' ; ?>" data-show-remove="false">
                                    <input type="hidden" name="current_path" value="<?php echo $retVal = (!empty($id)) ? $jsonData->path_img : '' ; ?>">
                                    <input type="hidden" name="current_img" value="<?php echo $retVal = (!empty($id)) ? $jsonData->img : '' ; ?>">
                                </div>
                                <div class="text-right">
                                    <p class="demo-button text-right">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> <span>Save</span></button>
                                        <button id="cancel" type="button" class="cancel btn btn-outline-danger"><i class="fa fa-close"></i> <span>Cancel</span></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>


<!-- Javascript -->
<script src="<?php echo $base_assets_url?>bundles/libscripts.bundle.js"></script>    
<script src="<?php echo $base_assets_url?>bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo $base_assets_url?>vendor/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="<?php echo $base_assets_url?>vendor/jquery-validation/additional-methods.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="<?php echo $base_assets_url?>vendor/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->

<script src="<?php echo $base_assets_url?>vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
<script src="<?php echo $base_assets_url?>vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js -->
<script src="<?php echo $base_assets_url?>vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<!-- date range -->
<script src="<?php echo $base_assets_url?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/bootstrap-datepicker/moment.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="<?php echo $base_assets_url?>vendor/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js --> 

<script src="<?php echo $base_assets_url?>bundles/datatablescripts.bundle.js"></script>
<script src="<?php echo $base_assets_url?>vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="<?php echo $base_assets_url?>vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="<?php echo $base_assets_url;?>vendor/dropify/js/dropify.min.js"></script>
<script src="<?php echo $base_assets_url;?>vendor/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 

<script src="<?php echo $base_assets_url?>vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
<script src="<?php echo $base_assets_url?>bundles/mainscripts.bundle.js"></script>

<script type="text/javascript">
    var jurusan = '',
        agama = '',
        jk='';
    
    $('input[name="tanggal_lahir"]').datepicker({ format: 'yyyy-mm-dd', autoclose: true, changeMonth: true, changeYear: true });

    $('input[name="th_masuk"]').datepicker({ format: 'yyyy', startView: "year", minView: "year", minViewMode: 2, autoclose: true, changeYear: true });
    
    $('input[name="th_keluar"]').datepicker({ format: 'yyyy', startView: "year", minView: "year", minViewMode: 2, autoclose: true, changeYear: true });

    $('#jurusan').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        maxHeight: 200,
        filterPlaceholder: 'Search for something...',
        buttonText: function(options, select) {
            if (options.length === 0) {
                return 'Pilih Jurusan';
            }
            else {
                 var labels = '';
                 options.each(function() {
                     if ($(this).attr('label') !== undefined) {
                         labels = $(this).attr('label');
                     }
                     else {
                         labels = $(this).html();
                     }
                 });
                 return labels;
            }
        },
        onChange: function(option, checked, select){
            var values = [];
            
            if (checked) {
                jurusan = option.val();
                $('.multiselect_div .multiselect-container').removeClass('show');
            }else{
                jurusan = '';
                $('.multiselect_div .multiselect-container').removeClass('show');
            }

            $('#jurusan option').each(function() {
                if ($(this).val() !== option.val()) {
                    values.push($(this).val());
                }
            });

            $('#jurusan').multiselect('deselect', values);
        }
    }); 

    $('#jk').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        maxHeight: 200,
        filterPlaceholder: 'Search for something...',
        buttonText: function(options, select) {
            if (options.length === 0) {
                return 'Pilih Jenis Kelamin';
            }
            else {
                 var labels = '';
                 options.each(function() {
                     if ($(this).attr('label') !== undefined) {
                         labels = $(this).attr('label');
                     }
                     else {
                         labels = $(this).html();
                     }
                 });
                 return labels;
            }
        },
        onChange: function(option, checked, select){
            var values = [];
            
            if (checked) {
                jk = option.val();
                $('.multiselect_div .multiselect-container').removeClass('show');
            }else{
                jk = '';
                $('.multiselect_div .multiselect-container').removeClass('show');
            }

            $('#jk option').each(function() {
                if ($(this).val() !== option.val()) {
                    values.push($(this).val());
                }
            });

            $('#jk').multiselect('deselect', values);
        }
    }); 

    $('#agama').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        maxHeight: 200,
        filterPlaceholder: 'Search for something...',
        buttonText: function(options, select) {
            if (options.length === 0) {
                return 'Pilih Agama';
            }
            else {
                 var labels = '';
                 options.each(function() {
                     if ($(this).attr('label') !== undefined) {
                         labels = $(this).attr('label');
                     }
                     else {
                         labels = $(this).html();
                     }
                 });
                 return labels;
            }
        },
        onChange: function(option, checked, select){
            var values = [];
            
            if (checked) {
                agama = option.val();
                $('.multiselect_div .multiselect-container').removeClass('show');
            }else{
                agama = '';
                $('.multiselect_div .multiselect-container').removeClass('show');
            }

            $('#agama option').each(function() {
                if ($(this).val() !== option.val()) {
                    values.push($(this).val());
                }
            });

            $('#agama').multiselect('deselect', values);
        }
    }); 

    <?php
        if (!empty($id)) {
    ?>
        $('#jurusan').multiselect('select', <?php echo $jsonData->jurusan_id ?>);
        $('#jk').multiselect('select', '<?php echo $jsonData->jk ?>');
        $('#agama').multiselect('select', '<?php echo $jsonData->agama ?>');
    <?php
        }
    ?>
    
    var drDisplay = $('#display').dropify();

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');

    $("#addAlumni").validate({
        ignore: [],
        debug: false,
        rules: {
            //ignore: "",
            foto: {
                extension: "png|jpg|jpeg",
                filesize: 500000 
            },
            realname: {
                maxlength: 50
            },
            nis: {
                maxlength: 18
            }, 
            tempat_lahir: {
                maxlength: 25
            },
            tanggal_lahir: {
                date: true
            },
            no_telp: {
                number: true
            },
            th_masuk: {
                date: true
            },
            th_keluar: {
                date: true
            },
            email: {
                email: true
            },
            password: {
                minlength: 6,
                maxlength: 20
            },
            confirm_password: {
                equalTo: "#password"
            }
        },
        highlight: function (input) {
            $(input).addClass('parsley-error');
            $(input).parents('.multiselect_div').find('.btn-group button').addClass('parsley-error');
        },
        unhighlight: function (input) {
            $(input).removeClass('parsley-error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
            $(element).parents('.inputGroup').append(error);
        },
        submitHandler: function(form, e) {
            e.preventDefault();
            
            var URL = $("#addAlumni").attr("action");
            $.ajax({
                url        :URL,
                type       :'POST',
                data       :new FormData(form), //this is formData
                processData:false,
                contentType:false,
                cache      :false,
                success: function(data) {
                    // body...
                    var row = JSON.parse(data);
                    
                    var body = $("html, body");
                    if ( row.success ) {
                        swal({
                                title: "Selamat!", 
                                text: "Data berhasil disimpan!", 
                                type: "success",
                                timer: 800,
                                showConfirmButton: false
                        });
                        setTimeout(function () {
                            body.stop().animate({scrollTop:jQuery(window).height()}, 800, 'swing');
                            location.href = row.base_url;
                        }, 800);
                    }
                }
            });
        }
    });

    $('#cancel').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        location.href = '<?php echo base_url('cms-admin/alumni') ?>';
    });
</script>