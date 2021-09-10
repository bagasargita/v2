<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <a href="/cekin" class="btn btn-primary mb-2"><i class="fa fa-reply mr-2"></i>Back</a>
        <!-- Page Header -->
        <?php foreach ($data1 as $row) : ?>
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12 col-lg-8 col-xl-8">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title mt-2 text-xl text-center">Profile</h4>
                            <hr>
                            <div class="leave-info-box">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-6 col-lg-6 card media">
                                        <img class="card-img-top" style="min-width: 150px; min-height: 150px;" alt="FOTO PENGUNJUNG" src="<?= $row['bukti_foto'] ?>">
                                        <div class="stats-box col-xl-12 text-center">
                                            <strong>
                                                <div class="text-md my-0"><?= $row['nik'] ?></div>
                                                <div class="text-md my-0"><?= $row['nama'] ?></div>
                                                <div class="text-md my-0"><?= $row['nohp'] ?></div>
                                                <div class="text-md my-0"><?= $row['jenkel'] ?></div>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 col-xl-6 media justify-content-center">
                                        <img class="flex-fill" alt="QR-Code" src="<?= $row['url'] ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-xl-6 col-lg-6 text-center">
                                        <span class="badge text-lg text-primary"><?= $row['asal'] ?></span>
                                        <h6 class="mb-0"><?= $row['created_at'] ?></h6>
                                    </div>
                                    <div class="col-sm-6 col-xl-6 col-lg-6 text-center"> <span class="bg-inverse text-lg badge badge-<?= ($row['status'] == 'Cekin') ? "secondary" : "success" ?> "><?= $row['status'] ?></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-5 mx-auto">
                                    <h6 class="card-title text-md">TASK</h6>
                                    <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Keperluan<span class="float-right"><?= $row['keperluan'] ?></span></p>
                                    <p><i class="fa fa-dot-circle-o text-warning mr-2"></i><?= $row['nama_guru'] ?><span class="float-right"><?= $row['nama_bagian'] ?></span></p>
                                    <h6 class="card-title mt-2 text-md">Member</h6>
                                    <?php foreach ($data2 as $rom) : ?>
                                        <p><i class="fa fa-dot-circle-o text-success mr-2"></i><?= $rom['nama_rombongan'] ?><span class="float-right"><?= $row['asal'] ?></span></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center text-xl">QR-Code</h4>
                            <hr>
                            <div class="leave-info-box">
                                <div class="media align-items-center">
                                    <img class="col-12" alt="QR-Code" src="<?= $row['url'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>