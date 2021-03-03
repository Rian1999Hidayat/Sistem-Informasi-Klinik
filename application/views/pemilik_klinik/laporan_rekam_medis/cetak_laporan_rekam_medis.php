<!DOCTYPE html>
<html><head>
	<title>Laporan Rekam Medis</title>
</head><body>
	<center>
		<p style="font-size: 15px;"><b>LAPORAN REKAM MEDIS</b></p>
		<p style="font-size: 12px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
		<br>
	</center>
	<center>
		<p style="font-size: 12px;">Periode &nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $tgl_awal." "." sampai dengan "." ".$tgl_akhir; ?></p>
	</center>
	<br><br>
	<table style="font-size: 9px;" align="center" border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
			<th>&nbsp;NO&nbsp;</th>
			<th> &nbsp;ID REKAM MEDIS&nbsp; </th>
			<th> &nbsp;ID KUNJUNGAN&nbsp; </th>
			<th> &nbsp;TANGGAL KUNJUNGAN&nbsp; </th>
			<th> &nbsp;ID PASIEN&nbsp; </th>
			<th> &nbsp;NAMA PASIEN&nbsp; </th>
			<th> &nbsp;JENIS KELAMIN&nbsp; </th>
			<th> &nbsp;TANGGAL LAHIR&nbsp; </th>
			<th> &nbsp;ALAMAT&nbsp; </th>
			<th> &nbsp;ID DOKTER&nbsp; </th>
			<th> &nbsp;NAMA DOKTER&nbsp; </th>
			<th> &nbsp;KELUHAN&nbsp; </th>
			<th> &nbsp;DIAGNOSA&nbsp; </th>
			<th> &nbsp;ALERGI OBAT&nbsp; </th>
			<th> &nbsp;KETERANGAN&nbsp; </th>
		</tr>
		<?php 

			$no = 1;
			foreach ($rekam_medis as $rm): ?>
			<tr align="center">
				<td> <?php echo $no++; ?></td>
				<td> <?php echo $rm->id_rekam_medis ?></td>
				<td> <?php echo $rm->id_kunjungan ?></td>
				<td> <?php echo $rm->tanggal_kunjungan ?></td>
				<td> <?php echo $rm->id_pasien ?></td>
				<td> <?php echo $rm->nama_pasien ?></td>
				<td> <?php echo $rm->jenis_kelamin ?></td>
				<td> <?php echo $rm->tanggal_lahir ?></td>
				<td> <?php echo $rm->alamat ?></td>
				<td> <?php echo $rm->id_dokter ?></td>
				<td> <?php echo $rm->nama_dokter ?></td>
				<td> <?php echo $rm->keluhan ?></td>
				<td> <?php echo $rm->diagnosa ?></td>
				<td> <?php echo $rm->alergi_obat ?></td>
				<td> <?php echo $rm->keterangan ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body></html>