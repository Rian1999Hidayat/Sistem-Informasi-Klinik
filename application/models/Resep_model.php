<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Resep_model extends CI_Model
	{
		private $_table = "tb_resep";

		public $id_resep;
		public $id_rekam_medis;
		public $id_obat;
		public $id_kunjungan;
		public $id_pasien;
		public $id_dokter;
		public $tanggal_kunjungan;
		public $nama_dokter;
		public $nama_pasien;
		public $tanggal_lahir;
		public $alamat;
		public $nama_obat;
		public $kategori_obat;
		public $dosis;


		public function rules()
		{
			return [
				['field' => 'nama_dokter',
				'label' => 'Nama Dokter',
				'rules' => 'required'],

				['field' => 'nama_pasien',
				'label' => 'Nama Pasien',
				'rules' => 'required'],

				['field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'],

				['field' => 'nama_obat',
				'label' => 'Nama Obat',
				'rules' => 'required'],

				['field' => 'kategori_obat',
				'label' => 'Kategori Obat',
				'rules' => 'required'],

				['field' => 'dosis',
				'label' => 'Dosis',
				'rules' => 'required']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id_resep)
		{
			return $this->db->get_where($this->_table, ["id_resep" => $id_resep])->row();
		}

		public function tambahResep()
		{
			$post = $this->input->post();

			$this->id_resep = $post["id_resep"];
			$this->id_rekam_medis = $post["id_rekam_medis"];
			$this->id_obat = $post["id_obat"];
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->nama_obat = $post["nama_obat"];
			$this->kategori_obat = $post["kategori_obat"];
			$this->dosis = $post["dosis"];
			$this->stok_obat = $post["stok_obat"];
			$this->harga_obat = $post["harga_obat"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahResep()
		{
			$post = $this->input->post();

			$this->id_resep = $post["id_resep"];
			$this->id_rekam_medis = $post["id_rekam_medis"];
			$this->id_obat = $post["id_obat"];
			$this->id_kunjungan = $post["id_kunjungan"];
			$this->id_dokter = $post["id_dokter"];
			$this->id_pasien = $post["id_pasien"];
			$this->tanggal_kunjungan = $post["tanggal_kunjungan"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->nama_obat = $post["nama_obat"];
			$this->kategori_obat = $post["kategori_obat"];
			$this->dosis = $post["dosis"];
			$this->stok_obat = $post["stok_obat"];
			$this->harga_obat = $post["harga_obat"];

			return $this->db->update($this->_table, $this, array('id_resep' => $post['id_resep']));
		}

		public function hapusResep($id_resep)
		{
			return $this->db->delete($this->_table, array("id_resep" => $id_resep));
		}
		
		public function kode_resep()
		{
				$this->db->select('RIGHT(tb_resep.id_resep, 6) as kode', FALSE);
				$this->db->order_by('id_resep','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_resep');

				$data=$query->row();
				$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="RSP".$kode_max;
				return $kode_jadi;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_resep');
			$this->db->like('id_resep', $keyword);
			$this->db->or_like('id_rekam_medis', $keyword);
			$this->db->or_like('tanggal_kunjungan', $keyword);
			$this->db->or_like('id_kunjungan', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('id_dokter', $keyword);
			$this->db->or_like('id_obat', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('nama_dokter', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('tanggal_lahir', $keyword);
			$this->db->or_like('nama_obat', $keyword);
			$this->db->or_like('kategori_obat', $keyword);
			$this->db->or_like('dosis', $keyword);
			return $this->db->get();
		}

		public function total_resep()
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
			$query = $this->db->get("tb_resep");
			return $query;
		}

		function get_resep_list($limit, $start){
	        $query = $this->db->get('tb_resep', $limit, $start);
	        return $query;
	    }
	}

?>