<!DOCTYPE html>
<html><head>
	<title>Laporan Kunjungan</title>
</head><body>
	<center>
		<p style="font-size: 15px;"><b>LAPORAN KUNJUNGAN</b></p>
		<p style="font-size: 12px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
		<br>
	</center>
	<center>
		<p style="font-size: 12px;">Periode &nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $tgl_awal." "." sampai dengan "." ".$tgl_akhir; ?></p>
	</center>
	
	
	<br><br>
	<table style="font-size: 9px;" align="center" border="0.1" cellpadding="1" cellspacing="2">
		<tr align="center">
			<th> &nbsp;NO&nbsp; </th>
			<th> &nbsp;ID KUNJUNGAN&nbsp; </th>
			<th> &nbsp;TANGGAL KUNJUNGAN&nbsp; </th>
			<th> &nbsp;ID PASIEN&nbsp; </th>
			<th> &nbsp;NAMA PASIEN&nbsp; </th>
			<th> &nbsp;ALAMAT&nbsp; </th>
			<th> &nbsp;ID DOKTER&nbsp; </th>
			<th> &nbsp;NAMA DOKTER&nbsp; </th>
		</tr>
		<?php 

			$no = 1;
			foreach ($kunjungan as $kunj): ?>
			<tr align="center">
				<td> <?php echo $no++; ?></td>
				<td> <?php echo $kunj->id_kunjungan ?></td>
				<td> <?php echo $kunj->tanggal_kunjungan ?></td>
				<td> <?php echo $kunj->id_pasien ?></td>
				<td> <?php echo $kunj->nama_pasien ?></td>
				<td> <?php echo $kunj->alamat ?></td>
				<td> <?php echo $kunj->id_dokter ?></td>
				<td> <?php echo $kunj->nama_dokter ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body></html>