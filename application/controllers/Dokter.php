<?php  

	class Dokter extends CI_Controller {
		public function __construct(){
			parent::__construct();

			$this->load->model("pasien_model");
			$this->load->model("dokter_model");
			$this->load->model("kunjungan_model");
			$this->load->model("rekam_medis_model");
			$this->load->model("resep_model");
			$this->load->model("konsultasi_model");
			$this->load->model("obat_model");
			$this->load->model("user_model");
			$this->load->library('form_validation');
			$this->load->library('pagination');

			if ($this->session->userdata('email') == null){
				redirect(site_url('login'));	
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 1){
				redirect(site_url('petugas_pendaftaran'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 2){
				redirect(site_url('asisten_dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 4){
				redirect(site_url('apoteker'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 5){
				redirect(site_url('kasir'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 6){
				redirect(site_url('pemilik_klinik'));
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 7){
				redirect(site_url('pasien'));
			}  
		}

		public function index()
		{
			$option1 = $this->pasien_model->total_pasien();
			$option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->rekam_medis_model->total_rekam_medis();
			$option4 = $this->resep_model->total_resep();
			$option5 = $this->konsultasi_model->total_konsultasi();
			$option6 = $this->obat_model->total_data_obat();
			$option7 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["total_pasien"] = $option1;
			$data["total_kunjungan"] = $option2;
			$data["total_rekam_medis"] = $option3;
			$data["total_resep"] = $option4;
			$data["total_konsultasi"] = $option5;
			$data["total_data_obat"] = $option6;
			$data["user"] = $option7;
			$this->load->view("dokter/beranda", $data);
		}

		public function info_klinik()
		{
			$option1 = $this->pasien_model->total_pasien();
			$option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option3;
			$data["total_pasien"] = $option1;
			$data["total_kunjungan"] = $option2;
			$this->load->view('dokter/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$option1 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option1;
			$this->load->view('dokter/info_kesehatan/tampil', $data);
		}

		public function data_pasien()
		{
			$config['base_url'] = site_url('dokter/data_pasien');
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
			$this->load->view('dokter/pasien/tampil_pasien', $data);
		}

		public function data_kunjungan()
		{
			$config['base_url'] = site_url('dokter/data_kunjungan');
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
			$this->load->view('dokter/kunjungan/tampil_kunjungan', $data);
		}

		public function stok_obat()
		{
			$config['base_url'] = site_url('dokter/stok_obat');
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
			$this->load->view('dokter/stok_obat/tampil', $data);
		}

		public function cari_data_pasien(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->pasien_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/pasien/tampil_pasien", $data);
		}

		public function cari_data_kunjungan(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->kunjungan_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/kunjungan/tampil_kunjungan", $data);
		}

		public function cari_stok_obat(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->obat_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/stok_obat/tampil", $data);
		}

		public function data_konsultasi()
		{
			$config['base_url'] = site_url('dokter/data_konsultasi');
	        $config['total_rows'] = $this->db->count_all('tb_konsultasi');
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
	        $data['data'] = $this->konsultasi_model->get_konsultasi_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("dokter/konsultasi/tampil", $data);
		}

		public function tambah_data_konsultasi()
		{
			$konsultasi = $this->konsultasi_model;
			$validation = $this->form_validation;
			$validation->set_rules($konsultasi->rules());

			if($validation->run()){
				$konsultasi->tambahKonsultasi();
				$data2 = [
					'name' => $this->input->post('nama_pasien'),
					'email' => $this->input->post('email'),
					'image' => 'default.jpg',
					'password' => $this->input->post('password1'),
					'role_id' => 7,
					'is_active' => 1,
					'date_created' => time()
				];

				$this->db->insert('tb_user', $data2);
				$this->session->set_flashdata('success', 'Data Tersimpan');
			}

			$option1 = $this->pasien_model->tampil_combobox();
			$option2 = $this->konsultasi_model->kode_konsultasi();
			$option3 = $this->dokter_model->tampil_combobox();
			$option4 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option4;
			$data["dataku"] = $option1;
			$data["dataku2"] = $option3;
			$data["kode"] = $option2;

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
				$this->load->view('dokter/konsultasi/form_tambah', $data);
			}


		}

		public function ubah_data_konsultasi($id_konsultasi = null)
		{
			if(!isset($id_konsultasi)) redirect('konsultasi');

			$konsultasi = $this->konsultasi_model;
			$validation = $this->form_validation;
			$validation->set_rules($konsultasi->rules());

			if($validation->run()){
				$konsultasi->ubahKonsultasi();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}

			$option1 = $konsultasi->getById($id_konsultasi);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option3 = $this->pasien_model->tampil_combobox();
			$option4 = $this->dokter_model->tampil_combobox();
			$data["dataku"] = $option3;
			$data["dataku2"] = $option4;
			$data["konsultasi"] = $option1;
			$data["user"] = $option2;

			if(!$data["konsultasi"]) show_404();

			$this->load->view("dokter/konsultasi/form_ubah", $data);
		}

		public function hapus_data_konsultasi($id_konsultasi = null)
		{
			if(!isset($id_konsultasi)) show_404();

			if($this->konsultasi_model->hapusKonsultasi($id_konsultasi)){
				redirect(site_url('dokter/data_konsultasi'));
			}
		}

		public function detail_data_konsultasi($id_konsultasi = null)
		{
			$option1 = $this->konsultasi_model->getById($id_konsultasi);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["konsultasi"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/konsultasi/detail_konsultasi", $data);
		}

		public function cari_data_konsultasi(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->konsultasi_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/konsultasi/tampil", $data);
		}

		public function data_rekam_medis()
		{
			$config['base_url'] = site_url('dokter/data_rekam_medis');
	        $config['total_rows'] = $this->db->count_all('tb_rekam_medis');
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
	        $data['data'] = $this->rekam_medis_model->get_rekam_medis_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("dokter/rekam_medis/tampil", $data);
		}

		public function tambah_data_rekam_medis()
		{
			$rekam_medis = $this->rekam_medis_model;
			$validation = $this->form_validation;
			$validation->set_rules($rekam_medis->rules());

			if($validation->run()){
				$rekam_medis->tambahRekamMedis();
				$this->session->set_flashdata('success', 'Data Tersimpan');
			}
			$option1 = $this->kunjungan_model->tampil_combobox();
			$option2 = $this->rekam_medis_model->kode_rekam_medis();
			$option3 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option4 = $this->pasien_model->tampil_combobox();
			$data["dataku"] = $option1;
			$data["kode"] = $option2;
			$data["user"] = $option3;
			$data["dataku2"] = $option4;
			$this->load->view("dokter/rekam_medis/form_tambah", $data);
		}

		public function ubah_data_rekam_medis($id_rekam_medis = null)
		{
			if(!isset($id_rekam_medis)) redirect('rekam_medis');

			$rekam_medis = $this->rekam_medis_model;
			$validation = $this->form_validation;
			$validation->set_rules($rekam_medis->rules());

			if($validation->run()){
				$rekam_medis->ubahRekamMedis();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}

			$option1 = $rekam_medis->getById($id_rekam_medis);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option3 = $this->kunjungan_model->tampil_combobox();
			$option4 = $this->pasien_model->tampil_combobox();
			$data["rekam_medis"] = $option1;
			$data["user"] = $option2;
			$data["dataku"] = $option3;
			$data["dataku2"] = $option4;

			if(!$data["rekam_medis"]) show_404();

			$this->load->view("dokter/rekam_medis/form_ubah", $data);
		}

		public function detail_data_rekam_medis($id_rekam_medis = null)
		{
			$option1 = $this->rekam_medis_model->getById($id_rekam_medis);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["rekam_medis"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/rekam_medis/detail_rekam_medis", $data);
		}
		
		public function cari_data_rekam_medis(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->rekam_medis_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/rekam_medis/tampil", $data);
		}

		public function cetak_data_rekam_medis($id_rekam_medis = null){
			$this->load->library('dompdf_gen');
			$data['rekam_medis'] = $this->rekam_medis_model->getById($id_rekam_medis);
			$this->load->view("dokter/rekam_medis/cetak_rekam_medis", $data);

			$paper_size = 'A5';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("rekam_medis.pdf", array('Attachment' => 0));
		}

		public function data_resep()
		{
			$config['base_url'] = site_url('dokter/data_resep');
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
	        $data['data'] = $this->resep_model->get_resep_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("dokter/resep/tampil", $data);
		}

		public function tambah_data_resep()
		{
			$resep = $this->resep_model;
			$validation = $this->form_validation;
			$validation->set_rules($resep->rules());

			if($validation->run()){
				$resep->tambahResep();
				$this->session->set_flashdata('success', 'Data Tersimpan');
			}
			$option1 = $this->rekam_medis_model->tampil_combobox();
			$option2 = $this->resep_model->kode_resep();
			$option3 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option4 = $this->obat_model->tampil_combobox();
			$data["user"] = $option3;
			$data["dataku"] = $option1;
			$data["dataku2"] = $option4;
			$data["kode"] = $option2; 
			$this->load->view("dokter/resep/form_tambah", $data);
		}

		public function ubah_data_resep($id_resep = null)
		{
			if(!isset($id_resep)) redirect('resep');

			$resep = $this->resep_model;
			$validation = $this->form_validation;
			$validation->set_rules($resep->rules());

			if($validation->run()){
				$resep->ubahResep();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}

			$option1 = $resep->getById($id_resep);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option3 = $this->resep_model->tampil_combobox();
			$option4 = $this->obat_model->tampil_combobox();
			$data["resep"] = $option1;
			$data["user"] = $option2;
			$data["dataku"] = $option3;
			$data["dataku2"] = $option4;

			if(!$data["resep"]) show_404();

			$this->load->view("dokter/resep/form_ubah", $data);
		}

		public function hapus_data_resep($id_resep = null)
		{
			if(!isset($id_resep)) show_404();

			if($this->resep_model->hapusResep($id_resep)){
				redirect(site_url('dokter/data_resep'));
			}
		}

		public function detail_data_resep($id_resep = null)
		{
			$option1 = $this->resep_model->getById($id_resep);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["resep"] = $option1;
			$data["user"] = $option2;
			$this->load->view("dokter/resep/detail_resep", $data);
		}

		public function cari_data_resep(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->resep_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;	
			$this->load->view("dokter/resep/tampil", $data);
		}

		public function cetak_data_resep($id_resep = null){
			$this->load->library('dompdf_gen');
			$data['resep'] = $this->resep_model->getById($id_resep);
			$this->load->view("dokter/resep/cetak_resep", $data);

			$paper_size = 'A6';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("resep.pdf", array('Attachment' => 0));
		}	

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('dokter/profile', $data);
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
				redirect('dokter/profile');
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

				$this->load->view('dokter/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('dokter/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('dokter/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('dokter/ubah_password');
					}
				}
			}
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

	        $select_image = $this->db->query("SELECT * FROM tb_user WHERE name = '$pasien'")->result();

	        $data["data"] = $option1;
	        $data["user"] = $option2;
	        $data["chat"] = $option3;
	        $data["image"] = $select_image;

	        $this->load->view("dokter/konsultasi/chat", $data);
	    }

	    public function kirim_pesan($id_konsultasi = null)
	    {
	        $option1 = $this->konsultasi_model->getById($id_konsultasi);
	        $option4 = $this->db->get_where('tb_user', ['email' =>
	        $this->session->userdata('email')])->row_array();
	        
	        $data["user"] = $option4;
	        $data2 = [
	            'id_konsultasi' => $this->input->post('id_konsultasi'),
	            'dari' => $this->input->post('dari_dokter'),
	            'ke' => $this->input->post('untuk_pasien'),
	            'pesan' => $this->input->post('pesan'),
	            'waktu' => time('YY-MM-DD hh:mm:ss')
	        ];

	        $this->db->insert('tb_chat', $data2);

	        $data["data"] = $option1;
	        $data["user"] = $option4;
	        redirect('dokter/lihat_pesan/'.$id_konsultasi);
	    }

	}
	
?>