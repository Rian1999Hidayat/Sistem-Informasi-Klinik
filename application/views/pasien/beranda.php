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

  <title>Klinik Thoriq Rizqi - Cipongkor : Beranda</title>
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
            <span class="docs-normal">Pasien</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('pasien')?>">
                <i class="fas fa-home text-info"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <!--hr class="my-3"-->
          <!-- Heading -->
          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Konsultasi</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
              <a class="nav-link passive" type="submit" href="<?php echo site_url('pasien/pesan_konsultasi') ?>">
                <i class="ni ni-email-83 text-yellow"></i>
                <span class="nav-link-text text-white">Pesan Konsultasi</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pasien/info_klinik') ?>">
                <i class="ni ni-world-2 text-success"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pasien/info_kesehatan') ?>">
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
                    <img alt="Image placeholder" src="<?php echo base_url('img/upload/') . $user['image'] ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $user['name']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Pengaturan</h6>
                </div>
                <a href="<?php echo site_url('pasien/profile') ?>" class="dropdown-item">
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
    <div class="header bg-gradient-info pb-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-2">
            
        </div>
      </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="container-fluid d-flex align-items-center">
                <div class="row">
                  <div class="col-lg-12 col-md-12"><br>
                    <h4 class="display-2 text-white">Selamat Datang Pasien</h4>
                    <p class="text-white mt-0 mb-5">Anda login sebagai pasien. Anda bisa melakukan konsultasi dengan dokter.</p><br><br><br><br><br><br><br><br>
                  </div>
              </div>
            </div>
          </div>
          </div>
        </div><br><br><br><br><br>
      </div>
    </div>
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
