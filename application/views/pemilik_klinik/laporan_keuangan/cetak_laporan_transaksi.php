<!DOCTYPE html>
<html><head>
	<title>Laporan Transaksi</title>
  	<?php $this->load->view("_partials/head.php") ?>
</head><body>
	<center>
		<p style="font-size: 15px;"><b>LAPORAN TRANSAKSI</b></p>
		<p style="font-size: 12px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 10px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		
		<hr>

	</center>
	<br>
	<center>
		<p style="font-size: 12px;">Periode &nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $tgl_awal." "." sampai dengan "." ".$tgl_akhir; ?></p>
	</center>
	
	
	<br><br>
	<table style="font-size: 9px;" align="center" border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
			<th> &nbsp;&nbsp;NO&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;ID PEMBAYARAN&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;ID RESEP&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;ID OBAT&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;ID KONSULTASI&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;ID PASIEN&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;TANGGAL PEMBAYARAN&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;NAMA PASIEN&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;NAMA OBAT&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;HARGA OBAT&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;BIAYA PENGOBATAN&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;BIAYA KONSULTASI&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;TOTAL BAYAR&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;JUMLAH BAYAR&nbsp;&nbsp;</th>
			<th> &nbsp;&nbsp;KEMBALIAN&nbsp;&nbsp;</th>
		</tr>
		<?php 

			$no = 1;
			foreach ($pembayaran as $pm): ?>
			<tr align="center">
				<td> <?php echo $no++; ?></td>
				<td> <?php echo $pm->id_pembayaran ?></td>
				<td> <?php echo $pm->id_resep ?></td>
				<td> <?php echo $pm->id_obat ?></td>
				<td> <?php echo $pm->id_konsultasi ?></td>
				<td> <?php echo $pm->id_pasien ?></td>
				<td> <?php echo $pm->tanggal_pembayaran ?></td>
				<td> <?php echo $pm->nama_pasien ?></td>
				<td> <?php echo $pm->nama_obat ?></td>
				<td> <?php echo "Rp. ".$pm->harga_obat ?></td>
				<td> <?php echo "Rp. ".$pm->biaya_pengobatan ?></td>
				<td> <?php echo "Rp. ".$pm->biaya_konsultasi ?></td>
				<td> <?php echo "Rp. ".$pm->total_bayar ?></td>
				<td> <?php echo "Rp. ".$pm->jumlah_bayar ?></td>
				<td> <?php echo "Rp. ".$pm->kembalian ?></td>
			</tr>
		<?php endforeach; ?>
		<tr align="center">
            <td colspan="10" rowspan="5" class="text-yellow" align="center"><b>TOTAL PEMASUKAN </b></td>
          </tr>

          <tr align="center">
            <td colspan="2" class="text-yellow" align="left"><b>PENGOBATAN </b></td>
            <td colspan="3"><?php foreach ($jumlah_total_pengobatan as $total) {} ?>
              <?php echo "Rp. ".$total->bp ?>
            </td>
          </tr>
          <tr align="center">
            <td colspan="2" class="text-yellow" align="left"><b>KONSULTASI </b></td>
            <td colspan="3"><?php foreach ($jumlah_total_konsultasi as $total) {} ?>
              <?php echo "Rp. ".$total->bkon ?>
            </td>
          </tr>
          <tr align="center">
            <td colspan="2" class="text-yellow" align="left"><b>OBAT </b></td>
            <td colspan="3"><?php foreach ($jumlah_total_obat as $total) {} ?>
              <?php echo "Rp. ".$total->ob ?>
            </td-->
          </tr>
          <tr align="center">
            <td colspan="2" class="text-yellow" align="left"><b>JUMLAH TOTAL PEMASUKAN </b></td>
            <td colspan="3"><?php foreach ($jumlah_total_pemasukan as $total) {} ?>
              <?php echo "Rp. ".$total->total ?>
            </td>
          </tr>

	</table>

</body></html>