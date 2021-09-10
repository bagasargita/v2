<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>
<script src="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>

<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Cekin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cekin</li>
                    </ul>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">x</button>
                                <b>Success!</b>
                                <?= session()->getFlashData('success') ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="col-sm-12 text-danger" id="error_log"></div>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_cekin"><i class="fa fa-plus"></i>Cekin</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                </div>
            </div>
            <div>
                <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="DataCekin">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Id</th> -->
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Instansi</th>
                                    <th>Asal</th>
                                    <th>Keperluan</th>
                                    <th>Bagian</th>
                                    <th>Tujuan</th>
                                    <th>Document</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div id="add_cekin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cekin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('CekinController/create'); ?>" class="form_cekin" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12" hidden>
                            <label>Status</label>
                            <select class="select" name="status">
                                <option selected value="Cekin">Cekin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" type="text" id="nik" name="nik" placeholder="Enter NIK">
                                <div class="invalid-feedback errorNik">

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <label>Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" placeholder="Enter Nama">
                            <div class="invalid-feedback errorNama">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <label>No HP</label>
                                    <input class="form-control" type="text" id="nohp" name="nohp" placeholder="Enter No HP">
                                    <div class="invalid-feedback errorHP">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Jenis Kelamin</label>
                                    <select class="select" name="jenkel" id="jenkel">
                                        <option selected disabled>--Select--</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <div class="invalid-feedback errorJenkel">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Jaminan</label>
                            <input class="form-control" type="text" name="nama_jaminan" id="nama_jaminan" placeholder="Enter Jaminan">
                            <div class="invalid-feedback errorJaminan">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Instansi</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="select" name="instansi_id" id="instansi_id">
                                            <option selected disabled>--Select--</option>
                                            <?php foreach ($instansi as $row) : ?>
                                                <option value="<?= $row['id_instansi'] ?>"><?= $row['instansi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback errorInstansi">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="asal" name="asal" placeholder="Nama Instansi">
                                        <div class="invalid-feedback errorAsal">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Keperluan</label>
                            <select class="select" name="keperluan_id" id="keperluan_id">
                                <option selected disabled>--Select--</option>
                                <?php foreach ($keperluan as $row) : ?>
                                    <option value="<?= $row['id_keperluan'] ?>"><?= $row['keperluan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorKeperluan">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Bagian</label>
                            <select class="select bagian_id" name="bagian_id" id="idBagian_">
                                <option selected disabled> --Select--</option>
                                <?php foreach ($tujuan as $row) : ?>
                                    <option value="<?= $row['id_bagian'] ?>"><?= $row['nama_bagian'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorBagian">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Tujuan</label>
                            <select class="select" name="tujuan_id" id="idTujuan_"></select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Bersama</label>
                                <input type="text" class="form-control bersama" name="bersama" id="tagsInput_1" placeholder="Datang Bersama">
                                <div class="invalid-feedback errorBersama">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dokumen</label>
                                <input type="text" class="form-control nama_document" name="nama_document" placeholder="Nama Document">
                                <input type="text" class="form-control" name="no_document" placeholder="Nomor Document">
                                <div class="invalid-feedback errorDocument">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Foto</label>
                                <div id="my_cam">

                                </div>
                                <!-- <video id="preview"></video> -->
                                <p class="mt-1 ml-auto">
                                    <a id="capture" class="btn btn-danger" onclick="take_picture();">capture</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hasil</label>
                                <!-- <canvas hidden id="output"></canvas>
                                <img id="res"> -->
                                <div class="col-sm-4" id="hasil_cam">

                                </div>
                                <input type="text" name="bukti_foto" class="image-tag" hidden />
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn savebutton">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->

<!-- Modal Delete -->
<div class="modal custom-modal fade" id="delete_bagian" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="form-header">
                <h5 class="modal-title pt-2">Delete Data <span id="namaguru_"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('CekinController/delete'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row" hidden>
                        <input class="form-control" type="text" id="id_del" name="cekin_id">
                    </div>
                    <div class="row justify-content-center">
                        <p>Are you sure want to delete <span id="nama_del"></span> ?</p>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form_cekin').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.savebutton').attr('disabled', 'disabled');
                    $('.savebutton').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.savebutton').removeAttr('disabled');
                    $('.savebutton').html('simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nik) {
                            $('#nik').addClass('is-invalid');
                            $('.errorNik').html(response.error.nik);
                        } else {
                            $('#nik').addClass('is-invalid');
                            $('.errorNik').html('');
                        }
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.nohp) {
                            $('#nohp').addClass('is-invalid');
                            $('.errorHP').html(response.error.nohp);
                        } else {
                            $('#nohp').addClass('is-invalid');
                            $('.errorHP').html('');
                        }

                        if (response.error.jenkel) {
                            $('#jenkel').addClass('is-invalid');
                            $('.errorJenkel').html(response.error.jenkel);
                        } else {
                            $('#jenkel').addClass('is-invalid');
                            $('.errorJenkel').html('');
                        }

                        if (response.error.nama_jaminan) {
                            $('#nama_jaminan').addClass('is-invalid');
                            $('.errorJaminan').html(response.error.nama_jaminan);
                        } else {
                            $('#nama_jaminan').addClass('is-invalid');
                            $('.errorJaminan').html('');
                        }

                        if (response.error.instansi_id) {
                            $('#instansi_id').addClass('is-invalid');
                            $('.errorInstansi').html(response.error.instansi_id);
                        } else {
                            $('#instansi_id').addClass('is-invalid');
                            $('.errorInstansi').html('');
                        }

                        if (response.error.asal) {
                            $('#asal').addClass('is-invalid');
                            $('.errorAsal').html(response.error.asal);
                        } else {
                            $('#asal').addClass('is-invalid');
                            $('.errorAsal').html('');
                        }
                        //
                        if (response.error.keperluan_id) {
                            $('#keperluan_id').addClass('is-invalid');
                            $('.errorKeperluan').html(response.error.keperluan_id);
                        } else {
                            $('#keperluan_id').addClass('is-invalid');
                            $('.errorKeperluan').html('');
                        }
                        if (response.error.bagian_id) {
                            $('.bagian_id').addClass('is-invalid');
                            $('.errorBagian').html(response.error.bagian_id);
                        } else {
                            $('.bagian_id').addClass('is-invalid');
                            $('.errorBagian').html('');
                        }

                        if (response.error.bersama) {
                            $('.bersama').addClass('is-invalid');
                            $('.errorBersama').html(response.error.bersama);
                        } else {
                            $('.bersama').addClass('is-invalid');
                            $('.errorBersama').html('');
                        }

                        if (response.error.nama_document) {
                            $('.nama_document').addClass('is-invalid');
                            $('.errorDocument').html(response.error.nama_document);
                        } else {
                            $('.nama_document').addClass('is-invalid');
                            $('.errorDocument').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                            showConfirmButton: false,
                            timer: 1600
                        });

                        $('#add_cekin').modal('hide');
                        dataTable.draw();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    })

    var dataTable = $('#DataCekin').DataTable({
        "order": [
            [0, "DESC"]
        ],
        dom: 'Blfrtip', // Add the Copy, Print and export to CSV, Excel and PDF buttons
        buttons: [{
            extend: 'print',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
            }
        }],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('CekinController/getData'); ?>",
            "dataType": "json",
            "type": "POST",
            'data': function(data) {
                // Read values
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();

                // Append to data
                data.action = 'dataCekin';
                data.searchByFromdate = start_date;
                data.searchByTodate = end_date;
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    });

    $(function() {
        $("#start_date").datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $("#end_date").datepicker({
            todayBtn: 'linked',
            format: "yyyy-mm-dd",
            autoclose: true
        });
    });

    $('#filter').click(function() {
        dataTable.draw();
    });
    $(document).on("click", "#reset", function(e) {
        e.preventDefault();
        $("#start_date").val(''); // empty value
        $("#end_date").val('');
        dataTable.draw();

    });

    $(document).on('click', '.userDelete', function() {

        let _this = $(this).parents('tr');
        $('#namaguru_').val(_this.find('.nama_cekin').text());
        let nama_ = (_this.find(".nama_cekin").text());
        $("#namaguru_").text(nama_);

        console.log(nama_);

        $('.modal-body #id_del').val($(this).data('id'));

    });

    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeq_quality: 100,
    });
    Webcam.attach('#my_cam');

    function take_picture() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('hasil_cam').innerHTML = '<img src="' + data_uri + '"/>';
        });

    }

    $('#idBagian_').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= site_url('CekinController/getTujuan') ?>",
            data: {
                bagian_id: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.dataGuru) {
                    $('#idTujuan_').html(response.dataGuru);
                }

            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        });
    });

    $(document).ready(function() {
        $('#tagsInput_1').tagsInput({
            width: 'auto'
        });
        $("input").val()
    });
</script>

<?= $this->endSection(); ?>