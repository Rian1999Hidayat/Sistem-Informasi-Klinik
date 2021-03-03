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

  <title>Klinik Thoriq Rizqi - Cipongkor : Informasi Kesehatan</title>
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
            <span class="docs-normal">Administrator</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('petugas_pendaftaran')?>">
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
              <a class="nav-link passive" href="<?php echo site_url('petugas_pendaftaran/data_pasien') ?>">
                <i class="ni ni-paper-diploma text-yellow"></i>
                <span class="nav-link-text text-white">Data Pasien</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('petugas_pendaftaran/data_kunjungan') ?>">
                <i class="ni ni-badge text-success"></i>
                <span class="nav-link-text text-white">Data Kunjungan</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('petugas_pendaftaran/info_klinik') ?>">
                <i class="ni ni-world-2 text-info"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('petugas_pendaftaran/info_kesehatan') ?>">
                <i class="ni ni-world text-orange"></i>
                <span class="nav-link-text">Informasi Kesehatan</span>
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
                <a href="<?php echo site_url('petugas_pendaftaran/profile') ?>" class="dropdown-item">
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
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Informasi Kesehatan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><i class="fas fa-globe"></i></li>
                  <li class="breadcrumb-item">Informasi Kesehatan</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                
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
            <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 730px;"><br>	
            		<h3 class="display-5 text-blue" style="margin-left: 30px">KESEHATAN</h3>
            		<p class="text-dark mt-0 mb-5" style="margin-left: 30px; margin-right : 30px">Kesehatan merupakan keadaan yang sejahtera dari badan, jiwa dan sosial yang diupayakan melalui tindakan menjaga, memelihara dan meningkatkan derajat kesehatannya sehingga bisa hidup produktif dan mempunyai tenaga yang sebaik-baiknya.</p>
            		<h3 class="display-5 text-blue" style="margin-left: 30px">MOTIVASI KESEHATAN</h3>
            	
                <div class="header bg-gradient-info pb-6">
                  <div class="container-fluid">
                    <div class="header-body">
                      <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        </div>
                      </div>
                      <!-- Card stats -->
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Yang terbesar dari kebodohan adalah mengorbankan kesehatan untuk jenis lain dari kebahagian</h5>
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                      <i class="ni ni-atom"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~Arthur Schopenhauer~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Waktu dan kesehatan adalah dua aset berharga yang tidak kita kenali dan hargai sampai mereka telah habis</h5><br>  
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                      <i class="ni ni-time-alarm"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~Denis Waitley~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Aku memiliki prinsip keseimbangan untuk mencapai kehidupan yang tentram. Yakni cinta, kesehatan dan kemapanan</h5>
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                      <i class="ni ni-favourite-28"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~James Thur~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Pikiran yang tenang membawa kekuatan batin dan rasa percaya diri, sehingga itu sangat penting untuk kesehatan yang baik</h5><br>  
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                      <i class="ni ni-bulb-61"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~Dalai Lama XIV~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Dalam kesehatan terdapat kebebasan. Kesehatan adalah hal paling pertama dalam semua kebebasan</h5><br><p>  </p>
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                      <i class="ni ni-user-run"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~James Thur~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-6">
                          <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                    <h5 class="card-title  mb-0">Ketika hati, pikiran dan perasaan mampu mengendalikan amarah, nafsu dan emosi. Disanalah kesehatan menjadi tolak ukur kebahagian.</h5> 
                                  </div>
                                  <div class="col-auto">
                                   <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                      <i class="ni ni-diamond"></i>
                                    </div>
                                  </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                  <span class="text-red mr-2">~Rian Hidayat~</span>
                                </p>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div> 
              </div>                    
            </div>
          </div>
        </div>
      </div><br><br><br><br><br>
    <!-- Page content -->
    
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
