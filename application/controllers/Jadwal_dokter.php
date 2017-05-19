<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_dokter extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('jadwal_dokter_model');
    }
    
    public function index() {
        $data['show']       = false;
        $data['listTipe']   = $this->jadwal_dokter_model->ambil_poliklinik();
        $this->template_front->display('jadwal_dokter_view', $data);
    }

    // dijalankan saat Poliklinik di klik
    public function pilih_dokter() {
        $data['listDokter']     = $this->jadwal_dokter_model->ambil_dokter($this->uri->segment(3));
        $this->load->view('v_drop_down_dokter',$data);
    }

     public function search($tipe_id = '', $dokter_id = '', $tgl1 = '', $tgl2 = '') {
        $tipe_id        = $this->input->post('lstTipe');
        $dokter_id      = $this->input->post('lstDokter');
        $tgl1           = $this->input->post('tgl1');
        $tgl2           = $this->input->post('tgl2');

        if (!empty($tgl1)) {
            $xtgl1  = explode("-",$tgl1);
            $thn    = $xtgl1[2];
            $bln    = $xtgl1[1];
            $tgl    = $xtgl1[0];
            $TGL1   = $thn.'-'.$bln.'-'.$tgl;
        } else {
            $TGL1   = '';
        }

        if (!empty($tgl2)) {
            $xtgl2  = explode("-",$tgl2);
            $thn1   = $xtgl2[2];
            $bln1   = $xtgl2[1];
            $tgl1   = $xtgl2[0];
            $TGL2   = $thn1.'-'.$bln1.'-'.$tgl1;
        } else {
            $TGL2   = '';
        }

        if ($tipe_id = 'all') { // Jika Semua Poliklinik
            $data['listJadwal']     = $this->jadwal_dokter->select_polikliknik()->result();
            $this->template_front->display('jadwal_dokter_view', $data);
        }
     }    
}
/* Location: ./application/controller/Jadwal_dokter.php */