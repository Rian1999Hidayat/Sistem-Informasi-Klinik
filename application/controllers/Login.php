 <?php 

	class Login extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("user_model");
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		public function index()
		{
			if ($this->session->userdata('email')) {
				if ($this->session->userdata('role_id') == 1) {
					redirect('petugas_pendaftaran');
				} else if ($this->session->userdata('role_id') == 2) {
					redirect('asisten_dokter');
				} else if ($this->session->userdata('role_id') == 3) {
					redirect('dokter');
				} else if ($this->session->userdata('role_id') == 4) {
					redirect('apoteker');
				} else if ($this->session->userdata('role_id') == 5) {
					redirect('kasir');
				}else if ($this->session->userdata('role_id') == 6) {
					redirect('pemilik_klinik');
				} else if ($this->session->userdata('role_id') == 7){
					redirect('pasien');
				}
			}
			
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() ==  FALSE){
				$this->load->view("login");	
			}else{
				$this->_login();
			}

		}

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
			$pass = $this->db->get_where('tb_user', ['password' => $password])->row_array();


			if($user)
			{
				if ($user['is_active'] == 1)
				{
					if ($pass)
					{
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];

						$this->session->set_userdata($data);

						if ($user['role_id'] == 1 || $user['role_id'] == 'Administrator'){
							redirect('petugas_pendaftaran');
						} else if ($user['role_id'] == 2 || $user['role_id'] == 'Asisten Dokter'){
							redirect('asisten_dokter');
						} else if ($user['role_id'] == 3 || $user['role_id'] == 'Dokter'){
							redirect('dokter');
						} else if ($user['role_id'] == 4 || $user['role_id'] == 'Apoteker'){
							redirect('apoteker');
						} else if ($user['role_id'] == 5 || $user['role_id'] == 'Kasir'){
							redirect('kasir');
						} else {
							redirect('pemilik_klinik');
						}

					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger bg-gradient-danger role="alert">Password Salah !</div>');
							redirect('login');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger bg-gradient-danger role="alert">Email Sudah Tidak Aktif !</div>');
						redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger bg-gradient-danger role="alert">Email Tidak Terdaftar !</div>');
				redirect('login');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			$this->session->set_flashdata('message', '<div class="alert alert-success bg-gradient-success role="alert">Berhasil Keluar !</div>');
				redirect('login');			
		}

		public function konfirmasi_email()
		{
			$this->load->view("konfirmasi_email");		
		}

		public function periksa_email()
		{
			$data["user"] = $this->db->get_where('tb_user', [
				'email' => $email = $this->input->post('email'),
				'name' => $name = $this->input->post('name')
			])->row_array();

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
			$this->form_validation->set_rules('name', 'Nama Pengguna', 'required|trim');

			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
					'matches' => 'Password Tidak Sama !', 
					'min_length' => 'Password Minimal 3 Karakter !'
				]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
					'matches' => 'Password Tidak Sama !',
				]);

			if ($this->form_validation->run() == FALSE){

				$this->load->view('konfirmasi_email');

			} else {

				$email = $this->input->post('email');
				$name = $this->input->post('name');
				$new_password = $this->input->post('password1');

				if ($data["user"]["email"] == $email && $data["user"]["name"] == $name) {
					$this->db->set('password', $new_password);
					$this->db->where('email', $email);
					$this->db->where('name', $name);
					$this->db->update('tb_user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success bg-gradient-success role="alert">Password Berhasil Di Reset !  !</div>');
					redirect('login');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger bg-gradient-danger role="alert">Email atau Nama Pengguna Tidak Terdaftar !</div>');
					redirect('login/konfirmasi_email');
					
				}
			}
		}	
	
	}

?>