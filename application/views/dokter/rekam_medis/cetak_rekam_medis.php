<!DOCTYPE html>
<html><head>
	<title>Rekam Medis</title>
</head><body>
	<center>
    <p><b>REKAM MEDIS</b></p>
		<p><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
		<br>
	</center>
	<br>
	<table>
		<tr>
                      <td>No Identitas Rekam Medis &nbsp;&nbsp;&nbsp;</td>
                      <td class="text-left"> : &nbsp;&nbsp;&nbsp;</td>
                      <td class="text-left"> <?php echo $rekam_medis->id_rekam_medis ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas Kunjungan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->id_kunjungan ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Kunjungan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->tanggal_kunjungan ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas Pasien</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->nama_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->jenis_kelamin ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->tanggal_lahir ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->alamat ?></td>
                    </tr>
                    <tr>
                      <td>No Identitas Dokter</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->id_dokter ?></td>
                    </tr>
                    <tr>
                      <td>Nama Dokter</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->nama_dokter ?></td>
                    </tr>
                    <tr>
                      <td>Keluhan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->keluhan ?></td>
                    </tr>
                    <tr>
                      <td>Diagnosa</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->diagnosa ?></td>
                    </tr>
                    <tr>
                      <td>Alergi Obat</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->alergi_obat ?></td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td class="text-left">:</td>
                      <td class="text-left"><?php echo $rekam_medis->keterangan ?></td>
                    </tr>
	</table>
	<br><br>
	<p align="right" >Cipongkor, <?php echo $rekam_medis->tanggal_kunjungan ?></p>
	<br><br>
	<p align="right" ><?php echo $rekam_medis->nama_dokter ?></p>

	<!--script type="text/javascript">
		window.print();
	</script-->

</body></html>