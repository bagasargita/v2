<?= $this->extend('Layout/master'); ?>
<?= $this->section('pages'); ?>
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row justify-content-between">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <div class="dash-widget-info">
                            <h3><?= $data2 ?></h3> <span>Visit</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                        <div class="dash-widget-info">
                            <h3>44</h3> <span>Clients</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                            <h3><?= $data ?></h3> <span>Departement</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">

                            <h3>
                                <?= $data1 ?>
                            </h3>

                            <span>Employees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Grafik Data Seminggu</h3>
                                <div id="bar-charts"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Sales Overview</h3>
                                <div id="line-charts"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<script>
    $(document).ready(function() {

        // Bar Chart

        Morris.Bar({
            element: 'bar-charts',
            data: <?php echo $chart; ?>,
            xkey: 'created_at',
            ykeys: ['total'],
            labels: ['Total Tamu'],
            lineColors: ['#f43b48', '#453a94'],
            lineWidth: '3px',
            barColors: ['#f43b48', '#453a94'],
            resize: true,
            redraw: true
        });

        // Line Chart

        // Morris.Line({
        //     element: 'line-charts',
        //     data: <?php echo $line; ?>,
        //     xkey: 'created_at',
        //     ykeys: ['total'],
        //     labels: ['Total Tamu'],
        //     lineColors: ['#f43b48', '#453a94'],
        //     lineWidth: '3px',
        //     resize: true,
        //     redraw: true
        // });

    });
</script>

<?= $this->endSection(); ?>