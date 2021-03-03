<!DOCTYPE html>
<html><head>
	<title>Laporan Data Obat</title>
  	<?php $this->load->view("_partials/head.php") ?>
</head><body>
	<center>
		<p style="font-size: 15px;"><b>LAPORAN DATA OBAT</b></p>
		<p style="font-size: 12px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
		
	<br><br>
	<table style="font-size: 9px;" align="center" border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
			<th> &nbsp;&nbsp;&nbsp;&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;ID OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;NAMA OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;KATEGORI OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;DOSIS&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;HARGA OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;STOK OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
		</tr>
		<?php 

			$no = 1;
			foreach ($data_obat as $ob): ?>
			<tr align="center">
				<td> <?php echo $no++; ?></td>
				<td> <?php echo $ob->id_obat ?></td>
				<td> <?php echo $ob->nama_obat ?></td>
				<td> <?php echo $ob->kategori_obat ?></td>
				<td> <?php echo $ob->dosis ?></td>
				<td> <?php echo $ob->harga_obat ?></td>
				<td> <?php echo $ob->stok_obat ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body></html>