<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kunjungan_model extends CI_Model
	{
		private $_table = "tb_kunjungan";

		public $id_kunjungan;
		public $id_pasien;
		public $id_dokter;
		public $tanggal_kunjungan;
		public $nama_dokter;
		public $nama_pasien;
		public $alamat;

		public function rules()
		{
			return [
				['field' => 'nama_pasien',
				'label' => 'Nama Pasien',
				'rules' => 'required'],

				['field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'],

				['field' => 'nama_dokter',
				'label' => 'Nama Dokter',
				'rules' => 'required']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id_kunjungan)
		{
			return $this->db->get_where($this->_table, ["id_kunjungan" => $id_kunjungan])->row();
		}

		public function getTanggal($tgl_awal, $tgl_akhir)
    	{
        	return $this->db->query("SELECT * FROM tb_kunjungan WHERE tanggal_kunjungan between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_kunjungan ASC");
    	}

		public function tambahKunjungan()
		{
			$post = $this->input->post();
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->alamat = $post["alamat"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahKunjungan()
		{
			$post = $this->input->post();
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->alamat = $post["alamat"];

			return $this->db->update($this->_table, $this, array('id_kunjungan' => $post['id_kunjungan']));
		}

		public function kode_kunjungan()
		{
				$this->db->select('RIGHT(tb_kunjungan.id_kunjungan, 6) as kode', FALSE);
				$this->db->order_by('id_kunjungan','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_kunjungan');

				
					$data=$query->row();
					$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="KNJ".$kode_max;
				return $kode_jadi;
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_kunjungan");
			return $query;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_kunjungan');
			$this->db->like('id_kunjungan', $keyword);
			$this->db->or_like('tanggal_kunjungan', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('id_dokter', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('nama_dokter', $keyword);
			$this->db->or_like('alamat', $keyword);
			return $this->db->get();
		}

		public function total_kunjungan()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		function get_kunjungan_list($limit, $start){
	        $query = $this->db->get('tb_kunjungan', $limit, $start);
	        return $query;
	    }
	
	}

?>