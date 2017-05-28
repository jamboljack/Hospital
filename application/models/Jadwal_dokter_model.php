<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_dokter_model extends CI_Model {
	var $tabel_tipe			= 'hospital_tipe_dokter';
	var $tabel_dokter		= 'hospital_dokter';

	function __construct() {
		parent::__construct();	
	}
		
	function select_tipe() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_name', 'asc');
		
		return $this->db->get();
	}

	function select_informasi($info_id = 1) {
		$this->db->select('*');
		$this->db->from('hospital_info');
		$this->db->where('info_id', $info_id);
		
		return $this->db->get();
	}

	public function ambil_poliklinik() {
		$sql_tipe = $this->db->get($this->tabel_tipe);
		if($sql_tipe->num_rows()>0) {
			foreach ($sql_tipe->result_array() as $row)
				{
					$result['all']= '-- SEMUA POLIKLINIK --';
					$result[$row['tipe_id']] = trim($row['tipe_name']);
				}
			return $result;
		}
	}

	public function ambil_dokter($tipe_id) {
		$this->db->where('tipe_id', $tipe_id);
		$this->db->order_by('dokter_name', 'asc');
		$sql_dokter = $this->db->get($this->tabel_dokter);		
		if($sql_dokter->num_rows()>0) {
			$result['all']= '- PILIH DOKTER -';
			foreach ($sql_dokter->result_array() as $row) {
            	$result[$row['dokter_id']] = trim($row['dokter_name']);
        	}
		} else {
		   $result['all']= '- PILIH DOKTER -';
		}
        return $result;
	}

	function select_polikliknik() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_name', 'asc');
		
		return $this->db->get();
	}

	function select_jadwal($hari, $tipe_id, $dokter_id) {
		if ($dokter_id == 'all') {
			$this->db->select('j.*, d.dokter_name, r.ruangan_name');
			$this->db->from('hospital_jadwal j');
			$this->db->join('hospital_dokter d', 'j.dokter_id 	= d.dokter_id');
			$this->db->join('hospital_ruangan r', 'j.ruangan_id 	= r.ruangan_id');
			$this->db->where('j.jadwal_hari', $hari);
			$this->db->where('d.tipe_id', $tipe_id);
			$this->db->order_by('j.jadwal_mulai', 'asc');
			
			return $this->db->get();
		} else {
			$this->db->select('j.*, d.dokter_name, r.ruangan_name');
			$this->db->from('hospital_jadwal j');
			$this->db->join('hospital_dokter d', 'j.dokter_id 	= d.dokter_id');
			$this->db->join('hospital_ruangan r', 'j.ruangan_id 	= r.ruangan_id');
			$this->db->where('j.jadwal_hari', $hari);
			$this->db->where('d.tipe_id', $tipe_id);
			$this->db->where('j.dokter_id', $dokter_id);
			$this->db->order_by('j.jadwal_mulai', 'asc');
			
			return $this->db->get();
		}
	}

	function select_detail_poliklinik($tipe_id) {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->where('tipe_id', $tipe_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Jadwal_dokter_model.php */