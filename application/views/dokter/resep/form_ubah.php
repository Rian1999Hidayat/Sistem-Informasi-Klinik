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

  <title>Klinik Thoriq Rizqi - Cipongkor : Data Resep</title>
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
          <!-- Nav items -->
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
              <a class="nav-link active" href="<?php echo site_url('dokter/data_resep') ?>">
                <i class="ni ni-bullet-list-67 text-info"></i>
                <span class="nav-link-text">Data Resep</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link passive" href="<?php echo site_url('dokter/data_konsultasi') ?>">
                <i class="ni ni-archive-2 text-pink"></i>
                <span class="nav-link-text text-white">Data Konsultasi</span>
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
              <h6 class="h2 text-white d-inline-block mb-0">Data Resep</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dokter/data_resep') ?>"><i class="ni ni-bullet-list-67"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dokter/data_resep') ?>">Data Resep</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Ubah Data Resep</li>
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
                  <a href="<?php echo site_url('dokter/data_resep') ?>"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                </div>

                <form action="" method="post" enctype="multipart/form-data">

                  <br>
                  <table>
                    <tr>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 20px;">FORM UBAH DATA RESEP</h6>
                      </td>
                      <td>
                        <h6 class="heading-small text-muted mb-4" style="margin-left: 750px;">* Wajib Diisi</h6>
                      </td>
                    </tr>
                  </table>
                  <hr class="my-4" />

                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Resep</label>
                          <input type="text" name="id_resep" class="form-control <?php echo form_error('id_resep') ? 'is-invalid':''?>" placeholder="Id Resep" value="<?php echo $resep->id_resep ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('id_resep') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Rekam Medis *</label>
                          <select name="id_rekam_medis" id="id_rekam_medis" class="form-control" onchange="changeValue(this.value)">
                            <option value="<?php echo $resep->id_rekam_medis ?>"><?php echo $resep->id_rekam_medis ?></option>
                            <?php
                            $jsArray = "var rmName = new Array();\n";
                              foreach ($dataku->result() as $data_rekam_medis) {
                                echo "<option value='$data_rekam_medis->id_rekam_medis'>".$data_rekam_medis->id_rekam_medis."</option>";
                                
                                $jsArray .= "rmName['".$data_rekam_medis->id_rekam_medis."']={id_kunjungan:'".addslashes($data_rekam_medis->id_kunjungan)."', tanggal_kunjungan:'".addslashes($data_rekam_medis->tanggal_kunjungan)."', id_dokter:'".addslashes($data_rekam_medis->id_dokter)."', nama_dokter:'".addslashes($data_rekam_medis->nama_dokter)."', id_pasien:'".addslashes($data_rekam_medis->id_pasien)."', nama_pasien:'".addslashes($data_rekam_medis->nama_pasien)."', tanggal_lahir:'".addslashes($data_rekam_medis->tanggal_lahir)."', jenis_kelamin:'".addslashes($data_rekam_medis->jenis_kelamin)."', alamat:'".addslashes($data_rekam_medis->alamat)."'};\n";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Kunjungan *</label>
                          <input type="text" name="id_kunjungan" id="id_kunjungan" readonly class="form-control <?php echo form_error('id_kunjungan') ? 'is-invalid':''?>" placeholder="Id Kunjungan" value="<?php echo $resep->id_kunjungan ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id_kunjungan') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal Kunjungan *</label>
                          <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" readonly class="form-control <?php echo form_error('tanggal_kunjungan') ? 'is-invalid':''?>" placeholder="Tanggal Kunjungan" value="<?php echo $resep->tanggal_kunjungan ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('tanggal_kunjungan') ?>
                          </div>
                        </div>
                      </div>

                     <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Dokter *</label>
                          <input type="text" name="id_dokter" id="id_dokter" readonly class="form-control <?php echo form_error('id_dokter') ? 'is-invalid':''?>" placeholder="Id Dokter" value="<?php echo $resep->id_dokter ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id_dokter') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Dokter *</label>
                          <input type="text" name="nama_dokter" id="nama_dokter" readonly class="form-control <?php echo form_error('nama_dokter') ? 'is-invalid':''?>" placeholder="Nama Dokter" value="<?php echo $resep->nama_dokter ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_dokter') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Pasien *</label>
                          <input type="text" name="id_pasien" id="id_pasien" readonly class="form-control <?php echo form_error('id_pasien') ? 'is-invalid':''?>" placeholder="Id Pasien" value="<?php echo $resep->id_pasien ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('id_pasien') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Pasien *</label>
                          <input type="text" name="nama_pasien" id="nama_pasien" readonly class="form-control <?php echo form_error('nama_pasien') ? 'is-invalid':''?>" placeholder="Nama Dokter" value="<?php echo $resep->nama_pasien ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_dokter') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal Lahir *</label>
                          <input type="date" name="tanggal_lahir" id="tanggal_lahir" readonly class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':''?>" placeholder="Tanggal Lahir" value="<?php echo $resep->tanggal_lahir ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('tanggal_lahir') ?>
                          </div>
                        </div>
                      </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Alamat *</label>
                        <textarea rows="4" name="alamat" id="alamat" readonly class="form-control <?php echo form_error('alamat') ? 'is-invalid':''?>" placeholder="Alamat Lengkap ..."><?php echo $resep->alamat ?></textarea>
                        <div class="invalid-feedback">
                          <?php echo form_error('alamat') ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Id Obat *</label>
                          <select name="id_obat" id="id_obat" class="form-control" onchange="changeValue2(this.value)">
                            <option value="" disabled diselected>--PILIH--</option>
                            <?php
                            $jsArray2 = "var obatName = new Array();\n";
                              foreach ($dataku2->result() as $data_obat) {
                                echo "<option value='$data_obat->id_obat'>".$data_obat->id_obat."</option>";
                                
                                $jsArray2 .= "obatName['".$data_obat->id_obat."']={nama_obat:'".addslashes($data_obat->nama_obat)."', kategori_obat:'".addslashes($data_obat->kategori_obat)."', harga_obat:'".addslashes($data_obat->harga_obat)."', stok_obat:'".addslashes($data_obat->stok_obat)."', dosis:'".addslashes($data_obat->dosis)."'};\n";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama Obat *</label>
                          <input type="text" name="nama_obat" id="nama_obat" class="form-control <?php echo form_error('nama_obat') ? 'is-invalid':''?>" placeholder="Nama Obat" value="<?php echo $resep->nama_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Kategori Obat *</label>
                          <input type="text" name="kategori_obat" id="kategori_obat" class="form-control <?php echo form_error('kategori_obat') ? 'is-invalid':''?>" placeholder="Kategori Obat" value="<?php echo $resep->kategori_obat ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('kategori_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Dosis *</label>
                          <input type="text" name="dosis" id="dosis" class="form-control <?php echo form_error('dosis') ? 'is-invalid':''?>" placeholder="Dosis" value="<?php echo $resep->dosis ?>" readonly>
                          <div class="invalid-feedback">
                            <?php echo form_error('dosis') ?>
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
                          <input type="hidden" name="stok_obat" id="stok_obat" readonly class="form-control <?php echo form_error('stok_obat') ? 'is-invalid':''?>" placeholder="Harga Obat" value="<?php echo $resep->stok_obat ?>">
                          <div class="invalid-feedback">
                            <?php echo form_error('stok_obat') ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="hidden" name="harga_obat" id="harga_obat" readonly class="form-control <?php echo form_error('harga_obat') ? 'is-invalid':''?>" placeholder="Harga Obat" value="<?php echo $resep->harga_obat ?>">
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
    <?php echo $jsArray; ?>
    function changeValue(id){
      document.getElementById('alamat').value = rmName[id].alamat;
      document.getElementById('id_kunjungan').value = rmName[id].id_kunjungan;
      document.getElementById('tanggal_kunjungan').value = rmName[id].tanggal_kunjungan;
      document.getElementById('id_dokter').value = rmName[id].id_dokter;
      document.getElementById('id_pasien').value = rmName[id].id_pasien;
      document.getElementById('nama_dokter').value = rmName[id].nama_dokter;
      document.getElementById('nama_pasien').value = rmName[id].nama_pasien;
      document.getElementById('tanggal_lahir').value = rmName[id].tanggal_lahir;
    }  
  </script>

  <script type="text/javascript">
    <?php echo $jsArray2; ?>
    function changeValue2(id){
      document.getElementById('nama_obat').value = obatName[id].nama_obat;
      document.getElementById('kategori_obat').value = obatName[id].kategori_obat;
      document.getElementById('harga_obat').value = obatName[id].harga_obat;
      document.getElementById('stok_obat').value = obatName[id].stok_obat;
      document.getElementById('dosis').value = obatName[id].dosis;
    }  
  </script>
  
</body>

</html>
