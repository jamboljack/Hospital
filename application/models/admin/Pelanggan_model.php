<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('p.*, k.kelompok_name');
		$this->db->from('hospital_pelanggan p');
		$this->db->join('hospital_kelompok k', 'p.kelompok_id=k.kelompok_id');
		$this->db->order_by('p.pelanggan_id','asc');
		
		return $this->db->get();
	}

	function select_kelompok() {
		$this->db->select('*');
		$this->db->from('hospital_kelompok');
		$this->db->order_by('kelompok_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
				'pelanggan_name'			=> strtoupper(trim($this->input->post('name'))),				
				'kelompok_id'				=> $this->input->post('lstKelompok'),
				'pelanggan_date_reg'		=> date('Y-m-d'),
				'pelanggan_address'			=> trim($this->input->post('address')),
				'pelanggan_city'			=> strtoupper(trim($this->input->post('city'))),
				'pelanggan_zipcode'			=> trim($this->input->post('zipcode')),
				'pelanggan_phone'			=> trim($this->input->post('phone')),
				'pelanggan_fax'				=> trim($this->input->post('fax')),
				'pelanggan_limit'			=> trim($this->input->post('limit')),
		   		'pelanggan_date_update' 	=> date('Y-m-d'),
		   		'pelanggan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_pelanggan', $data);
	}	

	function update_data() {
		$pelanggan_id     = $this->input->post('id');
		
		$data = array(
				'pelanggan_name'			=> strtoupper(trim($this->input->post('name'))),				
				'kelompok_id'				=> $this->input->post('lstKelompok'),				
				'pelanggan_address'			=> trim($this->input->post('address')),
				'pelanggan_city'			=> strtoupper(trim($this->input->post('city'))),
				'pelanggan_zipcode'			=> trim($this->input->post('zipcode')),
				'pelanggan_phone'			=> trim($this->input->post('phone')),
				'pelanggan_fax'				=> trim($this->input->post('fax')),
				'pelanggan_limit'			=> trim($this->input->post('limit')),
		   		'pelanggan_date_update' 	=> date('Y-m-d'),
		   		'pelanggan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('pelanggan_id', $pelanggan_id);
		$this->db->update('hospital_pelanggan', $data);
	}

	function delete_data($kode) {		
		$this->db->where('pelanggan_id', $kode);
		$this->db->delete('hospital_pelanggan');
	}
}
/* Location: ./application/model/admin/Pelanggan_model.php */