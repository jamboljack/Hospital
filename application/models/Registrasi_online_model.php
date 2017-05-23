<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi_online_model extends CI_Model {
	var $tabel_kabupaten	= 'hospital_kabupaten';
	var $tabel_kecamatan	= 'hospital_kecamatan';

	function __construct() {
		parent::__construct();	
	}

	function check_user_account($username, $password) {
		$this->db->select('*');
		$this->db->from('hospital_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);		
		$this->db->where('user_level', 'Pasien');
		$this->db->where('user_status', 'ACTIVE');
		
		return $this->db->get();
	}
		
	function get_user($username) {
		$this->db->select('*');
		$this->db->from('hospital_users');
		$this->db->where('user_username', $username);
		
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

	function select_anggota_keluarga() {
		$username  = $this->session->userdata('username');

		$this->db->select('p.pasien_id, p.pasien_no_rm, p.pasien_nama, p.pasien_jk, p.pelanggan_id, l.pelanggan_name');
		$this->db->from('hospital_pasien p');
		$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
		$this->db->where('p.user_username', $username);
		$this->db->order_by('p.pasien_nama', 'asc');
		
		return $this->db->get();
	}

	// Simpan Data Anggota Keluarga
	function insert_data_anggota() {
		$tgl 	= $this->input->post('tgl_lahir');
		if (!empty($tgl_daftar)) {
			$xtgl 		= explode("-", $tgl);
            $thn	 	= $xtgl[2];
            $bln 		= $xtgl[1];
            $tgl 		= $xtgl[0];
            $tgl_lahir 	= $thn.'-'.$bln.'-'.$tgl;
        } else {
        	$tgl_lahir 	= '';
        }

		$data = array(
				'user_username'			=> trim($this->session->userdata('username')),
				'pasien_hubungan'		=> $this->input->post('lstHubungan'),
				'pasien_nama'			=> strtoupper(trim($this->input->post('nama'))),
				'identitas_id'			=> $this->input->post('lstIdentitas'),
				'pasien_no_identitas'	=> trim($this->input->post('no_identitas')),
				'pasien_jk'				=> trim($this->input->post('rdJK')),
				'pasien_tmpt_lhr'		=> strtoupper(trim($this->input->post('tempat_lahir'))),
				'pasien_tgl_lhr'		=> $tgl_lahir,
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
		   		'pasien_date_update' 	=> date('Y-m-d'),
		   		'pasien_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_pasien', $data);
	}
}
/* Location: ./application/model/Registrasi_online_model.php */