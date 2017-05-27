<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_model extends CI_Model {
	var $tabel_kabupaten	= 'hospital_kabupaten';
	var $tabel_kecamatan	= 'hospital_kecamatan';
	
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('hospital_pasien');
		$this->db->order_by('pasien_nama', 'asc');
		
		return $this->db->get();
	}
	
	function select_by_id($pasien_id) {
		$this->db->select('*');
		$this->db->from('hospital_pasien');
		$this->db->where('pasien_id', $pasien_id);
		
		return $this->db->get();
	}

	function select_provinsi() {
		$this->db->select('*');
		$this->db->from('hospital_provinsi');
		$this->db->order_by('provinsi_id', 'asc');
		
		return $this->db->get();
	}

	function select_identitas() {
		$this->db->select('*');
		$this->db->from('hospital_identitas');
		$this->db->order_by('identitas_id', 'asc');
		
		return $this->db->get();
	}

	function select_agama() {
		$this->db->select('*');
		$this->db->from('hospital_agama');
		$this->db->order_by('agama_id', 'asc');
		
		return $this->db->get();
	}

	function select_darah() {
		$this->db->select('*');
		$this->db->from('hospital_darah');
		$this->db->order_by('darah_id', 'asc');
		
		return $this->db->get();
	}

	function select_pendidikan() {
		$this->db->select('*');
		$this->db->from('hospital_pendidikan');
		$this->db->order_by('pendidikan_id', 'asc');
		
		return $this->db->get();
	}

	function select_status() {
		$this->db->select('*');
		$this->db->from('hospital_status');
		$this->db->order_by('status_id', 'asc');
		
		return $this->db->get();
	}

	function select_pekerjaan() {
		$this->db->select('*');
		$this->db->from('hospital_pekerjaan');
		$this->db->order_by('pekerjaan_id', 'asc');
		
		return $this->db->get();
	}

	function select_pelanggan() {
		$this->db->select('*');
		$this->db->from('hospital_pelanggan');
		$this->db->order_by('pelanggan_id', 'asc');
		
		return $this->db->get();
	}

	public function select_kabupaten($provinsi_id){
		$this->db->where('provinsi_id', $provinsi_id);
		$this->db->order_by('kabupaten_nama', 'asc');
		$sql_kabupaten = $this->db->get($this->tabel_kabupaten);
		if($sql_kabupaten->num_rows()>0) {
			foreach ($sql_kabupaten->result_array() as $row) {
            	$result['']= '- Kabupaten -';
            	$result[$row['kabupaten_id']]= trim($row['kabupaten_nama']);
        	}
		} else {
		   	$result['']= '- Belum Ada Kabupaten -';
		}
        return $result;
	}
	
	public function select_kecamatan($kabupaten_id){
		$this->db->where('kabupaten_id', $kabupaten_id);
		$this->db->order_by('kecamatan_nama', 'asc');
		$sql_kecamatan = $this->db->get($this->tabel_kecamatan);
		if($sql_kecamatan->num_rows()>0) {
			foreach ($sql_kecamatan->result_array() as $row) {
				$result['']= '- Kecamatan -';
            	$result[$row['kecamatan_id']]= trim($row['kecamatan_nama']);
        	}
		} else {
		   	$result['']= '- Belum Ada Kecamatan -';
		}
        return $result;
	}

	function update_data() {
		$pekerjaan_id     = $this->input->post('id');
		
		$data = array(
				'pekerjaan_name'			=> strtoupper(trim($this->input->post('name'))),
				'pekerjaan_name_seo'		=> seo_title($this->input->post('name')),
		   		'pekerjaan_date_update' 	=> date('Y-m-d'),
		   		'pekerjaan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('pekerjaan_id', $pekerjaan_id);
		$this->db->update('hospital_pekerjaan', $data);
	}
}
/* Location: ./application/model/admin/Pasien_model.php */