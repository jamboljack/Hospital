<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_kelompok() {
		$this->db->select('*');
		$this->db->from('hospital_kelompok');
		$this->db->order_by('kelompok_name', 'asc');
		
		return $this->db->get();
	}

	function select_menu() {
		$this->db->select('*');
		$this->db->from('hospital_menu');
		$this->db->order_by('menu_id', 'asc');
		
		return $this->db->get();
	}

	function select_kontak($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('hospital_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}

	function insert_message() {		
		$data = array(
				'message_subyek'		=> trim($this->input->post('subject')),
				'message_nama'			=> trim($this->input->post('name')),
				'message_email'			=> trim($this->input->post('email')),
				'message_pesan'			=> trim($this->input->post('message')),
		   		'message_date_post' 	=> date('Y-m-d'),
		   		'message_time_post' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_message', $data);
	}

	function select_total($kelompok_id) {
		$this->db->select('a.antrian_id');
		$this->db->from('hospital_antrian a');
		$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
		$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
		$this->db->join('hospital_kelompok k', 'l.kelompok_id = k.kelompok_id');
		$this->db->where('a.antrian_tanggal', date('Y-m-d'));
		$this->db->where('k.kelompok_id', $kelompok_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Home_model.php */