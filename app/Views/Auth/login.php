<?= $this->extend('Auth/layout') ?>
<?= $this->section('content') ?>
<div class="main-wrapper">
    <div class="account-content">
        <!-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> -->
        <div class="container">
            <!-- Account Logo -->
            <div class="account-logo">
                <a href="index.html"><img src="<?= base_url() ?>/assets/images/logo.png" alt="SMK 4 Semarang"></a>
            </div>

            <!-- /Account Logo -->
            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Login</h3>
                    <p class="account-subtitle">Access to our dashboard</p>
                    <?php if (!empty(session()->getFlashdata('msg'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('msg'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Account Form -->
                    <form method="POST" action="<?= site_url('AuthController/loginprosess'); ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="InputForEmail" class="form-label">Email Address</label>
                            <input id="InputForEmail" type="email" class="form-control" name="email" value="" placeholder="Enter email">

                            <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="InputForPassword" class="form-label">Password</label>
                                </div>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" id="InputForPassword">

                            <span class="invalid-feedback" role="alert">
                                <strong></strong>
                            </span>

                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>