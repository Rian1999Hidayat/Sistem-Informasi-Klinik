<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dokter_model extends CI_Model
	{
		private $_table = "tb_dokter";

		public $id_dokter;
		public $nama_dokter;
		public $jenis_kelamin;
		public $tanggal_lahir;
		public $alamat;
		public $no_telepon;

		public function rules()
		{
			return [
				['field' => 'nama_dokter',
				'label' => 'Nama dokter',
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

		public function getById($id_dokter)
		{
			return $this->db->get_where($this->_table, ["id_dokter" => $id_dokter])->row();
		}

		public function getIddokter($id_dokter){
			$hsl = $this->db->query("SELECT * FROM tb_dokter WHERE id_dokter = '$id_dokter'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil = array(
						'id_dokter' => $data->id_dokter,
						'nama_dokter' => $data->nama_dokter,
						'alamat' => $data->alamat,
					);
				}
			}
			return $hasil;
		}

		public function tambahDokter()
		{
			$post = $this->input->post();
			$this->id_dokter = $post["id_dokter"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->no_telepon = $post["no_telepon"];

			return $this->db->insert($this->_table, $this);
		}

		public function ubahDokter()
		{
			$post = $this->input->post();
			$this->id_dokter = $post["id_dokter"];
			$this->nama_dokter = $post["nama_dokter"];
			$this->jenis_kelamin = $post["jenis_kelamin"];
			$this->tanggal_lahir = $post["tanggal_lahir"];
			$this->alamat = $post["alamat"];
			$this->no_telepon = $post["no_telepon"];

			return $this->db->update($this->_table, $this, array('id_dokter' => $post['id_dokter']));
		}

		public function hapusDokter($id_dokter)
		{
			return $this->db->delete($this->_table, array("id_dokter" => $id_dokter));
		}

		public function kode_dokter()
		{
				$this->db->select('RIGHT(tb_dokter.id_dokter, 3) as kode', FALSE);
				$this->db->order_by('id_dokter','DESC');
				$this->db->limit(1);

				$query = $this->db->get('tb_dokter');

				
					$data=$query->row();
					$kode=intval($data->kode)+1;
				
				$kode_max=str_pad($kode,3,"0",STR_PAD_LEFT);
				$kode_jadi="DK".$kode_max;
				return $kode_jadi;
		}

		public function tampil_combobox()
		{
			$query = $this->db->get("tb_dokter");
			return $query;
		}

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_dokter');
			$this->db->like('id_dokter', $keyword);
			$this->db->or_like('nama_dokter', $keyword);
			$this->db->or_like('jenis_kelamin', $keyword);
			$this->db->or_like('tanggal_lahir', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('no_telepon', $keyword);
			return $this->db->get();
		}

		public function total_dokter()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		function get_dokter_list($limit, $start){
	        $query = $this->db->get('tb_dokter', $limit, $start);
	        return $query;
	    }

	}

?>