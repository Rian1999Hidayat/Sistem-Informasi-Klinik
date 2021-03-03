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
              <h6 class="h2 text-white d-inline-block mb-0">Ubah Data Transaksi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('kasir/data_pembayaran') ?>"><i class="ni ni-money-coins"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('kasir/data_pembayaran') ?>">Data Transaksi</a></li>
                  <li class="breadcrumb-item">Ubah Data Transaksi</li>
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
                  <a href="<?php echo site_url('kasir/hak_akses/'.$pembayaran->id_pembayaran) ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>

                <form action="<?php echo site_url('kasir/form_ubah/'.$pembayaran->id_pembayaran) ?>" method="post" enctype="multipart/form-data">

                  <br>
                  <table>
                    <tr>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 20px;">FORM UBAH DATA TRANSAKSI</h6>
                      </td>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 720px;">* Wajib Diisi</h6>
                      </td>
                    </tr>
                  </table>
                  <hr class="my-4" />
                  
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Transaksi</label>
                          <input type="text" name="id_pembayaran" id="id_pembayaran" class="form-control <?php echo form_error('id_pembayaran') ? 'is-invalid':''?>" placeholder="Id pembayaran" readonly value="<?php echo $pembayaran->id_pembayaran ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id_pembayaran') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal Transaksi *</label>
                          <input type="text" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control <?php echo form_error('tanggal_pembayaran') ? 'is-invalid':''?>" placeholder="Tanggal Transaksi" value="<?php echo $pembayaran->tanggal_pembayaran ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('tanggal_pembayaran') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Resep *</label>
                          <select name="id_resep" id="id_resep" class="form-control" onchange="changeValue2(this.value)">
                            <option value="<?php echo $pembayaran->id_resep ?>"><?php echo $pembayaran->id_resep ?></option>
                            <?php
                            $jsArray2 = "var rspName = new Array();\n";
                              foreach ($dataku2->result() as $data_resep) {
                                echo "<option value='$data_resep->id_resep'>".$data_resep->id_resep."</option>";
                                
                                $jsArray2 .= "rspName['".$data_resep->id_resep."']={id_obat:'".addslashes($data_resep->id_obat)."', nama_obat:'".addslashes($data_resep->nama_obat)."', harga_obat:'".addslashes($data_resep->harga_obat)."', stok_obat:'".addslashes($data_resep->stok_obat)."', id_pasien:'".addslashes($data_resep->id_pasien)."', nama_pasien:'".addslashes($data_resep->nama_pasien)."'};\n";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Obat *</label>
                          <input type="text" name="id_obat" id="id_obat" class="form-control <?php echo form_error('id_obat') ? 'is-invalid':''?>" placeholder="Id Obat" value="<?php echo $pembayaran->id_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('id_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Obat *</label>
                          <input type="text" name="nama_obat" id="nama_obat" class="form-control <?php echo form_error('nama_obat') ? 'is-invalid':''?>" placeholder="Nama Obat" value="<?php echo $pembayaran->nama_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Harga Obat *</label>
                          <input type="text" name="harga_obat" id="harga_obat" class="form-control <?php echo form_error('harga_obat') ? 'is-invalid':''?>" placeholder="Harga Obat" value="<?php echo $pembayaran->harga_obat ?>" readonly onkeyup="hitung();">
                          <div class="invalid-feedback">
                            <?php echo form_error('harga_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Konsultasi *</label>
                          <select name="id_konsultasi" id="id_konsultasi" class="form-control" onchange="changeValue3(this.value)">
                            <option value="<?php echo $pembayaran->id_konsultasi ?>"><?php echo $pembayaran->id_konsultasi ?></option>
                            <option>Tidak Konsultasi</option>
                            <?php
                            $jsArray3 = "var kslName = new Array();\n";
                              foreach ($dataku3->result() as $data_konsultasi) {
                                echo "<option value='$data_konsultasi->id_konsultasi'>".$data_konsultasi->id_konsultasi." - ".$data_konsultasi->nama_pasien."</option>";
                                
                                $jsArray3 .= "kslName['".$data_konsultasi->id_konsultasi."']={harga_konsultasi:'".addslashes($data_konsultasi->harga_konsultasi)."'};\n";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Biaya Konsultasi *</label>
                          <input type="text" name="biaya_konsultasi" id="biaya_konsultasi" class="form-control <?php echo form_error('biaya_konsultasi') ? 'is-invalid':''?>" placeholder="Biaya Konsultasi" value="<?php echo $pembayaran->biaya_konsultasi ?>" readonly onkeyup="hitung();">
                          <div class="invalid-feedback">
                            <?php echo form_error('biaya_konsultasi') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Pasien *</label>
                          <input type="text" name="id_pasien" id="id_pasien" class="form-control <?php echo form_error('id_pasien') ? 'is-invalid':''?>" placeholder="Id Pasien" value="<?php echo $pembayaran->id_pasien ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('id_pasien') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Pasien *</label>
                          <input type="text" name="nama_pasien" id="nama_pasien" class="form-control <?php echo form_error('nama_pasien') ? 'is-invalid':''?>" placeholder="Nama Pasien" value="<?php echo $pembayaran->nama_pasien ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_pasien') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Biaya Pengobatan *</label>
                          <input type="text" name="biaya_pengobatan" id="biaya_pengobatan" class="form-control <?php echo form_error('biaya_pengobatan') ? 'is-invalid':''?>" placeholder="Biaya Pengobatan" value="<?php echo $pembayaran->biaya_pengobatan ?>" onkeyup="hitung();">
                          <div class="invalid-feedback">
                            <?php echo form_error('biaya_pengobatan') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Total Bayar *</label>
                          <input type="text" name="total_bayar" id="total_bayar" class="form-control <?php echo form_error('total_bayar') ? 'is-invalid':''?>" placeholder="Total Bayar" value="<?php echo $pembayaran->total_bayar ?>" readonly onkeyup="hitung2();">
                          <div class="invalid-feedback">
                            <?php echo form_error('total_bayar') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Jumlah Bayar *</label>
                          <input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control <?php echo form_error('jumlah_bayar') ? 'is-invalid':''?>" placeholder="Jumlah Bayar" value="<?php echo $pembayaran->jumlah_bayar ?>" onkeyup="hitung2();">
                          <div class="invalid-feedback">
                            <?php echo form_error('jumlah_bayar') ?>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Kembalian *</label>
                          <input type="text" name="kembalian" id="kembalian" class="form-control <?php echo form_error('kembalian') ? 'is-invalid':''?>" placeholder="Kembalian" value="<?php echo $pembayaran->kembalian ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('kembalian') ?>
                          </div>
                        </div>
                      </div>

                    </div>
                      <div class="form-group">
                        <input class="btn btn-success bg-gradient-success" type="submit" name="simpan" value="Simpan">
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="stok_obat" id="stok_obat" readonly class="form-control <?php echo form_error('stok_obat') ? 'is-invalid':''?>" placeholder="Harga Obat" value="<?php $pembayaran->stok_obat ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('stok_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" readonly class="form-control <?php echo form_error('id') ? 'is-invalid':''?>" placeholder="Harga Obat" value="<?php $pembayaran->id_pembayaran ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id') ?>
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
