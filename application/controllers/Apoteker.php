<?php 

	class Apoteker extends CI_Controller{
		public function __construct()
		{
			parent::__construct();

			$this->load->model("obat_model");
			$this->load->model("resep_model");
			$this->load->model("pasien_model");
			$this->load->model("kunjungan_model");
			$this->load->model("user_model");
			$this->load->library('form_validation');
			$this->load->library('pagination');

			if ($this->session->userdata('email') == null){
				redirect(site_url('login'));	
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 1){
				redirect(site_url('petugas_pendaftaran'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 3){
				redirect(site_url('dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 2){
				redirect(site_url('asisten_dokter'));
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
			$option1 = $this->obat_model->total_data_obat();
			$option2 = $this->resep_model->total_resep();
			$option3 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["total_obat"] = $option1;
			$data["total_resep"] = $option2;
			$data["user"] = $option3;
			$this->load->view("apoteker/beranda", $data);
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
			$this->load->view('apoteker/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('apoteker/info_kesehatan/tampil', $data);
		}

		public function data_obat()
		{
			$config['base_url'] = site_url('apoteker/data_obat');
	        $config['total_rows'] = $this->db->count_all('tb_obat');
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
	        $data['data'] = $this->obat_model->get_obat_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("apoteker/obat/tampil", $data);
		}

		public function tambah_data_obat()
		{
			$obat = $this->obat_model;
			$validation = $this->form_validation;
			$validation->set_rules($obat->rules());

			if($validation->run()){
				$obat->tambahObat();
				$this->session->set_flashdata('success', 'Data Tersimpan');
			}
			$option1 = $this->obat_model->kode_obat();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["kode"] = $option1;
			$data["user"] = $option2;
			$this->load->view("apoteker/obat/form_tambah", $data);
		}

		public function ubah_data_obat($id_obat = null)
		{
			if(!isset($id_obat)) redirect('apoteker/data_obat');

			$obat = $this->obat_model;
			$validation = $this->form_validation;
			$validation->set_rules($obat->rules());

			if($validation->run()){
				$obat->ubahObat();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}

			$option1 = $obat->getById($id_obat);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["obat"] = $option1;
			$data["user"] = $option2;

			if(!$data["obat"]) show_404();

			$this->load->view("apoteker/obat/form_ubah", $data);
		}

		public function tambah_stok($id_obat = null)
		{
			if(!isset($id_obat)) redirect('apoteker/data_obat');

			$obat = $this->obat_model;
			$validation = $this->form_validation;
			$validation->set_rules($obat->rules());
			

			if($validation->run()){
				$obat->tambahStokObat();
				$post = $this->input->post();
				$jml_stok = $post["stok_obat"];
				$harga = $post["harga_obat"];
				$biaya_keluar = (int)$jml_stok*(int)$harga;

				$data = [
					'tanggal_pemasukan' => $this->input->post('tanggal_pemasukan'),
					'id_obat' => $this->input->post('id_obat'),
					'harga_obat' => $this->input->post('harga_obat'),
					'stok_obat' => $this->input->post('stok_obat'),
					'biaya_keluar' => $biaya_keluar
				];

				$this->db->insert('tb_pemasukan_obat', $data);
				$this->session->set_flashdata('success', 'Stok Berhasil Ditambah');
			}

			$option1 = $obat->getById($id_obat);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["obat"] = $option1;
			$data["user"] = $option2;

			if(!$data["obat"]) show_404();

			$this->load->view("apoteker/obat/form_tambah_stok", $data);
		}

		public function hapus_data_obat($id_obat = null)
		{
			if(!isset($id_obat)) show_404();

			if($this->obat_model->hapusObat($id_obat)){
				redirect(site_url('apoteker/data_obat'));
			}
		}

		public function detail_data_obat($id_obat = null)
		{
			$option1 = $this->obat_model->getById($id_obat);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["obat"] = $option1;
			$data["user"] = $option2;
			$this->load->view("apoteker/obat/detail_obat", $data);
		}

		public function cari_data_obat(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->obat_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("apoteker/obat/tampil", $data);
		}

		public function data_resep()
		{
			$config['base_url'] = site_url('apoteker/data_resep');
	        $config['total_rows'] = $this->db->count_all('tb_resep');
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
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
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
	        $data['data'] = $this->resep_model->get_resep_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view('apoteker/resep/tampil', $data);
		}

		public function detail_data_resep($id_resep = null)
		{
			$option1 = $this->resep_model->getById($id_resep);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["resep"] = $option1;
			$data["user"] = $option2;
			$this->load->view("apoteker/resep/detail_resep", $data);
		}

		public function cari_data_resep(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->resep_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("apoteker/resep/tampil", $data);
		}

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('apoteker/profile', $data);
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
				redirect('apoteker/profile');
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

				$this->load->view('apoteker/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('apoteker/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('apoteker/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('apoteker/ubah_password');
					}
				}
			}
		}
		
	}

?>