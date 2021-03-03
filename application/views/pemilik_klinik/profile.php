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

  <title>Klinik Thoriq Rizqi - Cipongkor : Profile</title>
  <?php $this->load->view("_partials/head.php") ?>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-default" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <table align="center" valign="top">
            <tr>
              <td rowspan="2"><img style="width: 65px; min-height: 65px;" src="<?php echo base_url('img/logo/logo.png')?>" class="navbar-brand-img"></td>
              <td><h2 class="text-white">K L I N I K</h2></td>
            </tr>
            <tr>
              <td><h6 class="text-white">Thoriq Rizqi Cipongkor</h6></td>
            </tr>
          </table>
        </a>
      </div>
      <br>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Pemilik Klinik</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik')?>">
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text text-white">Beranda</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <!--hr class="my-3"-->
          <!-- Heading -->
          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Laporan</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>">
                <i class="ni ni-badge text-red"></i>
                <span class="nav-link-text text-white">Laporan Kunjungan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_rekam_medis') ?>">
                <i class="ni ni-collection text-success"></i>
                <span class="nav-link-text text-white">Laporan Rekam Medis</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_data_obat') ?>">
                <i class="ni ni-ui-04 text-yellow"></i>
                <span class="nav-link-text text-white">Laporan Data Obat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_transaksi') ?>">
                <i class="ni ni-money-coins text-info"></i>
                <span class="nav-link-text text-white">Laporan Transaksi</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Data</span>
          </h6>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/data_pengguna') ?>">
                <i class="ni ni-single-02 text-pink"></i>
                <span class="nav-link-text text-white">Data Pengguna</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/info_klinik') ?>">
                <i class="ni ni-world-2 text-success"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/info_kesehatan') ?>">
                <i class="ni ni-world text-orange"></i>
                <span class="nav-link-text text-white">Informasi Kesehatan</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <marquee style="font-family: arial;">
              <h1 class="text-info"> SISTEM INFORMASI KLINIK</h4>
          </marquee>
          <!-- Navbar links -->
          
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('img/upload/'). $user['image']; ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $user['name'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Pengaturan</h6>
                </div>
                <a href="<?php echo site_url('pemilik_klinik/profile') ?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profile</span>
                </a>
                
                <div class="dropdown-divider"></div>
                <a onclick="logoutConfirm('<?php echo site_url('login/logout') ?>')" href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Keluar</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(<?php echo base_url('img/theme/sketch.jpg'); ?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-info opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h4 class="display-2 text-white">Selamat Datang <br><?= $user['name'] ?></h4>
            <p class="text-white mt-0 mb-5"><i>"Kunci Kegagalan adalah berusaha menyenangkan semua orang". </i>Yang paling berhak memutuskan pilihan dalam hidup adalah diri anda sendiri. <br> <b>Ini adalah halaman profil anda. Anda Login sebagai Pemilik Klinik. Anda dapat melihat dan mengelola data diri anda disini.</b></p>
            <a href="" class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?php echo base_url('img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?= base_url('img/upload/'). $user['image']; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <!--a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a-->
              </div>
            </div>
            <br>
            <div class="card-body pt-0">
              <br>
              <br>
              <div class="text-center">
                <h5 class="h3">
                  <?= $user['name'] ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?= $user['email'] ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Pemilik Klinik
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Klinik Thoriq Rizqi Cipongkor
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
              </div>
            </div>

            <div class="card-body">
              <?= form_open_multipart('pemilik_klinik/profile'); ?>
                <h6 class="heading-small text-muted mb-4">Data Pengguna</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Pengguna</label>
                        <input type="text" name="name" class="form-control" placeholder="Username" value="<?= $user['name'] ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" readonly>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">

                    <div class="col-lg-2">
                        <label class="form-control-label" for="input-username">Gambar</label>
                    </div>

                    <div class="col-lg-4">
                        <img src="<?= base_url('img/upload/'). $user['image']; ?>" class="img-thumbnail">
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="custom-file">
                        <label class="custom-file-label" for="image">Pilih File</label>
                        <input type="file" id="image" name="image" class="custom-file-input">
                        
                      </div>
                    </div>

                  </div>
                  <br>
                </div>

                <div class="col-6 text-left">
                  <button type="submit" class="btn btn-success mt-4 bg-gradient-success">Simpan Perubahan</button>
                </div>
                <!-- Address -->
                
              </form>

            <br>
              <hr class="my-4" />
              <br>

            <div class="row">
              <div class="col-lg-12">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>

              <?= form_open_multipart('pemilik_klinik/ubah_password'); ?>
                <h6 class="heading-small text-muted mb-4">Ubah Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="current_password">Password Lama</label>
                        <input type="password" id="current_password" name="current_password" class="form-control">
                        <?= form_error('current_password', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="new_password1">Password Baru</label>
                        <input type="password" name="new_password1" id="new_password1" class="form-control">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="new_password2">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password2" id="new_password2" class="form-control">
                        <?= form_error('new_password2', '<small class="text-danger pl-3">','</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>

                <div class="col-6 text-left">
                  <button type="submit" class="btn btn-success mt-4 bg-gradient-success">Ubah Password</button>
                </div>
                <!-- Address -->
                
              </form>

            </div>
          </div>
        </div>
      </div>
    </div><br><br><br><br><br>
      <!-- Footer -->
      <!-- Footer -->
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php $this->load->view("_partials/foot.php") ?>

  <?php $this->load->view("_partials/modal.php") ?>

  <script type="text/javascript">
    function logoutConfirm(url){
      $('#btn-logout').attr('href', url);
      $('#logoutModal').modal();
    }
  </script>
  
  <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(file_name);
    });
  </script>
</body>

</html>
