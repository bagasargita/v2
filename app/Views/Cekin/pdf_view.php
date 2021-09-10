<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="SoengSouy Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="SoengSouy Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/line-awesome.min.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/select2.min.css">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-datetimepicker.min.css">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/morris/morris.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery.tagsinput.css">
    <link href="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/toastr/toastr.min.css">

    <script src="<?= base_url() ?>/assets/js/jquery.tagsinput.js"></script>
    <script src="<?= base_url() ?>/assets/js/webcam.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/instascan.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/assets/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>/assets/alert.js"></script>
    <script src="<?= base_url() ?>/assets/login.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="content">
                <!-- title row -->
                <div class="row text-center">
                    <div class="col-2 invoice-header"> 
                        <img src="/assets/images/logoprov.png" width="120" alt="" class="px-2">
                    </div>
                    <div class="col-9 invoice-header content-center"> 
                        <span>
                            <h3>
                            PEMERINTAH PROVINSI JAWA TENGAH
                            </h3>
                        </span>
                        <span>
                            <h3>
                            DINAS PENDIDIKAN DAN KEBUDAYAAN
                            </h3>
                        </span>
                        <span>
                            <h4>
                            SEKOLAH MENENGAH KEJURUAN NEGERI 4 SEMARANG
                            </h4>
                        </span>
                        <small>
                        Jalan Pandanaran II/7 Telp (024)8311534 Fax. 8454673 Semarang 50241
                        Web: www.smk4smg.sch.id email: puskom@smk4smg.sch.id
                    </small>
                    </div>
                    
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info" style="border-bottom: 3px double;">

                </div>
                <?php foreach ($data1 as $row) : ?>
                    <div class="card-group mt-2">
                        <div class="card">
                            <div class="row">
                                <div class="col-5">
                                    <img class="card-img-top mt-4 ml-4" style="width: 360px;" src="<?= $row['url'] ?>" alt="Card image cap">
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <table class="table table-bordered mt-2">
                                            <thead>
                                                <h5 class="">Tanggal : <?= date('d F Y') ?></h6>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        Nama
                                                    </th>
                                                    <td>
                                                        <?= $row['nama'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">NIK</th>
                                                    <td>
                                                        <?= $row['nik'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Asal</th>
                                                    <td>
                                                        <?= $row['asal'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">No. Handphone</th>
                                                    <td>
                                                        <?= $row['nohp'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Instansi</th>
                                                    <td>
                                                        <?= $row['instansi'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Keperluan</th>
                                                    <td>
                                                        <?= $row['keperluan'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tujuan</th>
                                                    <td>
                                                        <?= $row['nama_guru'] ?>
                                                        (<?= $row['nama_bagian'] ?>)
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">No. Document</th>
                                                    <td>
                                                        <?= $row['no_document'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
            </div>
        </div>


        <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>

        <!-- Chart JS -->
        <script src="<?= base_url() ?>/assets/plugins/morris/morris.min.js"></script>
        <script src="<?= base_url() ?>/assets/plugins/raphael/raphael.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/chart.js"></script>
        <!-- Slimscroll JS -->
        <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.min.js"></script>
        <!-- Select2 JS -->
        <script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
        <!-- Datetimepicker JS -->
        <script src="<?= base_url() ?>/assets/js/moment.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Datatable JS -->
        <script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
        <!-- Custom JS -->
        <script src="<?= base_url() ?>/assets/js/app.js"></script>
        <script>
            window.addEventListener("load", window.print());
        </script>
</body>

</html>