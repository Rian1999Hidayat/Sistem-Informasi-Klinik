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

  <title>Klinik Thoriq Rizqi - Cipongkor : Data Transaksi</title>
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
            <span class="docs-normal">Kasir</span>
          </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('kasir')?>">
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
              <a class="nav-link active" href="<?php echo site_url('kasir/data_pembayaran') ?>">
                <i class="ni ni-money-coins text-yellow"></i>
                <span class="nav-link-text">Data Transaksi</span>
              </a>
            </li>
          </ul>

          <br><h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Tentang Klinik</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('kasir/info_klinik') ?>">
                <i class="ni ni-world-2 text-green"></i>
                <span class="nav-link-text text-white">Informasi Klinik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('kasir/info_kesehatan') ?>">
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
                <a href="<?php echo site_url('kasir/profile') ?>" class="dropdown-item">
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
            <div class="col-lg-10 col-10">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Data Transaksi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('kasir/data_pembayaran') ?>"><i class="ni ni-money-coins"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('kasir/data_pembayaran') ?>">Data Transaksi</a></li>
                  <li class="breadcrumb-item">Tambah Data Transaksi</li>
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
                  <?= $this->session->flashdata('pesan') ?>
                  <a href="<?php echo site_url('kasir/data_pembayaran') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>

                <form action="<?php echo site_url('kasir/ubah_data_pembayaran/'.$pembayaran->id_pembayaran) ?>" method="post" enctype="multipart/form-data">

                  <br>
                  <table>
                    <tr>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 20px;">FORM TAMBAH DATA TRANSAKSI</h6>
                      </td>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 700px;">* Wajib Diisi</h6>
                      </td>
                    </tr>
                  </table>
                  <hr class="my-4" />

                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Kode Akses pemilik</label>
                          <input type="password" name="kode_akses" id="kode_akses" class="form-control" placeholder="Kode Akses">
                          <?= form_error('kode_akses', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label"></label>
                          <input type="hidden" name="a" id="a" class="form-control" placeholder="Kode Akses" value="<?php echo $pembayaran->id_pembayaran ?>">
                        </div>
                      </div>

                    </div>
                      <div class="form-group">
                        <input class="btn btn-success bg-gradient-success" type="submit" name="lanjut" value="Lanjut">
                      </div>
                    </div>

                    </div>
                </div>

                    
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

  <script type="text/javascript">
    <?php echo $jsArray2; ?>
    function changeValue2(id){
      document.getElementById('id_obat').value = rspName[id].id_obat;
      document.getElementById('nama_obat').value = rspName[id].nama_obat;
      document.getElementById('harga_obat').value = rspName[id].harga_obat;
      document.getElementById('stok_obat').value = rspName[id].stok_obat;
      document.getElementById('id_pasien').value = rspName[id].id_pasien;
      document.getElementById('nama_pasien').value = rspName[id].nama_pasien;
    }  
  </script>

  <script type="text/javascript">
    <?php echo $jsArray3; ?>
    function changeValue3(id){
      document.getElementById('biaya_konsultasi').value = kslName[id].harga_konsultasi;
    }  
  </script>

  <script type="text/javascript">
    function hitung(){
      var a = document.getElementById('harga_obat').value;
      var b = document.getElementById('biaya_konsultasi').value;
      var c = document.getElementById('biaya_pengobatan').value;

      var hasil = parseInt(a)+parseInt(b)+parseInt(c);
      if(!isNaN(hasil)){
        document.getElementById('total_bayar').value = hasil;
      }
    }  
  </script>

  <script type="text/javascript">
    function hitung2(){
      var r = document.getElementById('total_bayar').value;
      var s = document.getElementById('jumlah_bayar').value;
      var hsl = parseInt(s)-parseInt(r);
      if(!isNaN(hsl)){
        document.getElementById('kembalian').value = hsl;
      }
    }  
  </script>
  
</body>

</html>
