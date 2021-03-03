<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pembayaran_model extends CI_Model
	{
		private $_table = "tb_pembayaran";
		private $_table2 = "tb_obat";

		public $id_pembayaran;
		public $id_resep;
		public $id_obat;
		public $id_konsultasi;
		public $id_pasien;
		public $tanggal_pembayaran;
		public $nama_pasien;
		public $nama_obat;
		public $harga_obat;
		public $biaya_pengobatan;
		public $biaya_konsultasi;
		public $total_bayar;
		public $jumlah_bayar;
		public $kembalian;

		public function rules()
		{
			return [
				['field' => 'jumlah_bayar',
				'label' => 'Jumlah Bayar',
				'rules' => 'numeric'],

				['field' => 'biaya_pengobatan',
				'label' => 'Biaya Pengobatan',
				'rules' => 'numeric']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id_pembayaran)
		{
			return $this->db->get_where($this->_table, ["id_pembayaran" => $id_pembayaran])->row();
		}

		public function getTanggal($tgl_awal, $tgl_akhir)
    	{
        	return $this->db->query("SELECT * FROM tb_pembayaran WHERE tanggal_pembayaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pembayaran ASC");
    	}

		public function tambahPembayaran()
		{
			$post = $this->input->post();

			$this->id_pembayaran = $post["id_pembayaran"];
			$this->id_resep = $post["id_resep"];
			$this->id_obat = $post["id_obat"];
			$this->id_konsultasi = $post["id_konsultasi"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_pembayaran = $post["tanggal_pembayaran"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->nama_obat = $post["nama_obat"];
			$this->harga_obat = $post["harga_obat"];
			$this->stok_obat = $post["stok_obat"];
			$this->biaya_konsultasi = $post["biaya_konsultasi"];
			$this->biaya_pengobatan = $post["biaya_pengobatan"];
			$this->total_bayar = $post["total_bayar"];
			$this->jumlah_bayar = $post["jumlah_bayar"];
			$this->kembalian = $post["kembalian"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahPembayaran()
		{
			$post = $this->input->post();

			$this->id_pembayaran = $post["id_pembayaran"];
			$this->id_resep = $post["id_resep"];
			$this->id_obat = $post["id_obat"];
			$this->id_konsultasi = $post["id_konsultasi"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_pembayaran = $post["tanggal_pembayaran"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->nama_obat = $post["nama_obat"];
			$this->harga_obat = $post["harga_obat"];
			$this->stok_obat = $post["stok_obat"];
			$this->biaya_konsultasi = $post["biaya_konsultasi"];
			$this->biaya_pengobatan = $post["biaya_pengobatan"];
			$this->total_bayar = $post["total_bayar"];
			$this->jumlah_bayar = $post["jumlah_bayar"];
			$this->kembalian = $post["kembalian"];

			return $this->db->update($this->_table, $this, array('id_pembayaran' => $post['id_pembayaran']));
		}


		public function kode_pembayaran()
		{
				$this->db->select('RIGHT(tb_pembayaran.id_pembayaran, 6) as kode', FALSE);
				$this->db->order_by('id_pembayaran','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_pembayaran');

				$data=$query->row();
				$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="TRS".$kode_max;
				return $kode_jadi;
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_pembayaran");
			return $query;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_pembayaran');
			$this->db->like('id_pembayaran', $keyword);
			$this->db->or_like('id_resep', $keyword);
			$this->db->or_like('id_obat', $keyword);
			$this->db->or_like('id_konsultasi', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('tanggal_pembayaran', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('nama_obat', $keyword);
			$this->db->or_like('harga_obat', $keyword);
			$this->db->or_like('biaya_pengobatan', $keyword);
			$this->db->or_like('biaya_konsultasi', $keyword);
			$this->db->or_like('total_bayar', $keyword);
			$this->db->or_like('jumlah_bayar', $keyword);
			$this->db->or_like('kembalian', $keyword);
			return $this->db->get();
		}

		public function jumlah_total_bayar($tgl_awal, $tgl_akhir)
		{
			return $this->db->query("SELECT SUM(total_bayar) as total FROM tb_pembayaran WHERE tanggal_pembayaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pembayaran ASC");
		}

		public function jumlah_total_pengobatan($tgl_awal, $tgl_akhir)
		{
			return $this->db->query("SELECT SUM(biaya_pengobatan) as bp FROM tb_pembayaran WHERE tanggal_pembayaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pembayaran ASC");
		}

		public function jumlah_total_konsultasi($tgl_awal, $tgl_akhir)
		{
			return $this->db->query("SELECT SUM(biaya_konsultasi) as bkon FROM tb_pembayaran WHERE tanggal_pembayaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pembayaran ASC");
		}

		public function jumlah_total_obat($tgl_awal, $tgl_akhir)
		{
			return $this->db->query("SELECT SUM(harga_obat) as ob FROM tb_pembayaran WHERE tanggal_pembayaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pembayaran ASC");
		}

		public function jumlah_total_pengobatan2()
		{
			return $this->db->query("SELECT SUM(biaya_pengobatan) as bp FROM tb_pembayaran ");
		}

		public function jumlah_total_bayar2()
		{
			return $this->db->query("SELECT SUM(total_bayar) as total FROM tb_pembayaran");
		}

		public function jumlah_total_konsultasi2()
		{
			return $this->db->query("SELECT SUM(biaya_konsultasi) as bkon FROM tb_pembayaran");
		}

		public function jumlah_total_obat2()
		{
			return $this->db->query("SELECT SUM(harga_obat) as ob FROM tb_pembayaran");
		}

		public function total_data_transaksi()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		function get_pembayaran_list($limit, $start){
	        $query = $this->db->get('tb_pembayaran', $limit, $start);
	        return $query;
	    }

	}

?>