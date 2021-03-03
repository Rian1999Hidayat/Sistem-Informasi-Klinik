<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Login</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url('img/logo/logo.png')?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')?>">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/nucleo/css/nucleo.css')?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('assets/@fortawesome/fontawesome-free/css/all.min.css')?>" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/argon.css?v=1.2.0')?>" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-info py-5 py-lg-5 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Selamat Datang</h1>
              <p class="text-lead text-white">Halaman Login Klinik Thoriq Rizqi Cipongkor</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><h2>LOGIN</h2></div><br>
              
              <?= $this->session->flashdata('message') ?>
              <?= $this->session->flashdata('pesan') ?>
              <form method="post" action="<?= site_url('login') ?>">
                <div class="form-group">
                  
                  <input class="form-control" placeholder="Email" type="text" name="email" id="email"   value="<?= set_value('email') ?>" >
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  
                  <input class="form-control" placeholder="Password" type="password" name="password" id="password" />
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Ingat Saya</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success bg-gradient-info mt-4">Login</button>
                </div>
              </form>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="<?= site_url('login/konfirmasi_email') ?>" class="text-light"><small>Lupa Kata Sandi?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php $this->load->view("_partials/footer.php") ?>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js-cookie/js.cookie.js')?>"></script>
  <script src="<?php echo base_url('assets/jquery.scrollbar/jquery.scrollbar.min.js')?>"></script>
  <script src="<?php echo base_url('assets/jquery-scroll-lock/dist/jquery-scrollLock.min.js')?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('js/argon.js?v=1.2.0')?>"></script>
</body>

</html>