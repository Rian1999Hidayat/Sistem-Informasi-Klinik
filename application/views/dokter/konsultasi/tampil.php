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

  <title>Klinik Thoriq Rizqi - Cipongkor : Data Konsultasi</title>
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
            <span class="docs-normal">Dokter</span>
          </h6>
          
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter')?>">
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
              <a class="nav-link passive" href="<?php echo site_url('dokter/data_kunjungan') ?>">
                <i class="ni ni-badge text-red"></i>
                <span class="nav-link-text text-white">Data Kunjungan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/data_pasien') ?>">
                <i class="ni ni-paper-diploma text-success"></i>
                <span class="nav-link-text text-white">Data Pasien</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/data_rekam_medis') ?>">
                <i class="ni ni-collection text-yellow"></i>
                <span class="nav-link-text text-white">Data Rekam Medis</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/data_resep') ?>">
                <i class="ni ni-bullet-list-67 text-info"></i>
                <span class="nav-link-text text-white">Data Resep</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('dokter/data_konsultasi') ?>">
                <i class="ni ni-archive-2 text-pink"></i>
                <span class="nav-link-text">Data Konsultasi</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/stok_obat') ?>">
                <i class="ni ni-ui-04 text-danger"></i>
                <span class="nav-link-text text-white">Stok Obat</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/info_klinik') ?>">
                <i class="ni ni-world-2 text-success"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/info_kesehatan') ?>">
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
                <a href="<?php echo site_url('dokter/profile') ?>" class="dropdown-item">
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
              <h6 class="h2 text-white d-inline-block mb-0">Data Konsultasi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><i class="ni ni-archive-2"></i></li>
                  <li class="breadcrumb-item">Data Konsultasi</li>
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
              <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                  <div class="row align-items-center py-4">
                    <div class="col-lg-8 col-7">
                      <h3 class="text-white mb-0"><a href="<?php echo site_url('dokter/tambah_data_konsultasi') ?>" class="btn btn-small text-info"><i class="fas fa-plus"></i> TAMBAH DATA KONSULTASI</a></h3>
                    </div>
                    <div class="col-lg-4 col-6 text-right"> 
                      <?php echo form_open('dokter/cari_data_konsultasi') ?>
                        <table>
                          <tr>
                            <td style="width : 230px;"><input type="text" name="keyword" class="form-control" placeholder="Cari..."></td>
                            <td><button type="submit" class="btn btn-info bg-gradient-info">Cari</button></td>
                          </tr>
                        </table>
                      <?php echo form_close() ?>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush table-hover">
                      <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col" class="sort" data-sort="name">No</th>
                            <th scope="col" class="sort" data-sort="budget">ID KONSULTASI</th>
                            <th scope="col" class="sort" data-sort="status">TANGGAL DAFTAR</th>
                            <th scope="col">NAMA PASIEN</th>
                            <th scope="col" class="sort" data-sort="completion">NAMA DOKTER</th>
                            <th scope="col" class="sort" data-sort="completion">LAMA KONSULTASI</th>
                            <th scope="col" colspan="2">AKSI</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $no=1; ?>
                        <?php foreach ($data->result() as $data_konsultasi): ?>
                        <tr align="center">
                          <th scope="row">
                            <div class="media align-items-center">
                              
                              <div class="media-body">
                                <span class="name mb-0 text-sm"><?php echo $no; $no++; ?></span>
                              </div>
                            </div>
                          </th>
                            <td>
                               <?php echo $data_konsultasi->id_konsultasi ?>
                            </td>
                            <td>
                               <?php echo $data_konsultasi->tanggal_daftar?>
                            </td>
                            <td>
                               <?php echo $data_konsultasi->nama_pasien ?>
                            </td>
                            <td>
                               <?php echo $data_konsultasi->nama_dokter ?>
                            </td>
                            <td>
                               <?php echo $data_konsultasi->lama_konsultasi." Minggu " ?>
                            </td>
                            <td>
                              <a href="<?php echo site_url('dokter/detail_data_konsultasi/'.$data_konsultasi->id_konsultasi) ?>" class="btn btn-small text-green"><i class="fas fa-book"></i> DETAIL</a>
                              <a href="<?php echo site_url('dokter/ubah_data_konsultasi/'.$data_konsultasi->id_konsultasi) ?>" class="btn btn-small text-yellow"><i class="fas fa-edit"></i> UBAH</a>
                              <a onclick="deleteConfirm('<?php echo site_url('dokter/hapus_data_konsultasi/'.$data_konsultasi->id_konsultasi) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> HAPUS</a>
                            </td>
                            <td>
                              <?php if ($data_konsultasi->nama_dokter == $user['name']): ?>
                                <a href="<?php echo site_url('dokter/lihat_pesan/'.$data_konsultasi->id_konsultasi) ?>" class="btn btn-small text-yellow"><i class="ni ni-email-83"></i> LIHAT PESAN</a>
                              <?php endif ?>
                            </td>
                          </tr>

                          <?php  endforeach; ?>

                        </tbody>
                      </table>

                      <div class="card-footer py-4 bg-default">
                        <nav aria-label="...">
                          <ul class="pagination justify-content-end mb-0">
                            <?php echo $pagination; ?>
                          </ul>
                        </nav>
                      </div>

                    </div>
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
  
  <script type="text/javascript">
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
</body>

</html>
