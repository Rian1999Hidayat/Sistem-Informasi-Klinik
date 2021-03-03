<?php 

	function is_logged_in()
	{
		$ci = get_instance();
		if(!$ci->session->userdata('email')){
			redirect('login');
		} else {
			$role_id = $ci->session->userdata('role_id');
			$menu = $ci->uri->segment();
			
			$userAccess = $ci->db->get_where('user_role'. [
				'role_id' => $role_id
			]);

			if ($userAccess->num_rows() < 1){
				redirect('login/blocked');
			}
		}
	}

?>