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

  <title>Klinik Thoriq Rizqi - Cipongkor : Informasi Klinik</title>
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
            <span class="docs-normal">Apoteker</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('apoteker')?>">
                <i class="fas fa-home text-info"></i>
                <span class="nav-link-text text-white">Beranda</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <!--hr class="my-3"-->
          <!-- Heading -->
          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Data</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('apoteker/data_obat') ?>">
                <i class="ni ni-ui-04 text-success"></i>
                <span class="nav-link-text text-white">Data Obat</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('apoteker/data_resep') ?>">
                <i class="ni ni-bullet-list-67 text-yellow"></i>
                <span class="nav-link-text text-white">Data Resep</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('apoteker/info_klinik') ?>">
                <i class="ni ni-world-2 text-info"></i>
                <span class="nav-link-text">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('apoteker/info_kesehatan') ?>">
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
                <a href="<?php echo site_url('apoteker/profile') ?>" class="dropdown-item">
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
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Informasi Klinik</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><i class="fas fa-globe"></i></li>
                  <li class="breadcrumb-item">Informasi Klinik</li>
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total <br>Pasien</h5><p></p>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_pasien; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                        <i class="ni ni-paper-diploma"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-info mr-2"><i class="ni ni-paper-diploma"></i> &nbsp;Data Pasien</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Kunjungan</h5><p></p>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_kunjungan; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-badge"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-info mr-2"><i class="ni ni-badge"></i> &nbsp;Data Kunjungan</span>
                  </p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      </div>
    <!-- Canvas -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 880px;"><br> 
                <h3 class="display-5 text-default" style="margin-left: 30px">LOKASI</h3>
                <p class="text-dark mt-0 mb-5" style="margin-left: 30px; margin-right : 30px">Klinik Umum Yayasan Thoriq Rizqi Cipongkor yang beralamat di Jln. PLTA Saguling Kp. Cibungur Desa Cijambu Kecamatan Cipongkor Kabupaten Bandung Barat, Jawa Barat 40564.</p>
                <h3 class="display-5 text-default" style="margin-left: 30px">SEJARAH SINGKAT</h3>
                <div class="header bg-gradient-info pb-6">
                  <div class="container-fluid ">
                    <div class="header-body">
                      <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        </div>
                      </div>
                      <!-- Card stats -->
                          <p class="text-white mt-0 mb-5" style="margin-left: 30px; margin-right : 30px">Pada awalnya Yayasan Thoriq Rizqi Cipongkor merupakan praktek dokter umum perseorangan yang dilakukan oleh Dr. Toto. Praktek ini mulai dirintis pada tanggal 12 September 2004. Salah  satu tujuan dari praktek dokter umum di daerah Cipongkor ini adalah ikut memberikan pelayanan kesehatan yang dilakukan oleh dokter untuk masyarakat di kecamatan Cipongkor dan sekitarnya. Dimana pada saat itu pelayanan kesehatan yang diberikan oleh dokter masih sangat kurang. Tujuan lainnya adalah untuk memberikan pelayanan kesehatan yang berkualitas yang seseuai dengan kaidah-kaidah pengobatan menurut ilmu kedokteran. <br><br>  Semakin berkembangnya jumlah kunjungan pasien dari bulan ke bulan semakin meningkat, sementara jam pelayanan masih sangat pendek yaitu mulai pukul 08.00 WIB sampai dengan pukul 12.00. Maka untuk memberikan pelayanan yang lebih optimal dengan waktu pelayanan yang lebih panjang, dibuat klinik umum yang dapat memberikan pelayanan kesehatan yang baik yaitu dengan ditambahnya beberapa pegawai dan dibuatnya apotek khusus di dalam klinik dan juga bertambah jam pelayanannya menjadi pukul 07.00 WIB sampai dengan pukul 16.00. Selain itu, pada tanggal 15 April 2018 klinik juga memberikan pelayanan konsultasi kesehatan kepada dokter, tetapi penjadwalan dalam konsultasi kesehatan ini masih belum terjadwal dengan baik, kadangkala konsultasi kesehatan dilakukan pada saat pasien berobat kesehatan. Dalam hal ini akan memakan waktu yang banyak sehingga terjadinya pelambatan dalam pelayanan kesehatan kepada pasien yang lain. <br><br>Dinamakan Klinik Thoriq Rizqi karena pemilik klinik mempunyai anak yang bernama Thoriq Rizqi. Dari nama tersebut diharapkan usaha klinik tersebut dapat membawa berkah khususnya untuk kemajuan klinik itu sendiri, umumnya untuk kesehaan banyak orang. Sehingga dengan adanya klinik ini diharapkan mampu meningkatkan kualitas kesehatan masyarakat yang ada dilingkungan klinik itu sendiri.</p>
              
                        </div>
                      </div>
                    </div>
                  </div>
                
            </div>
          </div>
        </div>
      </div><br><br><br>
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
