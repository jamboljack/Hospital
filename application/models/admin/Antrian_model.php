<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian_model extends CI_Model {	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('a.*, p.*, d.dokter_name, t.tipe_name, l.pelanggan_name, u.ruangan_name');
		$this->db->from('hospital_antrian a');
		$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
		$this->db->join('hospital_dokter d', 'a.dokter_id = d.dokter_id');
		$this->db->join('hospital_tipe_dokter t', 'd.tipe_id = t.tipe_id');
		$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
		$this->db->join('hospital_jadwal j', 'a.jadwal_id = j.jadwal_id');
		$this->db->join('hospital_ruangan u', 'j.ruangan_id = u.ruangan_id');
		$this->db->where('a.antrian_tanggal', date('Y-m-d'));
		$this->db->order_by('a.antrian_kode', 'asc');
		$this->db->order_by('a.antrian_status', 'asc');
		
		return $this->db->get();
	}

	function select_tipe() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_id', 'asc');
		
		return $this->db->get();
	}

	function select_search_data($Tgl_periksa, $tipe_id) {
		if ($tipe_id == 'all') {
			$this->db->select('a.*, p.*, d.dokter_name, t.tipe_name, l.pelanggan_name, u.ruangan_name');
			$this->db->from('hospital_antrian a');
			$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
			$this->db->join('hospital_dokter d', 'a.dokter_id = d.dokter_id');
			$this->db->join('hospital_tipe_dokter t', 'd.tipe_id = t.tipe_id');
			$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
			$this->db->join('hospital_jadwal j', 'a.jadwal_id = j.jadwal_id');
			$this->db->join('hospital_ruangan u', 'j.ruangan_id = u.ruangan_id');
			$this->db->where('a.antrian_tanggal', $Tgl_periksa);
			$this->db->order_by('a.antrian_kode', 'asc');
			$this->db->order_by('a.antrian_status', 'asc');
			
			return $this->db->get();
		} else {
			$this->db->select('a.*, p.*, d.dokter_name, t.tipe_name, l.pelanggan_name, u.ruangan_name');
			$this->db->from('hospital_antrian a');
			$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
			$this->db->join('hospital_dokter d', 'a.dokter_id = d.dokter_id');
			$this->db->join('hospital_tipe_dokter t', 'd.tipe_id = t.tipe_id');
			$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
			$this->db->join('hospital_jadwal j', 'a.jadwal_id = j.jadwal_id');
			$this->db->join('hospital_ruangan u', 'j.ruangan_id = u.ruangan_id');
			$this->db->where('a.antrian_tanggal', $Tgl_periksa);
			$this->db->where('t.tipe_id', $tipe_id);
			$this->db->order_by('a.antrian_kode', 'asc');
			$this->db->order_by('a.antrian_status', 'asc');
			
			return $this->db->get();
		}
	}

	function update_data() {
		$antrian_id	= $this->uri->segment(4);
		
		$data = array(
				'antrian_status'		=> 'Periksa',
				'antrian_jam_datang'	=> date('Y-m-d H:i:s'),
		   		'antrian_date_update' 	=> date('Y-m-d'),
		   		'antrian_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('antrian_id', $antrian_id);
		$this->db->update('hospital_antrian', $data);
	}
}
/* Location: ./application/model/admin/Antrian_model.php */