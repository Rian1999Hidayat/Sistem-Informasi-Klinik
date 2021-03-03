<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Konsultasi_model extends CI_Model
	{
		private $_table = "tb_konsultasi";

		public $id_konsultasi;
		public $id_pasien;
		public $id_dokter;
		public $tanggal_daftar;
		public $nama_dokter;
		public $nama_pasien;
		public $lama_konsultasi;
		public $harga_konsultasi;

		public function rules()
		{
			return [
				['field' => 'nama_pasien',
				'label' => 'Nama Pasien',
				'rules' => 'required'],

				['field' => 'nama_dokter',
				'label' => 'Nama Dokter',
				'rules' => 'required'],

				['field' => 'lama_konsultasi',
				'label' => 'Lama Konsultasi',
				'rules' => 'numeric'],

				['field' => 'harga_konsultasi',
				'label' => 'Lama Konsultasi',
				'rules' => 'numeric']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id_konsultasi)
		{
			return $this->db->get_where($this->_table, ["id_konsultasi" => $id_konsultasi])->row();
		}

		public function tambahKonsultasi()
		{
			$post = $this->input->post();
			$this->id_konsultasi = $post["id_konsultasi"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_daftar = $post["tanggal_daftar"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->lama_konsultasi = $post["lama_konsultasi"];
			$this->harga_konsultasi = $post["harga_konsultasi"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahKonsultasi()
		{
			$post = $this->input->post();
			$this->id_konsultasi = $post["id_konsultasi"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_daftar = $post["tanggal_daftar"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->lama_konsultasi = $post["lama_konsultasi"];
			$this->harga_konsultasi = $post["harga_konsultasi"];

			return $this->db->update($this->_table, $this, array('id_konsultasi' => $post['id_konsultasi']));
		}

		public function hapusKonsultasi($id_konsultasi)
		{
			return $this->db->delete($this->_table, array("id_konsultasi" => $id_konsultasi));
		}

		public function kode_konsultasi()
		{
				$this->db->select('RIGHT(tb_konsultasi.id_konsultasi, 6) as kode', FALSE);
				$this->db->order_by('id_konsultasi','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_konsultasi');

				$data=$query->row();
				$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="KSL".$kode_max;
				return $kode_jadi;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_konsultasi');
			$this->db->like('id_konsultasi', $keyword);
			$this->db->or_like('tanggal_daftar', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('id_dokter', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('nama_dokter', $keyword);
			$this->db->or_like('lama_konsultasi', $keyword);
			$this->db->or_like('harga_konsultasi', $keyword);
			return $this->db->get();
		}

		public function total_konsultasi()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_konsultasi");
			return $query;
		}

		function get_konsultasi_list($limit, $start){
	        $query = $this->db->get('tb_konsultasi', $limit, $start);
	        return $query;
	    }
		
	}

?>