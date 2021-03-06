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

  <title>Klinik Thoriq Rizqi - Cipongkor : Pesan Konsultasi</title>
  <?php $this->load->view("_partials/head.php") ?>
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/cs.css')?>">


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
              <a class="nav-link passive" href="<?php echo site_url('pasien')?>">
                <i class="fas fa-home text-info"></i>
                <span class="nav-link-text text-white">Beranda</span>
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
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('pasien/pesan_konsultasi') ?>">
                <i class="ni ni-email-83 text-yellow"></i>
                <span class="nav-link-text">Pesan Konsultasi</span>
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
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Konsultasi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><i class="ni ni-email-83"></i></li>
                  <li class="breadcrumb-item">Pesan Konsultasi</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Canvas -->
    <div class="container-fluid mt--8 bg-gradient-info">
      <div class="row mt-5 bg-gradient-info">
        <div class="col-md-8 offset-md-2 col-sm-6 offset-sm-3 col-12 comments-main bg-gradient-default pt-4 rounded">
          <div>
            <table>
              <?php foreach ($image as $data_image): ?>
              <tr>
                <td><span class="avatar avatar-sm rounded-circle"><img id="profile-photo" src="<?php echo base_url('img/upload/') . $data_image->image ?>" /></span></td>
                <td><span><h3 class="text-info">&nbsp;&nbsp;<?php echo $data_image->name ?></h3></span></td>
              </tr>
              <?php  endforeach; ?>
            </table>
          
          <form action="<?php echo site_url('pasien/kirim_pesan/'.$data->id_konsultasi) ?>" method="post" enctype="multipart/form-data">
          <div class="row comment-box-main p-3 rounded-bottom bg-gradient-default">
              <div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
              <input type="hidden" id="id_konsultasi" name="id_konsultasi" class="form-control" value="<?php echo $data->id_konsultasi; ?>" />
              <input type="text" id="pesan" name="pesan" class="form-control" placeholder="Tulis Pesan ..." />
              <input type="hidden" id="pasien" name="pasien" class="form-control" placeholder="Tulis Pesan ..." value="<?php echo $data->nama_pasien; ?>" />
              <input type="hidden" id="dokter" name="dokter" class="form-control" placeholder="Tulis Pesan ..." value="<?php echo $data->nama_dokter; ?>" />
              </div>
              <div class="col-md-3 col-sm-2 col-2 pl-3 text-center send-btn">
                <button type="submit" class="btn btn-success bg-gradient-success" style="width: 80%; height: 100%;">Kirim</button>
              </div>
          </div>

        </form>
        <hr style="height: 2px; box-shadow: 0 10px 10px -10px #ffffff inset;">

          <div class="scroll">
            <ul class="p-0">
              <li>
                <div class="row comments mb-2">
                  <?php foreach ($chat as $data_chat): ?>
                    
                      
                    <?php if ($data_chat->dari == $user['name']): ?>
                        <div class="col-md-2 col-sm-2 col-3 text-center user-img">
                          <span class="avatar avatar-sm rounded-circle"><img id="profile-photo" src="<?php echo base_url('img/upload/') . $user['image'] ?>" /></span>
                      </div>
                        <div class="col-md-9 col-sm-9 col-9 comment bg-gradient-green rounded mb-3">
                        <h4 class="m-0"><?php echo $data_chat->dari; ?></h4>
                          <time class="text-white ml-3"><?php echo $data_chat->waktu; ?></time>
                          <like></like>
                          <p class="mb-0 text-white"><?php echo $data_chat->pesan; ?></p>
                      </div>
                      <?php else: ?>
                       
                      <?php foreach ($image as $data_image): ?>
                        <div class="col-md-9 col-sm-9 col-9 comment bg-gradient-info rounded mb-3">
                        <h4 class="m-0"><?php echo $data_chat->dari; ?></h4>
                          <time class="text-white ml-3"><?php echo $data_chat->waktu; ?></time>
                          <like></like>
                          <p class="mb-0 text-white"><?php echo $data_chat->pesan; ?></p>
                      </div>
                      <div class="col-md-2 col-sm-3 col-3 text-center user-img">
                          <span class="avatar avatar-sm rounded-circle"><img id="profile-photo" src="<?php echo base_url('img/upload/') . $data_image->image ?>" /></span>
                      </div><?php  endforeach; ?>
                      <?php endif ?>
                      
                    

                  <?php  endforeach; ?>
                </div>
              </li>
            </ul>
          </div>

        </div><br>
      </div>
    </div><br><br><br><br>
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
