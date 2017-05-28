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

	function select_provinsi() {
		$this->db->select('*');
		$this->db->from('hospital_provinsi');
		$this->db->order_by('provinsi_id', 'asc');
		
		return $this->db->get();
	}

	function select_kabupaten_detail() {
		$this->db->select('*');
		$this->db->from('hospital_kabupaten');
		$this->db->order_by('kabupaten_id', 'asc');
		
		return $this->db->get();
	}

	function select_kecamatan_detail() {
		$this->db->select('*');
		$this->db->from('hospital_kecamatan');
		$this->db->order_by('kecamatan_id', 'asc');
		
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
		$pasien_id 	= $this->input->post('id');
		$TglLahir   = $this->input->post('tgl_lahir');
		$Tanggal    = date("Y-m-d", strtotime($TglLahir));
		
		$data = array(
				'pasien_no_rm'			=> strtoupper(trim($this->input->post('no_rm'))),
				'pasien_nama'			=> strtoupper(trim($this->input->post('nama'))),
				'pasien_nama_seo'		=> seo_title(trim($this->input->post('nama'))),
				'identitas_id'			=> $this->input->post('lstIdentitas'),
				'pasien_no_identitas'	=> trim($this->input->post('no_identitas')),
				'pasien_jk'				=> trim($this->input->post('rdJK')),
				'pasien_tmpt_lhr'		=> strtoupper(trim($this->input->post('tmpt_lahir'))),
				'pasien_tgl_lhr'		=> $Tanggal,
				'agama_id'				=> $this->input->post('lstAgama'),
				'darah_id'				=> $this->input->post('lstDarah'),
				'pendidikan_id'			=> $this->input->post('lstPendidikan'),
				'status_id'				=> $this->input->post('lstStatus'),
				'pekerjaan_id'			=> $this->input->post('lstKerja'),
				'pasien_wni'			=> $this->input->post('chkWNI'),
				'pasien_alamat'			=> strtoupper(trim($this->input->post('alamat'))),
				'provinsi_id'			=> trim($this->input->post('lstProvinsi')),
				'kabupaten_id'			=> trim($this->input->post('lstKabupaten')),
				'kecamatan_id'			=> trim($this->input->post('lstKecamatan')),
				'pasien_kodepos'		=> trim($this->input->post('kodepos')),
				'pasien_nama_keluarga'	=> strtoupper(trim($this->input->post('namakeluarga'))),
				'pasien_nama_ayah'		=> strtoupper(trim($this->input->post('namaayah'))),
				'pasien_nama_ibu'		=> strtoupper(trim($this->input->post('namaibu'))),
				'pasien_nama_pasangan'	=> strtoupper(trim($this->input->post('namapasangan'))),
				'pasien_telp'			=> trim($this->input->post('telp')),
				'pelanggan_id'			=> trim($this->input->post('lstPelanggan')),
				'pasien_no_asuransi'	=> trim($this->input->post('no_asuransi')),
		   		'pasien_date_update' 	=> date('Y-m-d'),
		   		'pasien_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('pasien_id', $pasien_id);
		$this->db->update('hospital_pasien', $data);
	}
}
/* Location: ./application/model/admin/Pasien_model.php */