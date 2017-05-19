<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('hospital_menu');		
		$this->db->order_by('menu_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(    			
		    		'menu_title' 			=> ucwords(strtolower(trim($this->input->post('title')))),
		    		'menu_title_seo' 		=> seo_title(trim($this->input->post('title'))),
		    		'menu_desc' 			=> $this->input->post('desc'),
		    		'menu_image' 			=> $this->upload->file_name,
		    		'menu_date_update' 		=> date('Y-m-d'),
		    		'menu_time_update' 		=> date('Y-m-d H:i:s')  			
			);
		} else {
			$data = array(    			
		    		'menu_title' 			=> ucwords(strtolower(trim($this->input->post('title')))),
		    		'menu_title_seo' 		=> seo_title(trim($this->input->post('title'))),
		    		'menu_desc' 			=> $this->input->post('desc'),
		    		'menu_date_update' 		=> date('Y-m-d'),
		    		'menu_time_update' 		=> date('Y-m-d H:i:s')  			
			);
		}
		
		$this->db->insert('hospital_menu', $data);
	}
	
	function select_by_id($menu_id) {
		$this->db->select('*');
		$this->db->from('hospital_menu');		
		$this->db->where('menu_id', $menu_id);
		
		return $this->db->get();
	}

	function update_data() {
		$menu_id  = $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(    			
		    		'menu_title' 			=> ucwords(strtolower(trim($this->input->post('title')))),
		    		'menu_title_seo' 		=> seo_title(trim($this->input->post('title'))),
		    		'menu_desc' 			=> $this->input->post('desc'),
		    		'menu_image' 			=> $this->upload->file_name,
		    		'menu_date_update' 		=> date('Y-m-d'),
		    		'menu_time_update' 		=> date('Y-m-d H:i:s')  			
			);
		} else {
			$data = array(    			
		    		'menu_title' 			=> ucwords(strtolower(trim($this->input->post('title')))),
		    		'menu_title_seo' 		=> seo_title(trim($this->input->post('title'))),
		    		'menu_desc' 			=> $this->input->post('desc'),
		    		'menu_date_update' 		=> date('Y-m-d'),
		    		'menu_time_update' 		=> date('Y-m-d H:i:s')  			
			);
		}

		$this->db->where('menu_id', $menu_id);
		$this->db->update('hospital_menu', $data);
	}

	function delete_data($kode) {		
		$this->db->where('menu_id', $kode);
		$this->db->delete('hospital_menu');
	}
}
/* Location: ./application/model/admin/Menu_model.php */