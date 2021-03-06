<?php 

	class Asisten_Dokter extends CI_Controller{
		public function __construct()
		{
			parent::__construct();

			$this->load->model("pasien_model");
			$this->load->model("kunjungan_model");
			$this->load->model("dokter_model");
			$this->load->model("user_model");
			$this->load->library('form_validation');
			$this->load->library('pagination');
			
			if ($this->session->userdata('email') == null){
				redirect(site_url('login'));	
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 1){
				redirect(site_url('petugas_pendaftaran'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 3){
				redirect(site_url('dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 4){
				redirect(site_url('apoteker'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 5){
				redirect(site_url('kasir'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 6){
				redirect(site_url('pemilik_klinik'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 7){
				redirect(site_url('pasien'));
			} 
		}

		public function index()
		{
			$option1 = $this->pasien_model->total_pasien();
			$option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->dokter_model->total_dokter();
			$option4 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["total_pasien"] = $option1;
			$data["total_kunjungan"] = $option2;
			$data["total_dokter"] = $option3;
			$data["user"] = $option4;
			$this->load->view("asisten_dokter/beranda", $data);
		}

		public function data_dokter()
		{
			$config['base_url'] = site_url('asisten_dokter/data_dokter');
	        $config['total_rows'] = $this->db->count_all('tb_dokter');
	        $config['per_page'] = 5;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);
		  	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = '<i class="fas fa-angle-right"></i>';
	        $config['prev_link']        = '<i class="fas fa-angle-left"></i>';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-gradient-info">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['last_tagl_close']  = '</span></li>';
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['data'] = $this->dokter_model->get_dokter_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("asisten_dokter/dokter/tampil", $data);	
		}

		public function tambah_data_dokter()
		{
			$dokter = $this->dokter_model;
			$validation = $this->form_validation;
			$validation->set_rules($dokter->rules());

			if($validation->run()){
				$dokter->tambahdokter();
				$data2 = [
					'name' => $this->input->post('nama_dokter'),
					'email' => $this->input->post('email'),
					'image' => 'default.jpg',
					'password' => $this->input->post('password1'),
					'role_id' => 3,
					'is_active' => 1,
					'date_created' => time()
				];
				$this->db->insert('tb_user', $data2);
				$this->session->set_flashdata('success', 'Data Tersimpan');
			}

			$option1 = $this->dokter_model->kode_dokter();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["kode"] = $option1;
			$data["user"] = $option2;

			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
				'is_unique' => 'Email sudah terdaftar !'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
					'matches' => 'Password Tidak Sama !', 
					'min_length' => 'Password Minimal 3 Karakter !'
				]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
					'matches' => 'Password Tidak Sama !',
				]);

			if ($this->form_validation->run() == FALSE) {
				$option1 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
				$data["user"] = $option1;
				$this->load->view('asisten_dokter/dokter/form_tambah', $data);
			}

		}

		public function ubah_data_dokter($id_dokter = null)
		{
			if(!isset($id_dokter)) redirect('dokter');

			$dokter = $this->dokter_model;
			$validation = $this->form_validation;
			$validation->set_rules($dokter->rules());

			if($validation->run()){
				$dokter->ubahdokter();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}

			$option1 = $dokter->getById($id_dokter);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["dokter"] = $option1;
			$data["user"] = $option2;

			if(!$data["dokter"]) show_404();

			$this->load->view("asisten_dokter/dokter/form_ubah", $data);
		}

		public function hapus_data_dokter($id_dokter = null)
		{
			if(!isset($id_dokter)) show_404();

			if($this->dokter_model->hapusdokter($id_dokter)){
				redirect(site_url('asisten_dokter/data_dokter'));
			}
		}

		public function detail_data_dokter($id_dokter = null){
			$dokter = $this->dokter_model;
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$data["dokter"] = $dokter->getById($id_dokter);
			$this->load->view("asisten_dokter/dokter/detail_dokter", $data);
		}

		public function cari_data_dokter(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->dokter_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("asisten_dokter/dokter/tampil", $data);
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
			$this->load->view('asisten_dokter/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('asisten_dokter/info_kesehatan/tampil', $data);
		}

		public function data_pasien()
		{
			$config['base_url'] = site_url('asisten_dokter/data_pasien');
	        $config['total_rows'] = $this->db->count_all('tb_pasien');
	        $config['per_page'] = 5;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);
		  	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = '<i class="fas fa-angle-right"></i>';
	        $config['prev_link']        = '<i class="fas fa-angle-left"></i>';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-gradient-info">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['last_tagl_close']  = '</span></li>';
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['data'] = $this->pasien_model->get_pasien_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view('asisten_dokter/pasien/tampil', $data);
		}

		public function data_kunjungan()
		{
			$config['base_url'] = site_url('asisten_dokter/data_kunjungan');
	        $config['total_rows'] = $this->db->count_all('tb_kunjungan');
	        $config['per_page'] = 5;
	        $config["uri_segment"] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);
		  	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = '<i class="fas fa-angle-right"></i>';
	        $config['prev_link']        = '<i class="fas fa-angle-left"></i>';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-gradient-info">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link bg-gradient-info">';
	        $config['last_tagl_close']  = '</span></li>';
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['data'] = $this->kunjungan_model->get_kunjungan_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view('asisten_dokter/kunjungan/tampil', $data);
		}

		public function cari_data_pasien(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->pasien_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("asisten_dokter/pasien/tampil", $data);
		}

		public function cari_data_kunjungan(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->kunjungan_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("asisten_dokter/kunjungan/tampil", $data);
		}

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('asisten_dokter/profile', $data);
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
				redirect('asisten_dokter/profile');
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

				$this->load->view('asisten_dokter/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('asisten_dokter/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('asisten_dokter/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('asisten_dokter/ubah_password');
					}
				}
			}
		}

	}

?>