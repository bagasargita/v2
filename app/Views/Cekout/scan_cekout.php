<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>
<script src="<?= base_url() ?>/assets/js/instascan.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>

<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">
        <div id="responjq">

        </div>
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Cekout</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cekout</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title mt-2 text-xl text-center">SCAN QR</h4>
                            <hr>
                            <div class="leave-info-box">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 col-lg-6">
                                        <video id="idScanner" style="width: 470px; height: auto;"></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title mt-2 text-xl text-center">Data Cekout</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table" id="jaminan_table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Nama
                                            </th>
                                            <th>
                                                NIK
                                            </th>
                                            <th>
                                                Jaminan
                                            </th>
                                                <!-- <th class="text-right">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $row) : ?>
                                    <tr id="list_jaminan">
                                        <td class="id_cekin" hidden><?= $row['id_cekin'] ?></td>
                                        <td class="status_cekin"><?= $row['status'] ?></td>
                                        <td class="nama_cekin"><?= $row['nama'] ?></td>
                                        <td class="nik"><?= $row['nik'] ?></td>
                                        <td class="status_jaminan"><?= $row['status_jaminan'] ?></td>

                                        <!-- <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item userUpdate" data-toggle="modal" data-id="<?= $row['id_cekin'] ?>" data-target="#edit_bagian"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                    <a class="dropdown-item userDelete" data-id="<?= $row['id_cekin'] ?>" data-toggle="modal" data-target="#delete_bagian"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody> 
                                </table>  
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#modal_konfirmasi"><i class="fa fa-plus"></i>Cekin</a> -->
<div id="modal_konfirmasi" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jaminan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Jaminan</label>
                            <div class="invalid-feedback errorJaminan">

                            </div>
                            <div id="jaminan_name">

                            </div>
                           
                            <select class="select" name="status_jaminan" id="selectedName">
                                <option value="Belum di kembalikan" selected disabled>Belum di kembalikan</option>
                                <option value="Di kembalikan">Di kembalikan</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-jaminan">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#jaminan_table').DataTable({
            dom: 'Bfrtip',
            buttons: ['print'],
        });
    });


    const scanner = new Instascan.Scanner({
        video: document.getElementById('idScanner')
    });


    Instascan.Camera.getCameras()
        .then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No camera');
            }
        })
        .catch(function(e) {
            console.error(e);
        })
        

    scanner.addListener('scan', function(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('CekoutController/scanner') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    $('#responjq').html(`<div class = "alert alert-warning alert-dismissible show fade"><div class = "alert-body" ><button class = "close" data - dismiss = "alert">x</button><b>Data Sudah Cekout</b></div></div>`);
                } else {
                    $('#modal_konfirmasi').modal({ show: true})
                    $.ajax({
                        type: "get",
                        url: "<?= site_url('CekoutController/getJaminan') ?>",
                        data: {id: id},
                        dataType: "json",
                        success: function(response) {
                            if (response.dataJaminan) {
                                $('#jaminan_name').html(response.dataJaminan);
                            }
                        },
                        error: function(xhr, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                        }
                    });
                }
                $('.submit-jaminan').click(function(e) {
                    e.preventDefault();
                    var selectedName = $("#selectedName").val();
                    $.ajax({
                        type: "post",
                        url: "<?= site_url('CekoutController/statusJaminan') ?>",
                        data: {id: id, status_jaminan : selectedName},
                        dataType: "json",
                        success: function(response) {
                            if (response.error) {
                                $('.errorJaminan').html(`<div class = "alert alert-warning alert-dismissible show fade"><div class = "alert-body" ><button class = "close" data - dismiss = "alert">x</button><b>Data Sudah Cekout</b></div></div>`);
                            }else{
                                Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#modal_konfirmasi').modal('hide');
                            }
                        },
                        error: function(xhr, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                        }
                    });
                });
            }
        });
    })
</script>
<?= $this->endSection(); ?>