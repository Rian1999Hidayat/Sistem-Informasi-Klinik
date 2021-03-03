<!DOCTYPE html>
<html><head>
	<title>Laporan Pemasukan Obat</title>
  	<?php $this->load->view("_partials/head.php") ?>
</head><body>
	<center>
		<p style="font-size: 15px;"><b>LAPORAN PEMASUKAN OBAT</b></p>
		<p style="font-size: 12px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>
	</center>
	<center>
		<p style="font-size: 12px;">Periode &nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $tgl_awal." "." sampai dengan "." ".$tgl_akhir; ?></p>
	</center>
		
	<br><br>
	<table style="font-size: 9px;" align="center" border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
			<th> &nbsp;&nbsp;&nbsp;&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;TANGGAL PEMASUKAN&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;ID OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;HARGA OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;STOK OBAT&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th> &nbsp;&nbsp;&nbsp;&nbsp;BIAYA KELUAR&nbsp;&nbsp;&nbsp;&nbsp; </th>
		</tr>
		<?php 

			$no = 1;
			foreach ($pemasukan as $ob): ?>
			<tr align="center">
				<td> <?php echo $no++; ?></td>
				<td> <?php echo $ob->tanggal_pemasukan ?></td>
				<td> <?php echo $ob->id_obat ?></td>
				<td> <?php echo "Rp. ".$ob->harga_obat ?></td>
				<td> <?php echo $ob->stok_obat ?></td>
				<td> <?php echo "Rp. ".$ob->biaya_keluar ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="5" align="right"><b>TOTAL BIAYA KELUAR</b></td>
			<td align="center">
				<?php foreach ($jumlah_total_pengeluaran as $total) {} ?>
                <?php echo "Rp. ".$total->bk ?>
	        </td>
		</tr>
	</table>

</body></html>