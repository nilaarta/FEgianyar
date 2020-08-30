<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
	private $ci;
	function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->database();
		$this->ci->load->library('session');
	}

	public function is_loggedin()
	{
		return (bool) $this->ci->session->userdata('user_id');
	}

	public function login($username, $password)
	{
		if ($username != "" || $password != "") {
			$this->ci->db->select('*');
			$this->ci->db->from('tb_userinfo');
			$this->ci->db->where('user_name', $username);
			$this->ci->db->join('tb_instansi', 'tb_instansi.instansi_id = tb_userinfo.user_instansi', 'left');
			$this->ci->db->join('tb_skm', 'tb_skm.skm_id = tb_userinfo.user_skm', 'left');
			$user = $this->ci->db->get();

			if ($user->num_rows() == 0) {
				return FALSE;
			} else {
				if (password_verify($password, $user->row()->user_password)) {
					if ($user->row()) {
						if($user->row()->user_hakakses == 1){
							$data_login = array(
								'user_waktulogin' => date('Y-m-d H:i:s')
							);
							$this->ci->db->where('user_id', $user->row()->user_id);
							$this->ci->db->update('tb_userinfo', $data_login);
	
							$this->ci->session->set_userdata(array(
								'user_id'           	=> $user->row()->user_id,
								'user_name'     		=> $user->row()->user_name,
								'user_hakakses'     	=> $user->row()->user_hakakses,
								'user_instansi'     	=> $user->row()->user_instansi,
								'instansi_nama'     	=> $user->row()->instansi_nama,
								'instansi_sub_nama'    	=> $user->row()->instansi_sub_nama,
								'instansi_logo'    		=> $user->row()->instansi_logo,
								'skm_id'				=> $user->row()->skm_id,
								'skm_judul'				=> $user->row()->skm_judul,
								'skm_sub_judul'			=> $user->row()->skm_sub_judul,
							));
							return true;
						}else{
							return false;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('user_id');
		$this->ci->session->unset_userdata('user_name');
		$this->ci->session->unset_userdata('user_hakakses');
		$this->ci->session->unset_userdata('instansi_nama');
		$this->ci->session->unset_userdata('instansi_sub_nama');
		$this->ci->session->unset_userdata('instansi_logo');
		$this->ci->session->unset_userdata('skm_id');
		$this->ci->session->unset_userdata('skm_judul');
		$this->ci->session->unset_userdata('skm_sub_judul');
		return TRUE;
	}
}
