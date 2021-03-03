<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pasien_model extends CI_Model
	{
		private $_table = "tb_pasien";

		public $id_pasien;
		public $nama_pasien;
		public $jenis_kelamin;
		public $tanggal_lahir;
		public $alamat;
		public $no_telepon;

		public function rules()
		{
			return [
				['field' => 'nama_pasien',
				'label' => 'Nama Pasien',
				'rules' => 'required'],

				['field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'],

				['field' => 'no_telepon',
				'label' => 'Nomor Telepon',
				'rules' => 'numeric']
			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id_pasien)
		{
			return $this->db->get_where($this->_table, ["id_pasien" => $id_pasien])->row();
		}

		public function getByName($id_pasien){
			$hsl = $this->db->query("SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil = array(
						'id_pasien' => $data->id_pasien,
						'nama_pasien' => $data->nama_pasien,
						'alamat' => $data->alamat,
					);
				}

				return $hasil;
			}
			
		}

		public function tambahPasien()
		{
			$post = $this->input->post();
			$this->id_pasien = $post["id_pasien"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->no_telepon = $post["no_telepon"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahPasien()
		{
			$post = $this->input->post();
			$this->id_pasien = $post["id_pasien"];
			$this->nama_pasien = $post["nama_pasien"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->no_telepon = $post["no_telepon"];

			return $this->db->update($this->_table, $this, array('id_pasien' => $post['id_pasien']));
		}

		public function hapusPasien($id_pasien)
		{
			return $this->db->delete($this->_table, array("id_pasien" => $id_pasien));
		}

		public function cariPasien($keyword)
		{
			$this->db->select('*');
			$this->db->from($this->_table);
			$this->db->like('nama_pasien', $keyword);
			$this->db->or_like('id_pasien', $keyword);
			$this->db->or_like('jenis_kelamin', $keyword);
			$this->db->or_like('tanggal_lahir', $keyword);
			$this->db->or_like('alamat', $keyword);
			return $this->db->get()->result();
		}

		public function kode_pasien()
		{
				$this->db->select('RIGHT(tb_pasien.id_pasien, 6) as kode', FALSE);
				$this->db->order_by('id_pasien','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_pasien');

				
					$data=$query->row();
					$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,6,"0",STR_PAD_LEFT);
				$kode_jadi="PSN".$kode_max;
				return $kode_jadi;
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_pasien");
			return $query;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_pasien');
			$this->db->like('id_pasien', $keyword);
			$this->db->or_like('nama_pasien', $keyword);
			$this->db->or_like('jenis_kelamin', $keyword);
			$this->db->or_like('tanggal_lahir', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('no_telepon', $keyword);
			return $this->db->get()	;
		}

		public function total_pasien()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		function get_pasien_list($limit, $start){
	        $query = $this->db->get('tb_pasien', $limit, $start);
	        return $query;
	    }

	}

?>