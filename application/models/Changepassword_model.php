<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepassword_model extends CI_Model {
	var $tabel_kabupaten	= 'hospital_kabupaten';
	var $tabel_kecamatan	= 'hospital_kecamatan';

	function __construct() {
		parent::__construct();	
	}

	function select_user($key) {
		$this->db->select('*');
		$this->db->from('hospital_users');
		$this->db->where('user_key', $key);
		
		return $this->db->get();
	}

	function update_password() {
		$username  = $this->input->post('username');
		
		$data = array(	    			
		    		'user_password' 		=> sha1(trim($this->input->post('passwordbaru'))),
	    			'user_date_update' 		=> date('Y-m-d'),
	    			'user_time_update' 		=> date('Y-m-d H:i:s')
				);

		$this->db->where('user_username', $username);
		$this->db->update('hospital_users', $data);
	}
}
/* Location: ./application/model/Changepassword_model.php */