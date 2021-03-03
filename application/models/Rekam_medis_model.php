<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rekam_medis_model extends CI_Model
	{
		private $_table = "tb_rekam_medis";

		public $id_rekam_medis;
		public $id_kunjungan;
		public $id_pasien;
		public $id_dokter;
		public $tanggal_kunjungan;
		public $nama_pasien;
		public $jenis_kelamin;
		public $tanggal_lahir;
		public $alamat;
		public $nama_dokter;
		public $keluhan;
		public $diagnosa;
		public $alergi_obat;
		public $keterangan;


		public function rules()
		{
			return [
				['field' => 'keluhan',
				'label' => 'Keluhan',
				'rules' => 'required'],

				['field' => 'diagnosa',
				'label' => 'Diagnosa',
				'rules' => 'required'],

				['field' => 'alergi_obat',
				'label' => 'Alergi Obat',
				'rules' => 'required'],

				['field' => 'keterangan',
				'label' => 'Keterangan',
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

		public function getById($id_rekam_medis)
		{
			return $this->db->get_where($this->_table, ["id_rekam_medis" => $id_rekam_medis])->row();
		}

		public function getTanggal($tgl_awal, $tgl_akhir)
    	{
        	return $this->db->query("SELECT * FROM tb_rekam_medis WHERE tanggal_kunjungan between '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_kunjungan ASC");
    	}

		public function tambahRekamMedis()
		{
			$post = $this->input->post();

			$this->id_rekam_medis = $post["id_rekam_medis"];
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->keluhan = $post["keluhan"];
			$this->diagnosa = $post["diagnosa"];
			$this->alergi_obat = $post["alergi_obat"];
			$this->keterangan = $post["keterangan"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahRekamMedis()
		{
			$post = $this->input->post();

			$this->id_rekam_medis = $post["id_rekam_medis"];
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->keluhan = $post["keluhan"];
			$this->diagnosa = $post["diagnosa"];
			$this->alergi_obat = $post["alergi_obat"];
			$this->keterangan = $post["keterangan"];

			return $this->db->update($this->_table, $this, array('id_rekam_medis' => $post['id_rekam_medis']));
		}

		public function kode_rekam_medis()
		{
				$this->db->select('RIGHT(tb_rekam_medis.id_rekam_medis, 6) as kode', FALSE);
				$this->db->order_by('id_rekam_medis','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_rekam_medis');

				$data=$query->row();
				$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="RME".$kode_max;
				return $kode_jadi;
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_rekam_medis");
			return $query;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_rekam_medis');
			$this->db->like('id_rekam_medis', $keyword);
			$this->db->or_like('id_kunjungan', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('id_dokter', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('nama_dokter', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('jenis_kelamin', $keyword);
			$this->db->or_like('tanggal_lahir', $keyword);
			$this->db->or_like('keluhan', $keyword);
			$this->db->or_like('alergi_obat', $keyword);
			$this->db->or_like('diagnosa', $keyword);
			$this->db->or_like('keterangan', $keyword);
			return $this->db->get();
		}

		public function total_rekam_medis()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		function get_rekam_medis_list($limit, $start){
	        $query = $this->db->get('tb_rekam_medis', $limit, $start);
	        return $query;
	    }

	}

?>