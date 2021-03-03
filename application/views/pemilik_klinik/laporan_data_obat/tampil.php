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

  <title>Klinik Thoriq Rizqi - Cipongkor : Laporan Data Obat</title>
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
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_kunjungan') ?>">
                <i class="ni ni-badge text-red"></i>
                <span class="nav-link-text text-white">Laporan Kunjungan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('pemilik_klinik/laporan_rekam_medis') ?>">
                <i class="ni ni-collection text-success"></i>
                <span class="nav-link-text  text-white">Laporan Rekam Medis</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('pemilik_klinik/laporan_data_obat') ?>">
                <i class="ni ni-ui-04 text-yellow"></i>
                <span class="nav-link-text">Laporan Data Obat</span>
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
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Laporan Data Obat</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><i class="ni ni-ui-04"></i></li>
                  <li class="breadcrumb-item">Laporan Data Obat</li>
                </ol>
              </nav>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Laporan <br>Data Obat </h5><p></p>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_data_obat; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                        <i class="ni ni-ui-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-info mr-2"><i class="ni ni-ui-04"></i> &nbsp;Laporan Data Obat</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">LAPORAN <br>PEMASUKAN OBAT</h5><p></p>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_pemasukan_obat; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-ui-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-info mr-2"><i class="ni ni-ui-04"></i> &nbsp;Laporan Pemasukan</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">LAPORAN <br>PENGELUARAN OBAT</h5><p></p>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_pengeluaran_obat; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="ni ni-ui-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-info mr-2"><i class="ni ni-ui-04"></i> &nbsp;Laporan Pengeluaran</span>
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
        <div class="col-xl-12">
          <div class="row">
            <div class="col">
              <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                  <div class="row align-items-center py-4">
                    <div class="col-lg-8 col-7">
                      <a href="<?php echo site_url('pemilik_klinik/cetak_laporan_data_obat') ?>" class="btn btn-small text-info"><i class="fas fa-print"></i> CETAK LAPORAN DATA OBAT</a>
                      <br><a href="<?php echo site_url('pemilik_klinik/form_cetak_data_pemasukan') ?>" class="btn btn-small text-info"><i class="fas fa-print"></i> CETAK LAPORAN PEMASUKAN OBAT</a>
                      <br><a href="<?php echo site_url('pemilik_klinik/form_cetak_data_pengeluaran') ?>" class="btn btn-small text-info"><i class="fas fa-print"></i> CETAK LAPORAN PENGELUARAN OBAT</a>
                    </div>
                    
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush table-hover">
                      <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col" class="sort" data-sort="name">No</th>
                            <th scope="col" class="sort" data-sort="budget">ID OBAT</th>
                            <th scope="col" class="sort" data-sort="status">NAMA OBAT</th>
                            <th scope="col" class="sort" data-sort="status">HARGA OBAT</th>
                            <th scope="col" class="sort" data-sort="completion">STOK</th>
                            <th scope="col">AKSI</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $no=1; ?>
                        <?php foreach ($data->result() as $data_obat): ?>
                        <tr align="center">
                          <th scope="row">
                            <div class="media align-items-center">
                              
                              <div class="media-body">
                                <span class="name mb-0 text-sm"><?php echo $no; $no++; ?></span>
                              </div>
                            </div>
                          </th>
                            <td>
                               <?php echo $data_obat->id_obat ?>
                            </td>
                            <td>
                              <?php echo $data_obat->nama_obat ?>
                            </td>
                            <td>
                              <?php echo "Rp. ".$data_obat->harga_obat ?>
                            </td>
                            <td>
                              <?php echo $data_obat->stok_obat ?>
                            </td>
                            <td>
                              <a href="<?php echo site_url('pemilik_klinik/detail_laporan_data_obat/'.$data_obat->id_obat) ?>" class="btn btn-small text-green"><i class="fas fa-book"></i> DETAIL</a>
                            </td>
                          </tr>
                          
                          

                          <?php  endforeach; ?>

                          <tr align="center">
                            <td colspan="5" class="text-yellow" align="right"><b>TOTAL BIAYA PEMASUKAN OBAT</b></td>
                            <td><?php foreach ($jumlah_total_pengeluaran as $total) {} ?>
                              <?php echo "Rp. ".$total->bk ?>
                            </td>
                          </tr>

                          <tr align="center">
                            <td colspan="5" align="right" class="text-yellow"><b>TOTAL BIAYA PENGELUARAN OBAT</b></td>
                            <td>
                              <?php foreach ($jumlah_total_pemasukan as $total) {} ?>
                              <?php echo "Rp. ".$total->bm ?>
                              </td>
                          </tr>

                        </tbody>
                      </table>

                      <br><br>
                      <div class="col-lg-8 col-7">
                        <h4 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DETAIL PEMASUKAN OBAT</h4><br>
                      </div>

                      <table class="table align-items-center table-dark table-flush table-hover">
                      <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col" class="sort" data-sort="name">NO</th>
                            <th scope="col" class="sort" data-sort="name">TANGGAL PEMASUKAN</th>
                            <th scope="col" class="sort" data-sort="budget">ID OBAT</th>
                            <th scope="col" class="sort" data-sort="status">HARGA OBAT</th>
                            <th scope="col" class="sort" data-sort="completion">STOK</th>
                            <th scope="col">BIAYA KELUAR</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $no=1; ?>
                        <?php foreach ($data2->result() as $data_obat): ?>
                        <tr align="center">
                          <th scope="row">
                            <div class="media align-items-center">
                              
                              <div class="media-body">
                                <span class="name mb-0 text-sm"><?php echo $no; $no++; ?></span>
                              </div>
                            </div>
                          </th>
                            <td>
                               <?php echo $data_obat->tanggal_pemasukan ?>
                            </td>
                            <td>
                              <?php echo $data_obat->id_obat ?>
                            </td>
                            <td>
                              <?php echo "Rp. ".$data_obat->harga_obat ?>
                            </td>
                            <td>
                              <?php echo $data_obat->stok_obat ?>
                            </td>
                            <td>
                              <?php echo "Rp. ".$data_obat->biaya_keluar ?>
                            </td>
                          </tr>
                          
                          

                          <?php  endforeach; ?>

                          <tr align="center">
                            <td colspan="5" class="text-yellow" align="right"><b>TOTAL BIAYA KELUAR</b></td>
                            <td><?php foreach ($jumlah_total_pengeluaran as $total) {} ?>
                              <?php echo "Rp. ".$total->bk ?>
                            </td>
                          </tr>

                        </tbody>
                      </table>

                      <br><br>
                      <div class="col-lg-8 col-7">
                        <h4 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DETAIL PENGELUARAN OBAT</h4><br>
                      </div>

                      <table class="table align-items-center table-dark table-flush table-hover">
                      <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col" class="sort" data-sort="name">NO</th>
                            <th scope="col" class="sort" data-sort="name">TANGGAL PENGELUARAN</th>
                            <th scope="col" class="sort" data-sort="budget">ID OBAT</th>
                            <th scope="col" class="sort" data-sort="status">HARGA OBAT</th>
                            <th scope="col" class="sort" data-sort="completion">STOK</th>
                            <th scope="col">BIAYA MASUK</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $no=1; ?>
                        <?php foreach ($data3->result() as $data_obat): ?>
                        <tr align="center">
                          <th scope="row">
                            <div class="media align-items-center">
                              
                              <div class="media-body">
                                <span class="name mb-0 text-sm"><?php echo $no; $no++; ?></span>
                              </div>
                            </div>
                          </th>
                            <td>
                               <?php echo $data_obat->tanggal_pengeluaran ?>
                            </td>
                            <td>
                              <?php echo $data_obat->id_obat ?>
                            </td>
                            <td>
                              <?php echo "Rp. ".$data_obat->harga_obat ?>
                            </td>
                            <td>
                              <?php echo $data_obat->stok_obat ?>
                            </td>
                            <td>
                              <?php echo "Rp. ".$data_obat->biaya_masuk ?>
                            </td>
                          </tr>
                          
                          

                          <?php  endforeach; ?>

                          <tr align="center">
                            <td colspan="5" class="text-yellow" align="right"><b>TOTAL BIAYA MASUK</b></td>
                            <td><?php foreach ($jumlah_total_pemasukan as $total) {} ?>
                              <?php echo "Rp. ".$total->bm ?>
                            </td>
                          </tr>

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

    <!-- Page content -->
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
