<?php 

	class Pemilik_Klinik extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("obat_model");
			$this->load->model("user_model");
			$this->load->model("kunjungan_model");
			$this->load->model("pasien_model");
			$this->load->model("pembayaran_model");
			$this->load->model("rekam_medis_model");
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
			} else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 2){
				redirect(site_url('asisten_dokter'));
			}else if ($this->session->userdata('email') != null && $this->session->userdata('role_id') == 7){
				redirect(site_url('pasien'));
			}  
		}

		public function index()
		{
			$option1 = $this->rekam_medis_model->total_rekam_medis();
			$option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->obat_model->total_data_obat();
			$option4 = $this->pembayaran_model->total_data_transaksi();
			$option5 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["total_rekam_medis"] = $option1;
			$data["total_kunjungan"] = $option2;
			$data["total_data_obat"] = $option3;
			$data["total_pembayaran"] = $option4;
			$data["user"] = $option5;
			$this->load->view("pemilik_klinik/beranda", $data);
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
			$this->load->view('pemilik_klinik/info_klinik/tampil', $data);
		}

		public function info_kesehatan()
		{
			$option1 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data["user"] = $option1;
			$this->load->view('pemilik_klinik/info_kesehatan/tampil', $data);
		}

		public function laporan_kunjungan(){
			$config['base_url'] = site_url('pemilik_klinik/laporan_kunjungan');
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
	        $option2 = $this->kunjungan_model->total_kunjungan();
			$option3 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["total_kunjungan"] = $option2;
			$data["user"] = $option3;
			$this->load->view("pemilik_klinik/laporan_kunjungan/tampil", $data);
		}

		public function cetak_laporan_kunjungan(){

			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y');

			$this->load->library('dompdf_gen');
			$data['kunjungan'] = $this->kunjungan_model->getTanggal($tgl_awal, $tgl_akhir)->result();
			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_kunjungan/cetak_laporan_kunjungan", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_kunjungan.pdf", array('Attachment' => 0));
		}

		public function detail_laporan_kunjungan($id_kunjungan = null)
		{
			$option1 = $this->kunjungan_model->getById($id_kunjungan);
			$option2 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["kunjungan"] = $option1;
			$data["user"] = $option2;
			$this->load->view("pemilik_klinik/laporan_kunjungan/detail_laporan_kunjungan", $data);
		}
		public function form_cetak_kunjungan()
    	{
    		$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
        	$this->load->view('pemilik_klinik/laporan_kunjungan/form_cetak', $data);
    	}

		public function laporan_rekam_medis(){
			$config['base_url'] = site_url('pemilik_klinik/laporan_rekam_medis');
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
			$option2 = $this->rekam_medis_model->total_rekam_medis();
			$option3 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["total_rekam_medis"] = $option2;
			$data["user"] = $option3;
			$this->load->view("pemilik_klinik/laporan_rekam_medis/tampil", $data);
		}

		public function cetak_laporan_rekam_medis(){
			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y');

			$this->load->library('dompdf_gen');
			$data['rekam_medis'] = $this->rekam_medis_model->getTanggal($tgl_awal, $tgl_akhir)->result();
			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_rekam_medis/cetak_laporan_rekam_medis", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_rekam_medis.pdf", array('Attachment' => 0));
		}

		public function detail_laporan_rekam_medis($id_rekam_medis = null)
		{
			$option1 = $this->rekam_medis_model->getById($id_rekam_medis);
			$option2 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["rekam_medis"] = $option1;
			$data["user"] = $option2;
			$this->load->view("pemilik_klinik/laporan_rekam_medis/detail_laporan_rekam_medis", $data);
		}

		public function form_cetak_rekam_medis()
    	{
    		$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
        	$this->load->view('pemilik_klinik/laporan_rekam_medis/form_cetak', $data);
    	}

		public function laporan_data_obat(){
			$config['base_url'] = site_url('pemilik_klinik/laporan_data_obat');
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
	        $data['data2'] = $this->obat_model->get_pemasukan_obat_list($config["per_page"], $data['page']);
	        $data['data3'] = $this->obat_model->get_pengeluaran_obat_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();

			$option2 = $this->obat_model->total_data_obat();
			$option3 = $this->obat_model->jumlah_total_pengeluaran()->result();
			$option4 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$option5 = $this->obat_model->jumlah_total_pemasukan()->result();
			$option6 = $this->obat_model->getPemasukan();
			$option7 = $this->obat_model->getPengeluaran();
			$option8 = $this->obat_model->total_pemasukan_obat();
			$option9 = $this->obat_model->total_pengeluaran_obat();


			$data["total_data_obat"] = $option2;
			$data["jumlah_total_pengeluaran"] = $option3;
			$data["user"] = $option4;
			$data["jumlah_total_pemasukan"] = $option5;
			$data["pemasukan"] = $option6;
			$data["pengeluaran"] = $option7;
			$data["total_pemasukan_obat"] = $option8;
			$data["total_pengeluaran_obat"] = $option9;
			$this->load->view("pemilik_klinik/laporan_data_obat/tampil", $data);
		}

		public function cetak_laporan_data_obat(){
			$this->load->library('dompdf_gen');

			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y'); 

			$option1 = $this->obat_model->getAll();

			$data["data_obat"] = $option1;

			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_data_obat/cetak_laporan_data_obat", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_obat.pdf", array('Attachment' => 0));
		}

		public function cetak_laporan_pemasukan_obat(){
			$this->load->library('dompdf_gen');

			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y');
			$option1 = $this->obat_model->jumlah_total_pemasukan()->result();
			$option2 = $this->obat_model->getTanggalPemasukan($tgl_awal, $tgl_akhir)->result();
			$option3 = $this->obat_model->jumlah_total_pengeluaran()->result();
			$option4 = $this->obat_model->getTanggalPengeluaran($tgl_awal, $tgl_akhir)->result();

			$data["jumlah_total_pengeluaran"] = $option3;
			$data["pengeluaran"] = $option4;
			$data["jumlah_total_pemasukan"] = $option1;
			$data["pemasukan"] = $option2;

			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_data_obat/cetak_laporan_pemasukan_obat", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_pemasukan_obat.pdf", array('Attachment' => 0));
		}

		public function cetak_laporan_pengeluaran_obat(){
			$this->load->library('dompdf_gen');

			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y'); 
			$option1 = $this->obat_model->jumlah_total_pemasukan()->result();
			$option2 = $this->obat_model->getTanggalPemasukan($tgl_awal, $tgl_akhir)->result();
			$option3 = $this->obat_model->jumlah_total_pengeluaran()->result();
			$option4 = $this->obat_model->getTanggalPengeluaran($tgl_awal, $tgl_akhir)->result();

			$data["jumlah_total_pengeluaran"] = $option3;
			$data["pengeluaran"] = $option4;
			$data["jumlah_total_pemasukan"] = $option1;
			$data["pemasukan"] = $option2;

			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_data_obat/cetak_laporan_pengeluaran_obat", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_pengeluaran_obat.pdf", array('Attachment' => 0));
		}

		public function detail_laporan_data_obat($id_obat = null)
		{
			$option1 = $this->obat_model->getById($id_obat);
			$option2 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["obat"] = $option1;
			$data["user"] = $option2;
			$this->load->view("pemilik_klinik/laporan_data_obat/detail_laporan_data_obat", $data);
		}

    	public function form_cetak_data_pemasukan()
    	{
    		$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
        	$this->load->view('pemilik_klinik/laporan_data_obat/form_cetak_pemasukan', $data);
    	}

    	public function form_cetak_data_pengeluaran()
    	{
    		$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
        	$this->load->view('pemilik_klinik/laporan_data_obat/form_cetak_pengeluaran', $data);
    	}

		public function laporan_transaksi(){
			$option1 = $this->pembayaran_model->getAll();
			$option2 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$option3 = $this->pembayaran_model->total_data_transaksi();
			$option4 = $this->pembayaran_model->jumlah_total_pengobatan2()->result();
			$option5 = $this->pembayaran_model->jumlah_total_konsultasi2()->result();
			$option6 = $this->pembayaran_model->jumlah_total_obat2()->result();
			$option7 = $this->pembayaran_model->jumlah_total_bayar2()->result();
			$data["pembayaran"] = $option1;
			$data["user"] = $option2;
			$data["total_data_transaksi"] = $option3;
			$data["jumlah_total_pengobatan"] = $option4;
			$data["jumlah_total_konsultasi"] = $option5;
			$data["jumlah_total_obat"] = $option6;
			$data["jumlah_total_pemasukan"] = $option7;
			$this->load->view("pemilik_klinik/laporan_keuangan/tampil", $data);
		}

		public function cetak_laporan_transaksi(){
			$this->load->library('dompdf_gen');
			$tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
	        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
	        $tanggal = date('d-m-Y');

			$option1 = $this->pembayaran_model->getTanggal($tgl_awal, $tgl_akhir)->result();
			$option2 = $this->pembayaran_model->jumlah_total_pengobatan($tgl_awal, $tgl_akhir)->result();
			$option3 = $this->pembayaran_model->jumlah_total_konsultasi($tgl_awal, $tgl_akhir)->result();
			$option4 = $this->pembayaran_model->jumlah_total_obat($tgl_awal, $tgl_akhir)->result();
			$option5 = $this->pembayaran_model->jumlah_total_bayar($tgl_awal, $tgl_akhir)->result();

			$data["pembayaran"] = $option1;
			$data["jumlah_total_pengobatan"] = $option2;
			$data["jumlah_total_konsultasi"] = $option3;
			$data["jumlah_total_obat"] = $option4;
			$data["jumlah_total_pemasukan"] = $option5;

			$data['tgl_awal'] = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
			$data['tgl_akhir'] = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
			$this->load->view("pemilik_klinik/laporan_keuangan/cetak_laporan_transaksi", $data);

			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_transaksi.pdf", array('Attachment' => 0));
		}

		public function detail_laporan_transaksi($id_pembayaran = null)
		{
			$option1 = $this->pembayaran_model->getById($id_pembayaran);
			$option2 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["pembayaran"] = $option1;
			$data["user"] = $option2;
			$this->load->view("pemilik_klinik/laporan_keuangan/detail_laporan_transaksi", $data);
		}

		public function form_cetak_transaksi()
    	{
    		$data["user"] = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
        	$this->load->view('pemilik_klinik/laporan_keuangan/form_cetak', $data);
    	}

		public function data_pengguna(){
	        $config['base_url'] = site_url('pemilik_klinik/data_pengguna');
	        $config['total_rows'] = $this->db->count_all('tb_user');
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
	        $data['data'] = $this->user_model->get_pengguna_list($config["per_page"], $data['page']); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->user_model->total_user();
			$option3 = $this->db->get_where('tb_user', ['email' =>
				$this->session->userdata('email')])->row_array();
			$data["total_user"] = $option2;
			$data["user_name"] = $option3;
			$this->load->view("pemilik_klinik/data_pengguna/tampil", $data);
		}

		public function tambah_data_pengguna()
		{
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
				$this->load->view('pemilik_klinik/data_pengguna/form_tambah', $data);
			} else {
				$data = [
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'image' => 'default.jpg',
					'password' => $this->input->post('password1'),
					'role_id' => $this->input->post('role_id'),
					'is_active' => 1,
					'date_created' => time()
				];

				$this->db->insert('tb_user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success bg-gradient-success role="alert">Berhasil !</div>');
				redirect('pemilik_klinik/data_pengguna');
			}
			
		}

		public function hapus_data_pengguna($id = null)
		{
			if(!isset($id)) show_404();

			if($this->user_model->hapusPengguna($id)){
				redirect(site_url('pemilik_klinik/data_pengguna'));
			}
		}

		public function cari_data_pengguna()
		{
			$keyword = $this->input->post('keyword');
			$option1 = $this->user_model->get_keyword($keyword); 
	        $data['pagination'] = $this->pagination->create_links();
			$option2 = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$option3 = $this->user_model->total_user();
			$data["data"] = $option1;
			$data["user_name"] = $option2;
			$data["total_user"] = $option3;
			$this->load->view("pemilik_klinik/data_pengguna/tampil", $data);
		}

		public function profile()
		{
			$data["user"] = $this->db->get_where('tb_user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			if ($this->form_validation->run() == FALSE){
				$this->load->view('pemilik_klinik/profile', $data);
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
				redirect('pemilik_klinik/profile');
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

				$this->load->view('pemilik_klinik/profile', $data);

			} else {

				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password1');

				if ($data["user"]["password"] != $current_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Lama Salah !</div>');
					redirect('pemilik_klinik/ubah_password');
				} else {
					if ($current_password == $new_password){
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Baru sama dengan Password Lama !</div>');
						redirect('pemilik_klinik/ubah_password');
					} else {
						$this->db->set('password', $new_password);
						$this->db->where('email', $this->session->userdata('email'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Diubah !  !</div>');
						redirect('pemilik_klinik/ubah_password');
					}
				}
			}
		}
		
	}

?>