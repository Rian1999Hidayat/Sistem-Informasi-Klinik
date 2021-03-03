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

  <title>Klinik Thoriq Rizqi - Cipongkor : Data Obat</title>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
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
              <a class="nav-link active" href="<?php echo site_url('apoteker/data_obat') ?>">
                <i class="ni ni-ui-04 text-success"></i>
                <span class="nav-link-text">Data Obat</span>
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
              <a class="nav-link passive" href="<?php echo site_url('apoteker/info_klinik') ?>">
                <i class="ni ni-world-2 text-info"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
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
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-7 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Data Obat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('apoteker/data_obat') ?>"><i class="ni ni-ui-04"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('apoteker/data_obat') ?>">Data Obat</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Stok Obat</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
        </div>
        
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="row">
            <div class="col">
              <div class="card bg-white shadow">
                <div class="card-header">
                  <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success bg-gradient-success" role="alert">
                      <?php echo $this->session->flashdata('success'); ?>
                    </div>
                  <?php endif; ?>
                  <a href="<?php echo site_url('apoteker/data_obat') ?>"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                </div>

                <form action="" method="post" enctype="multipart/form-data">

                  <br>
                  <table>
                    <tr>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 20px;">FORM TAMBAH STOK OBAT</h6>
                      </td>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 735px;">* Wajib Diisi</h6>
                      </td>
                    </tr>
                  </table>
                  <hr class="my-4" />

                  <div class="pl-lg-4">
                    <div class="row">

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Stok Obat Saat Ini</label>
                          <input type="text" name="st_ob" id="st_ob" class="form-control <?php echo form_error('id_obat') ? 'is-invalid':''?>" placeholder="Id Obat" readonly value="<?php echo $obat->stok_obat ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal *</label>
                          <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control <?php echo form_error('tanggal_pemasukan') ? 'is-invalid':''?>" placeholder="Tanggal">
                          <div class="invalid-feedback">
                            <?php echo form_error('tanggal_pemasukan') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Tambah Stok *</label>
                          <input type="number" name="stok_obat" id="stok_obat" class="form-control <?php echo form_error('stok_obat') ? 'is-invalid':''?>" placeholder="Jumlah Stok">
                          <div class="invalid-feedback">
                            <?php echo form_error('stok_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="id_obat" id="id_obat" class="form-control <?php echo form_error('id_obat') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $obat->id_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('id_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input class="btn btn-success bg-gradient-success" type="submit" name="simpan" value="Tambah Stok">
                        </div>
                      </div>


                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="nama_obat" id="nama_obat" class="form-control <?php echo form_error('nama_obat') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $obat->nama_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="kategori_obat" id="kategori_obat" class="form-control <?php echo form_error('kategori_obat') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $obat->kategori_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('kategori_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="dosis" id="dosis" class="form-control <?php echo form_error('dosis') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $obat->dosis ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('dosis') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="harga_obat" id="harga_obat" class="form-control <?php echo form_error('harga_obat') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $obat->harga_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('harga_obat') ?>
                          </div>
                        </div>
                      </div>


                    </div>
                </div>

                    
                </form>
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
