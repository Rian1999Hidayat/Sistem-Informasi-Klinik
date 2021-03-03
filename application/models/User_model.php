<?php 

	class User_model extends CI_Model
	{
		private $_table = "tb_user";

		public function cek_login()
		{
			$username = set_value('username');
			$password = set_value('password');

			$result = $this->db->where('username', $username)
								->where('password', $password)
								->limit(1)
								->get('tb_users');

			if ($result->num_rows()>0)
			{
				return $result->row();
			}else{
				return FALSE;
			}
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id)
		{
			return $this->db->get_where($this->_table, ["id" => $id])->row();
		}

		public function total_user()
		{
			$query = $this->db->get($this->_table);
			if ($query->num_rows() > 0){
				return $query->num_rows();
			} else {
				return 0;
			}
		}

		public function ubahPengguna()
		{
			$post = $this->input->post();
			$this->id = $post["id"];
			$this->name = $post["name"];
			$this->email = $post["jenis_kelamin"];
			$this->password = $post["password"];
			$this->role_id = $post["role_id"];
			$this->is_active = $post["is_active"];

			return $this->db->update($this->_table, $this, array('id' => $post['id']));
		}

		public function hapusPengguna($id)
		{
			return $this->db->delete($this->_table, array("id" => $id));
		}

		function get_pengguna_list($limit, $start){
	        $query = $this->db->get('tb_user', $limit, $start);
	        return $query;
	    }


	    public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->like('id', $keyword);
			$this->db->or_like('name', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('role_id', $keyword);
			$this->db->or_like('is_active', $keyword);
			$this->db->or_like('date_created', $keyword);
			return $this->db->get();
		}

		
	}

?>