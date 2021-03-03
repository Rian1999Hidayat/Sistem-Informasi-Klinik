<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Obat_model extends CI_Model
	{
		private $_table = "tb_obat";
		private $_table2 = "tb_pemasukan_obat";
		private $_table3 = "tb_pengeluaran_obat";

		public $id_obat;
		public $nama_obat;
		public $kategori_obat;
		public $dosis;
		public $harga_obat;
		public $stok_obat;

		public function rules()
		{
			return [
				['field' => 'nama_obat',
				'label' => 'Nama Obat',
				'rules' => 'required'],

				['field' => 'kategori_obat',
				'label' => 'Kategori Obat',
				'rules' => 'required'],

				['field' => 'dosis',
				'label' => 'Dosis',
				'rules' => 'required'],

				['field' => 'harga_obat',
				'label' => 'Harga Obat',
				'rules' => 'numeric'],

				['field' => 'stok_obat',
				'label' => 'Stok Obat',
				'rules' => 'numeric']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getTanggalPemasukan($tgl_awal, $tgl_akhir)
    	{
        	return $this->db->query("SELECT * FROM tb_pemasukan_obat WHERE tanggal_pemasukan between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pemasukan ASC");
    	}

    	public function getTanggalPengeluaran($tgl_awal, $tgl_akhir)
    	{
        	return $this->db->query("SELECT * FROM tb_pengeluaran_obat WHERE tanggal_pengeluaran between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pengeluaran ASC");
    	}

		public function getPemasukan()
		{
			return $this->db->get($this->_table2)->result();
		}

		public function getPengeluaran()
		{
			return $this->db->get($this->_table3)->result();
		}

		public function getById($id_obat)
		{
			return $this->db->get_where($this->_table, ["id_obat" => $id_obat])->row();
		}

		public function tambahObat()
		{
			$post = $this->input->post();
			$this->id_obat = $post["id_obat"];
			$this->nama_obat = $post["nama_obat"];
			$this->kategori_obat = $post["kategori_obat"];
			$this->dosis = $post["dosis"];
			$this->harga_obat = $post["harga_obat"];
			$this->stok_obat = $post["stok_obat"];

			return $this->db->insert($this->_table, $this);
		}

		public function tambahStokObat()
		{
			$post = $this->input->post();
			$this->id_obat = $post["id_obat"];
			$this->nama_obat = $post["nama_obat"];
			$this->kategori_obat = $post["kategori_obat"];
			$this->dosis = $post["dosis"];
			$this->harga_obat = $post["harga_obat"];
			$stok_awal = $post["st_ob"];
			$stok_baru = $post["stok_obat"];

			$jumlah = (int)$stok_awal+(int)$stok_baru;

			$this->stok_obat = $jumlah;

			return $this->db->update($this->_table, $this, array('id_obat' => $post['id_obat']));
		}

		public function kurangStokObat()
		{
			$post = $this->input->post();
			
			$ambil = $post["stok_obat"];
			$hasil = (int)$ambil - 1;

			$this->db->set('stok_obat', $hasil);
			$this->db->where('id_obat', $this->id_obat = $post["id_obat"]);
			
			return $this->db->update('tb_obat');
		}



		public function ubahObat()
		{
			$post = $this->input->post();
			$this->id_obat = $post["id_obat"];
			$this->nama_obat = $post["nama_obat"];
			$this->kategori_obat = $post["kategori_obat"];
			$this->dosis = $post["dosis"];
			$this->harga_obat = $post["harga_obat"];
			$this->stok_obat = $post["stok_obat"];

			return $this->db->update($this->_table, $this, array('id_obat' => $post['id_obat']));
		}

		public function hapusObat($id_obat)
		{
			return $this->db->delete($this->_table, array("id_obat" => $id_obat));
		}

		public function kode_obat()
		{
				$this->db->select('RIGHT(tb_obat.id_obat, 3) as kode', FALSE);
				$this->db->order_by('id_obat','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_obat');

				$data=$query->row();
				$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,3,"0",STR_PAD_LEFT);
				$kode_jadi="OB".$kode_max;
				return $kode_jadi;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_obat');
			$this->db->like('id_obat', $keyword);
			$this->db->or_like('nama_obat', $keyword);
			$this->db->or_like('kategori_obat', $keyword);
			$this->db->or_like('dosis', $keyword);
			$this->db->or_like('harga_obat', $keyword);
			$this->db->or_like('stok_obat', $keyword);
			return $this->db->get();
		}

		public function total_data_obat()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function total_pemasukan_obat()
		{
			$query = $this->db->get($this->_table2);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function total_pengeluaran_obat()
		{
			$query = $this->db->get($this->_table3);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function jumlah_total_pengeluaran()
		{
			return $this->db->query('SELECT SUM(biaya_keluar) as bk FROM tb_pemasukan_obat');
		}

		public function jumlah_total_pemasukan()
		{
			return $this->db->query('SELECT SUM(biaya_masuk) as bm FROM tb_pengeluaran_obat');
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_obat");
			return $query;
		}

		function get_obat_list($limit, $start){
	        $query = $this->db->get('tb_obat', $limit, $start);
	        return $query;
	    }

	    function get_pemasukan_obat_list($limit, $start){
	        $query = $this->db->get('tb_pemasukan_obat', $limit, $start);
	        return $query;
	    }

	    function get_pengeluaran_obat_list($limit, $start){
	        $query = $this->db->get('tb_pengeluaran_obat', $limit, $start);
	        return $query;
	    }
		
	}

?>