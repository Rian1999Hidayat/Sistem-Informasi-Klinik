<!DOCTYPE html>
<html><head>
	<title>Resep</title>
</head><body>
	<center>
		<p style="font-size: 12px;"><b>RESEP</b></p>
		<p style="font-size: 11px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
		
	</center>
	<br>
	<table style="font-size: 9px;">
		<tr>
	      <td>No Identitas Resep</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->id_resep ?></td>
	    </tr>
	    <tr>
	      <td> No Identitas Rekam Medis &nbsp;&nbsp;</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->id_rekam_medis ?></td>
	    </tr>
	    <tr>
	      <td> No Identitas Kunjungan</td>
	      <td class="text-left">: </td>
	      <td class="text-left"> <?php echo $resep->id_kunjungan ?></td>
	    </tr>
	    <tr>
	      <td> Tanggal Kunjungan</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->tanggal_kunjungan ?></td>
	    </tr>
	    <tr>
	      <td> No Identitas Dokter</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->id_dokter ?></td>
	    </tr>
	    <tr>
	      <td> Nama Dokter</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->nama_dokter ?></td>
	    </tr>
	    <tr>
	      <td> No Identitas Pasien</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->id_pasien ?></td>
	    </tr>
	    <tr>
	      <td> Nama Pasien</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->nama_pasien ?></td>
	    </tr>
	    <tr>
	      <td> Tanggal Lahir</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->tanggal_lahir ?></td>
	    </tr>
	    <tr>
	      <td> Alamat</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->alamat ?></td>
	    </tr>
	    <tr>
	      <td> No Identitas Obat</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->id_obat ?></td>
	    </tr>
	    <tr>
	      <td> Nama Obat</td>
	      <td class="text-left"> : &nbsp; &nbsp; &nbsp; </td>
	      <td class="text-left"> <?php echo $resep->nama_obat ?></td>
	    </tr>
	    <tr>
	      <td> Kategori</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->kategori_obat ?></td>
	    </tr>
	    <tr>
	      <td> Dosis</td>
	      <td class="text-left"> : </td>
	      <td class="text-left"> <?php echo $resep->dosis ?></td>
	    </tr>
	</table>
	<br><br>
	<p align="left" style="font-size: 9px;">Keterangan :</p>
	<p align="right" style="font-size: 9px;">Cipongkor, <?php echo $resep->tanggal_kunjungan ?></p>
	<br><br>
	<p align="right" style="font-size: 9px;"><?php echo $resep->nama_dokter ?></p>

	<!--script type="text/javascript">
		window.print();
	</script-->

</body></html>