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

  <title>Klinik Thoriq Rizqi - Cipongkor : Laporan Kunjungan</title>
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
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik')?>">
                <i class="fas fa-home text-info"></i>
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
              <a class="nav-link active" href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>">
                <i class="ni ni-badge text-red"></i>
                <span class="nav-link-text">Laporan Kunjungan</span>
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
                    <img alt="Image placeholder" src="<?= base_url('img/upload/'). $user['image'] ?>">
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
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-9 col-9">
              <h6 class="h2 text-white d-inline-block mb-0">Detail Data Kunjungan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>"><i class="ni ni-badge"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>">Data Kunjungan</a></li>
                  <li class="breadcrumb-item">Detail Data Kunjungan</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
        </div>
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row mt--5">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-upgrade">
            <div class="card-header text-center border-bottom-0">
              <br><h4 class="card-title text-blue">DETAIL DATA KUNJUNGAN</h4> 
            </div>
            <div class="card-body">
              <div class="table-responsive table-upgrade">
                <table class="table">
                  
                  <tbody>
                    <tr>
                      <td>No Identitas Kunjungan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->id_kunjungan ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Kunjungan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->tanggal_kunjungan ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas Dokter</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->id_dokter ?></td>
                    </tr>
                    <tr>
                      <td>Nama Dokter</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->nama_dokter ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas Pasien</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->nama_pasien ?></td>
                    </tr>
                    <!--tr>
                      <td>Jenis Kelamin</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $pasien->jenis_kelamin ?></td>
                    </tr-->
                    <tr>
                      <td>Alamat</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $kunjungan->alamat ?></td>
                    </tr>
                    <tr>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-right">
                        <a href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>" class="btn btn-round btn-info bg-gradient-info"> Kembali</a>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br><br><br><br><br>
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
  
</body>

</html>
