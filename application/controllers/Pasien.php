<?php 

	class Pasien extends CI_Controller{
		public function __construct()
		{
			parent::__construct();

			$this->load->model("pasien_model");
			$this->load->model("kunjungan_model");
			$this->load->model("dokter_model");
			$this->load->model("konsultasi_model");
			$this->load->model("user_model");
			$this->load->library('form_validation');
			
			if ($this->session->userdata('email') == null){
				redirect(site_url('login'));	
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 1){
				redirect(site_url('petugas_pendaftaran'));
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 2){
				redirect(site_url('asiten_dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 3){
				redirect(site_url('dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 4){
				redirect(site_url('apoteker'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 5){
				redirect(site_url('kasir'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 6){
				redirect(site_url('pemilik_klinik'));
			}
		}

		public function index()
		{
			$option4 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option4;
			$this->load->view("pasien/beranda", $data);
		}

		public function info_klinik()
		{
			$option1 = $this->pasien_model->total_pasien();
			$option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["total_pasien"] = $option1;
			$data["total_kunjungan"] = $option2;
			$data["user"] = $option3;
			$this->load->view('pasien/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('pasien/info_kesehatan/tampil', $data);
		}

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('pasien/profile', $data);
			} else {
				$name = $this->input->post('name');
				$email = $this->input->post('email');

				$upload_image = $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '4096';
					$config['upload_path'] = './img/upload/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {
						
						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					} else {
						echo $this->upload->display_errors();
					}
				}

				$this->db->set('name', $name);
				$this->db->where('email', $email);
				$this->db->update('tb_user');

				$this->session->set_flashdata('message', '<div class="alert alert-success bg-gradient-success role="alert">Profile Berhasil Diedit !</div>');
				redirect('pasien/profile');
			}
		}

		public function ubah_password()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
			$this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
			$this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

			if ($this->form_validation->run() == FALSE){

				$this->load->view('pasien/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('pasien/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('pasien/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('pasien/ubah_password');
					}
				}
			}
		}

		public function pesan_konsultasi()
	    {
	        $option1 = $this->db->get_where('tb_user', ['email' =>
	        $this->session->userdata('email')])->row_array();
	        $data["user"] = $option1;
	        $option2 = $this->konsultasi_model->getAll();

	        $data["user"] = $option1;
	        $data["data"] = $option2;
	        $this->load->view('pasien/data_konsultasi', $data);
	    }

	    public function lihat_pesan($id_konsultasi = null)
	    {
	        $option1 = $this->konsultasi_model->getById($id_konsultasi);
	        $option2 = $this->db->get_where('tb_user', ['email' =>
	        $this->session->userdata('email')])->row_array();

	        $select_name = $this->db->query("SELECT * FROM tb_konsultasi WHERE id_konsultasi = '$id_konsultasi'")->result();

	        foreach ($select_name as $key) {
	            $pasien = $key->nama_pasien;
	            $dokter = $key->nama_dokter;
	        }
	        $option3 = $this->db->query("SELECT * FROM tb_chat WHERE id_konsultasi = '$id_konsultasi' ORDER BY waktu ASC")->result();

	        $select_image = $this->db->query("SELECT * FROM tb_user WHERE name = '$dokter'")->result();

	        $data["data"] = $option1;
	        $data["user"] = $option2;
	        $data["chat"] = $option3;
	        $data["image"] = $select_image;

	        $this->load->view("pasien/chat", $data);
	    }

		public function kirim_pesan($id_konsultasi = null)
	    {
	        $option1 = $this->konsultasi_model->getById($id_konsultasi);
	        $option4 = $this->db->get_where('tb_user', ['email' =>
	        $this->session->userdata('email')])->row_array();
	        
	        $data["user"] = $option4;
	        $data2 = [
	            'id_konsultasi' => $this->input->post('id_konsultasi'),
	            'dari' => $this->input->post('pasien'),
	            'ke' => $this->input->post('dokter'),
	            'pesan' => $this->input->post('pesan'),
	            'waktu' => time('YY-MM-DD hh:mm:ss')
	        ];

	        $this->db->insert('tb_chat', $data2);

	        $data["data"] = $option1;
	        $data["user"] = $option4;
	        redirect('pasien/lihat_pesan/'.$id_konsultasi);
	    }

	}

?>