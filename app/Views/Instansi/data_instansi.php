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
                    <h3 class="page-title">Manage Instansi</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Instansi</li>
                    </ul>

                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_guru"><i class="fa fa-plus"></i> Add Instansi</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable" id="data_instansi">
                        <thead>
                            <tr>
                                <th hidden>Idbagian</th>
                               
                                <th>Name</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td class="id_instansi" hidden><?= $row['id_instansi'] ?></td>
                                    <td class="nama_instansi"><?= $row['instansi'] ?></td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item userUpdate" data-toggle="modal" data-id="<?= $row['id_instansi'] ?>" data-target="#edit_bagian"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                <a class="dropdown-item userDelete" data-id="<?= $row['id_instansi'] ?>" data-toggle="modal" data-target="#delete_bagian"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

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
                <form action="<?= site_url('InstansiController/create'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="instansi" placeholder="Enter Name" require>
                            </div>
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
                <h5 class="modal-title">Edit Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('InstansiController/update'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input hidden class="form-control" type="text" id="idInstansi" name="id_instansi">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" id="namaInstansi" name="instansi" placeholder="Enter Name" require>
                            </div>
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
                <h5 class="modal-title pt-2">Delete Instansi <span id="namaguru_"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('InstansiController/delete'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row" hidden>
                        <input class="form-control" type="text" id="id_del" name="id_instansi">
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
$(document).ready(function(){
    $('#data_instansi').DataTable({
        dom: 'Bfrtip',
        buttons: ['print'],
    });
});

$(document).on('click', '.userUpdate', function() {
        $('.modal-body #idInstansi').val($(this).data('id'));


        let _this = $(this).parents('tr');
        $('#namaInstansi').val(_this.find('.nama_instansi').text());
        $('#id_instansi').val(_this.find('.id_instansi').text());

        let nama_ = (_this.find(".nama_instansi").text());
        $(nama_).appendTo("#namaInstansi");

        let id_ = (_this.find(".nama_instansi").text());
        $('#id_instansi').text(id_);

        // console.log(test);

    });

    $(document).on('click', '.userDelete', function() {

        let _this = $(this).parents('tr');
        $('#namaguru_').val(_this.find('.nama_instansi').text());
        let nama_ = (_this.find(".nama_instansi").text());
        $("#namaguru_").text(nama_);

        console.log(nama_);

        $('.modal-body #id_del').val($(this).data('id'));

    });
</script>
<?= $this->endSection(); ?>