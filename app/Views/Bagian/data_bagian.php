<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>

<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Manage Bagian</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Bagian</li>
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
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_bagian"><i class="fa fa-plus"></i> Add Bagian</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable" id="data_bagian">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Bagian</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td class="id_bagians"><?= $row['id_bagian'] ?></td>
                                    <td class="nama_bagians"><?= $row['nama_bagian'] ?></td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item userUpdate" data-toggle="modal" data-id="<?= $row['id_bagian'] ?>" data-target="#edit_bagian"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                <a class="dropdown-item userDelete" data-id="<?= $row['id_bagian'] ?>" data-toggle="modal" data-target="#delete_bagian"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

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

//Modal Add
<div id="add_bagian" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('BagianController/create'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Bagian</label>
                                <input class="form-control" type="text" id="nama_bagian" name="nama_bagian" placeholder="Enter Name" require>
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

//Modal Edit
<div id="edit_bagian" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Bagian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('BagianController/update'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12" hidden>
                            <div class="form-group">
                                <label>Id</label>
                                <input class="form-control" type="text" id="id_e" name="id_bagian">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Bagian</label>
                                <input class="form-control" type="text" id="name_e" name="nama_bagian">
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

//Modal Delete
<div class="modal custom-modal fade" id="delete_bagian" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="form-header">
                <h5 class="modal-title pt-2">Delete Bagian <span id="bagians_"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form action="<?= site_url('BagianController/delete'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row" hidden>
                        <input class="form-control" type="text" id="id_del" name="id_bagian">
                    </div>
                    <div class="row justify-content-center">
                        <p>Are you sure want to delete?</p>
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
        $('#data_bagian').DataTable({
            dom: 'Bfrtip',
            buttons: ['print'],
        });
    });

    $(document).on('click', '.userUpdate', function() {
        let _this = $(this).parents('tr');
        $('#id_e').val(_this.find('.id_bagians').text());
        $('#name_e').val(_this.find('.nama_bagians').text());


        let id_ = (_this.find(".id_bagians").text());
        $(id_).appendTo("#id_e");

        let nama_ = (_this.find(".nama_bagians").text());
        $(nama_).appendTo("#name_e");

        console.log(nama_);

    });

    $(document).on('click', '.userDelete', function() {

        let _this = $(this).parents('tr');
        $('#bagians_').val(_this.find('.nama_bagians').text());
        let nama_ = (_this.find(".nama_bagians").text());
        $("#bagians_").text(nama_);

        console.log(nama_);

        $('.modal-body #id_del').val($(this).data('id'));

    });
</script>

<?= $this->endSection(); ?>