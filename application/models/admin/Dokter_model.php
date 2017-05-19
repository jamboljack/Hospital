<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('d.*, t.tipe_name');
		$this->db->from('hospital_dokter d');
		$this->db->join('hospital_tipe_dokter t', 'd.tipe_id=t.tipe_id');
		$this->db->order_by('d.dokter_id','asc');
		
		return $this->db->get();
	}

	function select_type() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
				'dokter_name'			=> trim($this->input->post('name')),
				'tipe_id'				=> $this->input->post('lstTipe'),
				'dokter_address'		=> trim($this->input->post('address')),
				'dokter_city'			=> strtoupper(trim($this->input->post('city'))),				
				'dokter_phone'			=> trim($this->input->post('phone')),				
		   		'dokter_date_update' 	=> date('Y-m-d'),
		   		'dokter_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_dokter', $data);
	}	

	function update_data() {
		$dokter_id     = $this->input->post('id');
		
		$data = array(
				'dokter_name'			=> trim($this->input->post('name')),
				'tipe_id'				=> $this->input->post('lstTipe'),
				'dokter_address'		=> trim($this->input->post('address')),
				'dokter_city'			=> strtoupper(trim($this->input->post('city'))),				
				'dokter_phone'			=> trim($this->input->post('phone')),				
		   		'dokter_date_update' 	=> date('Y-m-d'),
		   		'dokter_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('dokter_id', $dokter_id);
		$this->db->update('hospital_dokter', $data);
	}

	function delete_data($kode) {		
		$this->db->where('dokter_id', $kode);
		$this->db->delete('hospital_dokter');
	}

	function select_all_jadwal($dokter_id) {
		$this->db->select('j.*, r.ruangan_name');
		$this->db->from('hospital_jadwal j');
		$this->db->join('hospital_ruangan r', 'j.ruangan_id = r.ruangan_id');
		$this->db->where('j.dokter_id', $dokter_id);
		$this->db->order_by('j.jadwal_id', 'asc');
		
		return $this->db->get();
	}

	function select_detail($dokter_id) {
		$this->db->select('*');
		$this->db->from('hospital_dokter');
		$this->db->where('dokter_id', $dokter_id);
		
		return $this->db->get();
	}

	function select_ruangan() {
		$this->db->select('*');
		$this->db->from('hospital_ruangan');
		$this->db->order_by('ruangan_name', 'asc');
		
		return $this->db->get();
	}

	function insert_data_jadwal() {
		$data = array(
				'dokter_id'				=> $this->uri->segment(4),
				'ruangan_id'			=> trim($this->input->post('lstRuangan')),
				'jadwal_hari'			=> trim($this->input->post('lstHari')),
				'jadwal_mulai'			=> trim($this->input->post('mulai')),
				'jadwal_selesai'		=> trim($this->input->post('selesai')),
				'jadwal_keterangan'		=> trim($this->input->post('keterangan')),
		   		'jadwal_date_update' 	=> date('Y-m-d'),
		   		'jadwal_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_jadwal', $data);
	}

	function select_detail_jadwal($jadwal_id) {
		$this->db->select('*');
		$this->db->from('hospital_jadwal');
		$this->db->where('jadwal_id', $jadwal_id);
		
		return $this->db->get();
	}

	function update_data_jadwal() {
		$jadwal_id     = $this->input->post('id');
		
		$data = array(
				'ruangan_id'			=> trim($this->input->post('lstRuangan')),
				'jadwal_hari'			=> trim($this->input->post('lstHari')),
				'jadwal_mulai'			=> trim($this->input->post('mulai')),
				'jadwal_selesai'		=> trim($this->input->post('selesai')),
				'jadwal_keterangan'		=> trim($this->input->post('keterangan')),
		   		'jadwal_date_update' 	=> date('Y-m-d'),
		   		'jadwal_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('jadwal_id', $jadwal_id);
		$this->db->update('hospital_jadwal', $data);
	}

	function delete_data_jadwal($kode) {		
		$this->db->where('jadwal_id', $kode);
		$this->db->delete('hospital_jadwal');
	}
}
/* Location: ./application/model/admin/Dokter_model.php */