<!DOCTYPE html>
<html><head>
	<title>Nota Pembayaran</title>
</head><body>
	<center>
    <p style="font-size: 9px;"><b>NOTA PEMBAYARAN</b></p>
		<p style="font-size: 8px;"><b>KLINIK THORIQ RIZQI CIPONGKOR</b></p>
		<p style="font-size: 8px;"><i>Jalan PLTA Saguling Kp. Cibungur Desa Sarinagen Kecamatan Cipongkor Kab. Bandung Barat, Jawa Barat 40764</i></p>
		<hr>
	</center>
	<br>

	<table style="font-size: 8px;">
		<tr>
      <td>Nama Pasien</td>
      <td class="text-left">:</td>
      <td class="text-left"><?php echo $pembayaran->nama_pasien ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td>No Identitas Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="text-left">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td class="text-left"><?php echo $pembayaran->id_pembayaran ?></td>
    </tr>
    <tr>
      <td>Tanggal Pembayaran</td>
      <td class="text-left">:</td>
      <td class="text-left"><?php echo $pembayaran->tanggal_pembayaran ?></td>
    </tr>
    <tr>
      <td>Nama Obat</td>
      <td class="text-left">:</td>
      <td class="text-left"><?php echo $pembayaran->nama_obat ?></td>
    </tr>
    <tr>
      <td>Harga Obat</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->harga_obat ?></td>
    </tr>
    <tr>
      <td>Biaya Konsultasi</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->biaya_konsultasi ?></td>
    </tr>
    <tr>
      <td>Biaya Pengobatan</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->biaya_pengobatan ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><hr></td>
    </tr>
    <tr>
      <td>Total Pembayaran</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->total_bayar ?></td>
    </tr>
    <tr>
      <td>Jumlah Bayar</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->jumlah_bayar ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><hr></td>
    </tr>
    <tr>
      <td>Kembalian</td>
      <td class="text-left">:</td>
      <td class="text-left" align="right"><?php echo "Rp. ".$pembayaran->kembalian ?></td>
    </tr>
	</table>

</body></html>