<?php 

	class Kasir extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("pembayaran_model");
			$this->load->model("pasien_model");
			$this->load->model("resep_model");
			$this->load->model("obat_model");
			$this->load->model("konsultasi_model");
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
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 4){
				redirect(site_url('apoteker'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 2){
				redirect(site_url('asisten_dokter'));
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 6){
				redirect(site_url('pemilik_klinik'));
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 7){
				redirect(site_url('pasien'));
			}  
		}

		public function index()
		{
			$option1 = $this->pembayaran_model->total_data_transaksi();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["jumlah_trs"] = $option1;
			$data["user"] = $option2;
			$this->load->view("kasir/beranda", $data);
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
			$this->load->view('kasir/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('kasir/info_kesehatan/tampil', $data);
		}

		public function data_pembayaran()
		{
			$config['base_url'] = site_url('kasir/data_pembayaran');
	        $config['total_rows'] = $this->db->count_all('tb_pembayaran');
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
	        $data['data'] = $this->pembayaran_model->get_pembayaran_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option2;
			$this->load->view("kasir/pembayaran/tampil", $data);
		}

		public function tambah_data_pembayaran()
		{
			$pembayaran = $this->pembayaran_model;
			$obat = $this->obat_model;
			$hasil_kurang = $this->input->post('total_bayar')-1;
			$this->form_validation->set_rules($pembayaran->rules());
			$this->form_validation->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'trim|required|greater_than['.$hasil_kurang.']');
 			$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

			if($this->form_validation->run()){
				$pembayaran->tambahPembayaran();
				$obat->kurangStokObat();

				$post = $this->input->post();
				$harga = $post["harga_obat"];
				$biaya_masuk = 1*(int)$harga;

				$data = [
					'tanggal_pengeluaran' => $this->input->post('tanggal_pembayaran'),
					'id_obat' => $this->input->post('id_obat'),
					'harga_obat' => $this->input->post('harga_obat'),
					'stok_obat' => 1,
					'biaya_masuk' => $biaya_masuk
				];

				$this->db->insert('tb_pengeluaran_obat', $data);

				$this->session->set_flashdata('success', 'Data Tersimpan');
			}
			$option1 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option2 = $this->pembayaran_model->kode_pembayaran();
			$option3 = $this->pasien_model->tampil_combobox();
			$option4 = $this->resep_model->tampil_combobox();
			$option5 = $this->konsultasi_model->tampil_combobox();
			$data["user"] = $option1;
			$data["kode"] = $option2;
			$data["dataku"] = $option3;
			$data["dataku2"] = $option4;
			$data["dataku3"] = $option5;
			$this->load->view("kasir/pembayaran/form_tambah", $data);
		}

		public function ubah_data_pembayaran($id_pembayaran = null)
		{
			$this->form_validation->set_rules('kode_akses', 'Kode Akses', 'required|trim');
			$a = $this->input->post('a');
			$kode = $this->input->post('kode_akses');

			$option1 = $this->pembayaran_model->getById($a);
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			
			$select_kode = $this->db->query("SELECT * FROM tb_user WHERE role_id = '6'")->result();
			foreach ($select_kode as $key) {
	            $sandi = $key->password;
	        }

			$option4 = $this->pasien_model->tampil_combobox();
			$option5 = $this->resep_model->tampil_combobox();
			$option6 = $this->konsultasi_model->tampil_combobox();
			$data["pembayaran"] = $option1;
			$data["dataku"] = $option4;
			$data["dataku2"] = $option5;
			$data["dataku3"] = $option6;

			if ($this->form_validation->run() == false){
				if ($a == null) {
					redirect('kasir/data_pembayaran');
				} else {
					redirect('kasir/hak_akses/'.$a);
				}
				
			} else {
				if ($kode != $sandi && $a != null) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Kode Akses Salah !</div>');
						redirect('kasir/hak_akses/'.$a);
				} else {
					if ($a == null) {
						redirect('kasir/data_pembayaran');
					} else {
						$this->load->view("kasir/pembayaran/form_ubah", $data);
					}
				}
			}

		}

		public function form_ubah($id_pembayaran = null)
		{
			if(!isset($id_pembayaran)) redirect('kasir');

			$pembayaran = $this->pembayaran_model;
			$validation = $this->form_validation;
			$hasil_kurang = $this->input->post('total_bayar')-1;
			$this->form_validation->set_rules($pembayaran->rules());
			$this->form_validation->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'trim|required|greater_than['.$hasil_kurang.']');
 			$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

			if($this->form_validation->run()){
				$pembayaran->ubahPembayaran();
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			}
			$a = $this->input->post('a');
			$option1 = $pembayaran->getById($a);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option3 = $this->pembayaran_model->kode_pembayaran();
			$option4 = $this->pasien_model->tampil_combobox();
			$option5 = $this->resep_model->tampil_combobox();
			$option6 = $this->konsultasi_model->tampil_combobox();
			$data["pembayaran"] = $option1;
			$data["user"] = $option2;
			$data["kode"] = $option3;
			$data["dataku"] = $option4;
			$data["dataku2"] = $option5;
			$data["dataku3"] = $option6;

			redirect('kasir/data_pembayaran');

		}

		public function hak_akses($id_pembayaran = null)
		{
			$option1 = $this->pembayaran_model->getById($id_pembayaran);
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["pembayaran"] = $option1;
        	$this->load->view('kasir/pembayaran/hak_akses', $data);
		}

		public function detail_data_pembayaran($id_pembayaran = null)
		{
			$pembayaran = $this->pembayaran_model;
			$option1 = $pembayaran->getById($id_pembayaran);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["pembayaran"] = $option1;
			$data["user"] = $option2;
			$this->load->view("kasir/pembayaran/detail_pembayaran", $data);
		}

		public function cari_data_pembayaran(){
			$data['pagination'] = $this->pagination->create_links();
			$keyword = $this->input->post('keyword');
			$option1 = $this->pembayaran_model->get_keyword($keyword);
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["data"] = $option1;
			$data["user"] = $option2;
			$this->load->view("kasir/pembayaran/tampil", $data);
		}

		public function cetak_data_pembayaran($id_pembayaran = null){
			$this->load->library('dompdf_gen');
			$data['pembayaran'] = $this->pembayaran_model->getById($id_pembayaran);
			$this->load->view("kasir/pembayaran/cetak_nota", $data);

			$paper_size = 'A7';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("nota_pembayaran.pdf", array('Attachment' => 0));
		}

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('kasir/profile', $data);
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
				redirect('kasir/profile');
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

				$this->load->view('kasir/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('kasir/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('kasir/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success
						bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('kasir/ubah_password');
					}
				}
			}
		}
		
	}

?>