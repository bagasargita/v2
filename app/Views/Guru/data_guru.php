<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>

<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Success!</b>
                    <?= session()->getFlashData('success') ?>
                </div>
            </div>
        <?php endif ?>
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Manage Guru</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Guru</li>
                    </ul>

                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_guru"><i class="fa fa-plus"></i> Add Guru</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-striped custom-table" id="data_guru">
                        <thead>
                            <tr>
                                <th hidden>Idbagian</th>
                                <th>Id</th>
                                <th>Nama Guru</th>
                                <th>Bagian</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td class="id_bagian" hidden><?= $row['id_bagian'] ?></td>
                                    <td class="id_guru"><?= $row['id_guru'] ?></td>
                                    <td class="nama_guru"><?= $row['nama_guru'] ?></td>
                                    <td class="nama_bagian"><?= $row['nama_bagian'] ?></td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item userUpdate" data-toggle="modal" data-id="<?= $row['id_guru'] ?>" data-target="#edit_bagian"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                <a class="dropdown-item userDelete" data-id="<?= $row['id_guru'] ?>" data-toggle="modal" data-target="#delete_bagian"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div id="add_guru" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('GuruController/create'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <input class="form-control" type="text" name="nama_guru" placeholder="Enter Name" require>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Department</label>
                            <select class="select" name="id_bagian">
                                <option selected disabled> --Select--</option>
                                <?php foreach ($bagian as $sey) : ?>
                                    <option value="<?= $sey['id_bagian'] ?>"><?= $sey['nama_bagian'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="edit_bagian" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('GuruController/update'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input hidden class="form-control" type="text" id="idGuru" name="id_guru">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <input class="form-control" type="text" id="namaGuru" name="nama_guru" placeholder="Enter Name" require>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Department</label>
                            <select class="select" name="id_bagian">
                                <option selected disabled id="idBagian">

                                </option>
                                <?php foreach ($bagian as $sey) : ?>
                                    <option value="<?= $sey['id_bagian'] ?>"><?= $sey['nama_bagian'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal custom-modal fade" id="delete_bagian" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="form-header">
                <h5 class="modal-title pt-2">Delete Guru <span id="namaguru_"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('GuruController/delete'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row" hidden>
                        <input class="form-control" type="text" id="id_del" name="id_guru">
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
<?= $this->endSection(); ?>

<?= $this->section('js') ?>

<script>
    $(document).ready(function() {
        $('#data_guru').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: [2, 3]
                }
            }],
        });
    });
    $(document).on('click', '.userUpdate', function() {
        var guru = $('.modal-body #idGuru').val($(this).data('id'));


        let _this = $(this).parents('tr');
        $('#namaGuru').val(_this.find('.nama_guru').text());
        $('#idBagian').val(_this.find('.nama_bagian').text());

        let nama_ = (_this.find(".nama_guru").text());
        $(nama_).appendTo("#namaGuru");

        let idbagian_ = (_this.find(".nama_bagian").text());
        $('#idBagian').text(idbagian_);

        console.log(idbagian_);

    });

    $(document).on('click', '.userDelete', function() {

        let _this = $(this).parents('tr');
        $('#namaguru_').val(_this.find('.nama_guru').text());
        let nama_ = (_this.find(".nama_guru").text());
        $("#namaguru_").text(nama_);

        console.log(nama_);

        $('.modal-body #id_del').val($(this).data('id'));

    });
</script>
<?= $this->endSection(); ?>